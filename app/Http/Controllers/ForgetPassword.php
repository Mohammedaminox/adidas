<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;


class ForgetPassword extends Controller
{
    public function forgetPassword()
    {

        return view("auth.forgetPassword");
    }
    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(length: 64);

        DB::table('reset_pass')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send("email.forget-password", ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->to(route("forget.password"))->with("success", "we have send email for reset password");
    }

    public function resetPassword($token)
    {
        return view('auth.new-password', compact('token'));
    }


    public function resetPasswordPost(Request $request)
    {

        $request->validate([
            "email" => "required|email",
            "password" => "required|string|confirmed",
            "password_confirmation" => "required",
        ]);
      

        // Retrieve the password reset record
        $resetRecord = DB::table("reset_pass")
            ->where("email", $request->email)
            ->where("token", $request->token)
            ->first();

        // Check if the reset record exists
        if (!$resetRecord) {
            return redirect()->route("reset.password")->with("error", "Invalid or expired token.");
        }

        // Update the user's password
        $passwordUpdated = User::where("email", $request->email)
            ->update(["password" => Hash::make($request->password)]);

        // Check if the password was successfully updated
        if (!$passwordUpdated) {
            return redirect()->route("reset.password")->with("error", "Failed to update password.");
        }

        // Delete the reset record
        DB::table("reset_pass")
            ->where("email", $request->email)
            ->delete();

        return redirect()->route("auth.login")->with("success", "Password reset successfully.");
    }
}
