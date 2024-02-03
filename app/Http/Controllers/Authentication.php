<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class Authentication extends Controller
{
    public function login(Request $request) {
        try {
            $credentials = $request->validate([
                'email' => ['required'],
                'password' => ['required']
            ]);

            if(auth()->attempt($credentials)) {
                $request->session()->regenerate();
                if($request->remember == 'on') {
                    auth()->login(auth()->user(), true);
                }
                return redirect()->intended('/');
            }
            Alert::error('Gagal', 'Email atau password salah');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }

    public function logout() {
        try {
            auth()->logout();
            return redirect('/login');
        } catch (\Throwable $th) {
            Alert::class('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }

    public function forgotView() {
        return view('forgot-password');
    }

    public function forgotPassword(Request $request) {
        try {
            $request->validate([
                'email' => ['required', 'email']
            ]);
            $user = User::where('email', $request->email)->first();
            if($user) {
                $token = Crypt::encryptString($user->email);
                $token = env('BASE_URI').'/reset-password?token='.$token;
                Mail::to($user->email)->send(new forgotPassword($token));
                Alert::success('Berhasil', 'Silahkan cek email anda');
                return redirect()->back();
            }
            Alert::error('Gagal', 'Email tidak terdaftar');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }

    public function resetView(Request $request) {
        $token = $request->token;
        return view('reset-password', compact('token'));
    }

    public function resetPassword(Request $request) {
        try {
            $request->validate([
                'password' => ['required', 'min:4'],
            ]);
            $email = Crypt::decryptString($request->token);
            $user = User::where('email', $email)->first();
            if($user) {
                $user->password = bcrypt($request->password);
                $user->save();
                Alert::success('Berhasil', 'Password berhasil diubah');
                return redirect('/login');
            }
            Alert::error('Gagal', 'Email tidak terdaftar');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }
}
