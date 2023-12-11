<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;



class ForgotPasswordController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function showForgetPasswordForm(): View

    {

        return view('email.forgetPassword');
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

     public function submitForgetPasswordForm(Request $request): RedirectResponse
     {
         $request->validate([
             'email' => 'required|email|exists:users',
         ]);
     
         $user = User::where('email', $request->email)->first();
     
         // Check if the user exists
         if ($user) {
             $token = Str::random(64);
     
             // Store token in the password_resets table
             DB::table('password_resets')->insert([
                 'email' => $request->email,
                 'token' => $token,
                 'created_at' => Carbon::now()
             ]);
     
             // Send email to the user
             Mail::send('email.forgetPassword', ['token' => $token, 'name' => $user->name], function ($message) use ($request) {
                 $message->to($request->email);
                 $message->subject('Reset Password');
             });
         }
     
         // Redirect the user after processing the form
         return redirect()->back()->with('message', 'Password reset link sent successfully.');
     }
     
    /**

     * Write code on Method

     *

     * @return response()

     */

    public function showResetPasswordForm($token): View

    {

        return view('forgotpass.forgetPasswordLink', ['token' => $token]);
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function submitResetPasswordForm(Request $request): RedirectResponse

    {

        $request->validate([

            'email' => 'required|email|exists:users',

            'password' => 'required|string|min:6|confirmed',

            'password_confirmation' => 'required'

        ]);



        $updatePassword = DB::table('password_resets')

            ->where([

                'email' => $request->email,

                'token' => $request->token

            ])

            ->first();



        if (!$updatePassword) {

            return back()->withInput()->with('error', 'Invalid token!');
        }



        $user = User::where('email', $request->email)

            ->update(['password' => Hash::make($request->password)]);



        DB::table('password_resets')->where(['email' => $request->email])->delete();



        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
