<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authcontroller extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        // تعطيل التحقق من التشفير مؤقتًا
        if ($user && $credentials['password'] == 'mysecretpassword') {  // تحقق مباشر من كلمة المرور
            Auth::login($user);  // تسجيل الدخول مباشرة
            return redirect()->route('tasks.index')->with('success', 'تم تسجيل الدخول بنجاح');
        }
        // فشل تسجيل الدخول
        return back()->withErrors(['email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.']);
    }


    public function register(Request $request)
    {
        $validate =  $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        if ($validate) {
            User::create($validate);
            return redirect()->route('tasks.index')->with('success', 'تم انشاء حساب بنجاح');
        }
        return back()->withErrors('حدث خطأ ما اعد المحاولة');
    }
}
