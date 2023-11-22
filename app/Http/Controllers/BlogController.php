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


class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Ambil offset dan limit dari request atau berikan nilai default
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 5); // Sesuaikan dengan jumlah data yang ingin dimuat setiap kali

        $data['content'] = DB::connection('blog-only')->table("blog")
            ->skip($offset)
            ->take($limit)
            ->get();

        $data['users'] = [];

        foreach ($data['content'] as $content) {
            $userId = $content->user_id;

            // Mengambil nama pengguna dari tabel 'users' berdasarkan 'user_id'
            $user = DB::table('users')
                ->leftJoin('resume', 'users.id', '=', 'resume.resume_user_id')
                ->where('users.id', $userId)
                ->select('users.name', 'resume.resume_official_photo', 'resume.resume_professional_title')
                ->first();

            $data['users'][$userId] = $user;
        }

        foreach ($data['content'] as &$content) {
            $userId = $content->user_id;

            if (isset($data['users'][$userId])) {
                $content->user = $data['users'][$userId];
            }
        }

        return response()->json($data);
    }

    public function detail_blog(Request $request)
    {
        $base64EncodedData = $request->post();

        $id = base64_decode($base64EncodedData['id']);
        $data['blog'] = DB::connection('blog-only')->table("blog")->where('id', $id)->first();
        $data['user'] = DB::table('users')
            ->leftJoin('resume', 'users.id', '=', 'resume.resume_user_id')
            ->where('users.id', $data['blog']->user_id)
            ->select('users.id', 'users.name', 'resume.resume_official_photo', 'resume.resume_professional_title')
            ->first();

        return response()->json(['data' => $data]);
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
}
