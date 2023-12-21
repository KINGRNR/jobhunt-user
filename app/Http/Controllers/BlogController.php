<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Feed;
use App\Models\Reaction;


class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Ambil offset dan limit dari request atau berikan nilai default
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 5); // Sesuaikan dengan jumlah data yang ingin dimuat setiap kali

        // $data['content'] = DB::connection('blog-only')->table("blog")
        //     ->skip($offset)
        //     ->take($limit)
        //     ->get();
        $id = Session::get('user_id');

        $data['id'] = $id;
        // print_r($id);
        $data['reaction'] = null;
        if ($id) {
            $reactions = DB::table('feed_reaction')->where('id_user', $id)->get();

            if ($reactions->isNotEmpty()) {
                $data['reaction'] = $reactions;
            }
        }
        $data['content'] = DB::table('v_feed')
            ->skip($offset)
            ->take($limit)
            ->whereNull('feed_deleted_at') // Exclude soft-deleted records
            ->orderBy('feed_created_at', 'DESC')
            ->get();
        $data['users'] = [];

        foreach ($data['content'] as $content) {
            $userId = $content->feed_user_id;

            // Mengambil nama pengguna dari tabel 'users' berdasarkan 'user_id'
            $user = DB::table('users')
                ->leftJoin('resume', 'users.id', '=', 'resume.resume_user_id')
                ->where('users.id', $userId)
                ->select('users.name', 'resume.resume_official_photo', 'resume.resume_professional_title')
                ->first();

            $data['users'][$userId] = $user;
        }

        foreach ($data['content'] as &$content) {
            $userId = $content->feed_user_id;

            if (isset($data['users'][$userId])) {
                $content->user = $data['users'][$userId];
            }
        }

        return response()->json($data);
    }
    // public function reactCheck()
    // {
    //     $id = Session::get('user_id');

    //     DB::table('feed_reaction')->where()
    // }
    // public function detail_blog(Request $request)
    // {
    //     $base64EncodedData = $request->post();

    //     $id = base64_decode($base64EncodedData['id']);
    //     $data['blog'] = DB::connection('blog-only')->table("blog")->where('id', $id)->first();
    //     $data['user'] = DB::table('users')
    //         ->leftJoin('resume', 'users.id', '=', 'resume.resume_user_id')
    //         ->where('users.id', $data['blog']->user_id)
    //         ->select('users.id', 'users.name', 'resume.resume_official_photo', 'resume.resume_professional_title')
    //         ->first();

    //     return response()->json(['data' => $data]);
    // }
    public function reaction(Request $request)
    {
        $data = $request->post();
        // print_r($data['reaction']);
        $id = Session::get('user_id');

        $existingRecord = Reaction::where('id_user', $id)
            ->where('id_feed', $data['id_feed'])
            ->first();

        if ($data['already_reacted']) {
            $existingRecord->update([
                'reaction' => null,
            ]);
            $opr = "delete";
        } else if ($existingRecord) {
            $opr = $existingRecord->update([
                'reaction' => $data['reaction'],
            ]);
            $opr = "update";
        } else {
            $opr = Reaction::create([
                'id_user' => $id,
                'id_feed' => $data['id_feed'],
                'reaction' => $data['reaction'],
            ]);
            $opr = "new";
        }
        return response()->json([
            'data' => $opr,
            'success' =>  true,
            'status' =>  'Success',
            'title' => 'Sukses!',
            'message' => 'Data Berhasil Tersimpan!',
            'code' => 201
        ]);
    }


    public function userindex(Request $request)
    {
        $id = Session::get('user_id');

        $data = DB::table('resume')->where('resume_user_id', $id)->first();
        return response()->json($data);
    }
    public function postCommentSingle(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'id_post' => 'required',
        ]);

        $data = $request->post();
        $id = Session::get('user_id');
        $comment = DB::connection('blog-only')->table('comment')->insert([
            'comment_user_id' => $id,
            'comment_text' => $data['comment'],
            'comment_blog_id' => $data['id_post'],
        ]);

        if ($comment) {
            return response()->json([
                'success' =>  true,
                'status' =>  'Success',
                'title' => 'Sukses!',
                'message' => 'Data Berhasil Tersimpan!',
                'code' => 201,
                'comment' => $comment,
            ]);
        } else {
            // Failed to create comment
            return response()->json([
                'success' =>  false,
                'status' =>  'Error',
                'title' => 'Gagal!',
                'message' => 'Gagal menyimpan komentar.',
                'code' => 500,
            ]);
        }
    }
    public function getComment(Request $request)
    {
        $data = $request->post();
        $id = base64_decode($data['id']);


        $opr = DB::Connection('blog-only')->table('comment')->where('comment_blog_id', $id)->get();
        print_r($opr);
        exit;
    }

    public function save(Request $request)
    {
        $id = Session::get('user_id');


        $request->validate([
            'photo' => 'nullable|image|max:3000|mimes:jpeg,jpg,png',
            'title' => 'required',
            'description' => 'required',
        ]);
        $data = $request->except(['photo']);
        if ($request->hasFile('photo')) {
            $photoFile = $request->file('photo');
            $photoName = Str::random(15) . '_' . time() . '.' . $photoFile->getClientOriginalExtension();

            if ($photoFile->move(public_path('file/feed/'), $photoName)) {
                $data['photo'] = $photoName;
            }
        };

        Feed::create([
            'title_feed' => $data['title'],
            'description_feed' => $data['description'],
            'pic_name' => $data['photo'] ?? null,
            'feed_user_id' => $id
        ]);
        return response()->json([
            'success' =>  true,
            'status' =>  'Success',
            'title' => 'Sukses!',
            'message' => 'Data Berhasil Tersimpan!',
            'code' => 201
        ]);
    }
    public function urFeed(Request $request)
    {
        $id = Session::get('user_id');

        $data = DB::table('feed_content')->where('feed_user_id', $id)->whereNull('feed_deleted_at')->get();
        return response()->json($data);
    }
    public function onDetail(Request $request)
    {
        $data = $request->post();
        // print_r($data['id']); exit;
        // $id = Session::get('user_id');

        $data = DB::table('feed_content')->where('id_feed', $data['id'])->first();
        return response()->json($data);
    }
    public function saveUpdate(Request $request)
    {
        // $data = $request->post();
        $request->validate([
            'pic_name' => 'nullable|image|max:3000|mimes:jpeg,jpg,png',
            'title_feed' => 'required',
            'description_feed' => 'required',
        ]);
        $data = $request->except(['pic_name']);
        // $existingFeed = Feed::find($data['id_feed']);
        // print_r($existingFeed); exit;
        $existingFeed = Feed::where('id_feed', $data['id_feed'])->first();

        if ($request->hasFile('pic_name')) {
            $photoFile = $request->file('pic_name');
            $photoName = Str::random(15) . '_' . time() . '.' . $photoFile->getClientOriginalExtension();

            if ($photoFile->move(public_path('file/feed/'), $photoName)) {
                $data['pic_name'] = $photoName;

                // Delete the existing photo if it exists
                if ($existingFeed && $existingFeed->pic_name) {
                    unlink(public_path('file/feed/' . $existingFeed->pic_name));
                    $existingFeed->pic_name = null; // Update the existing resume to clear the photo
                }
            }
        }
        // print_r($data); exit;
        $existingFeed->update($data);
        return response()->json([
            'success' =>  true,
            'status' =>  'Success',
            'title' => 'Sukses!',
            'message' => 'Data Berhasil Tersimpan!',
            'code' => 201
        ]);
    }
    public function deleteFeed(Request $request)
    {
        $data = $request->post();
        $feed = Feed::where('id_feed', $data['id'])->delete();;
        return response()->json([
            'success' =>  true,
            'status' =>  'Success',
            'title' => 'Sukses!',
            'message' => 'Data di Delete!',
            'code' => 201
        ]);
    }
}
