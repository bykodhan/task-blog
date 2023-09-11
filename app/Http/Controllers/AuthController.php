<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Giriş sayfasını göster
    public function login_show()
    {
        return view('auth.login');
    }

    //Giriş işlemini yap
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'min:3', 'max:255'],
            'password' => ['required'],
        ], [
            'email.required' => __('Email gereklidir'),
            'email.email' => __('Geçerli bir email adresi giriniz'),
            'email.min' => __('Email en az 3 karakter olmalı'),
            'email.max' => __('Email en fazla 255 karakter olmalı'),
            'password.required' => __('Password gereklidir'),
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Giriş başarılı
            return redirect()->intended('admin');
        } else {
            // Giriş başarısız
            return back()->withErrors(['fail' => 'Email adresi veya parola hatalı']);
        }
    }

    //Kayıt sayfasını göster
    public function register_show()
    {
        return view('auth.register');
    }

    //Kayıt işlemini yap
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:50|confirmed',
        ], [
            'email.required' => __('Email adresi giriniz'),
            'email.email' => __('Geçerli bir email adresi giriniz'),
            'email.unique' => __('Bu email adresi kullanılmaktadır'),
            'password.required' => __('Parola giriniz'),
            'password.min' => __('Parola en az 6 karakter olmalı'),
            'password.max' => __('Parola en fazla 50 karakter olmalı'),
            'password.confirmed' => __('Parolalar eşleşmiyor'),
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password), //Parolayı şifrele
            'email_verified_at' => null,
            'remember_token' => null,
        ]);
        Auth::login($user); //Oturum aç
        return redirect()->route('admin.index');

    }

    //Çıkış işlemini yap
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    //Parola sıfırlama maili gönderme sayfasını göster
    public function password_reset_email_show()
    {
        return view('auth.password.email');
    }

    //Parola sıfırlama maili gönderme işlemini yap
    public function password_reset_email_send(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => __('Email adresi giriniz'),
            'email.email' => __('Geçerli bir email adresi giriniz'),
            'email.exists' => __('Bu email adresi sistemde kayıtlı değil'),
        ]);

        $token = DB::table('password_reset_tokens')->where('email', $request->email)->first();
        if ($token) {
            if (now()->diffInMinutes($token->created_at) < 60) {
                $token = $token->token;
            } else {
                DB::table('password_reset_tokens')->where('email', $request->email)->delete();
                $token = sha1($request->email . now());
                DB::table('password_reset_tokens')->insert([
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => now(),
                ]);
            }

        } else {
            $token = sha1($request->email . now());
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]);
        }
        $text = "Parolanızı sıfırlamak için aşağıdaki linke tıklayınız(60 dakika geçerli).\n\n" . route('password.reset.check', $token);
        $mail = sendEmail($request->email, 'Password Reset', $text);
        // Mail gönderme işlemini yap
        return redirect()->route('password.reset.email.show')->with('success', 'Parola sıfırlama maili gönderildi');
    }

    //Parola sıfırlama kontrol
    public function password_reset_check($token)
    {
        $token = DB::table('password_reset_tokens')->where('token', $token)->first();
        if ($token) {
            if (now()->diffInMinutes($token->created_at) < 60) {
                return view('auth.password.reset', ['token' => $token->token]);
            } else {
                DB::table('password_reset_tokens')->where('token', $token->token)->delete();
                return redirect()->route('password.reset.email.show')->with('error', 'Parola sıfırlama süresi dolmuştur');
            }
        }
        return redirect()->route('password.reset.email.show')->with('error', 'Parola sıfırlama linki geçersizdir');
    }

    //Parola sıfırlama işlemini yap
    public function password_reset_update(Request $request)
    {

        $token = DB::table('password_reset_tokens')->where('token', $request->token)->first();
        if ($token) {
            if (now()->diffInMinutes($token->created_at) < 60) {
                $request->validate([
                    'password' => 'required|min:6|max:50|confirmed',
                ], [
                    'password.required' => __('Parola giriniz'),
                    'password.min' => __('Parola en az 6 karakter olmalı'),
                    'password.max' => __('Parola en fazla 50 karakter olmalı'),
                    'password.confirmed' => __('Parolalar eşleşmiyor'),
                ]);
                $user = User::where('email', $token->email)->first();
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('login')->with('success', 'Parola sıfırlandı');
            } else {
                DB::table('password_reset_tokens')->where('token', $token->token)->delete();
                return redirect()->route('password.reset.email.show')->with('error', 'Parola sıfırlama süresi dolmuştur');
            }
        }
    }
}
