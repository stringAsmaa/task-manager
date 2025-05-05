@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-md shadow">
    <h2 class="text-2xl font-semibold text-center mb-6">انشاء حساب </h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">الاسم</label>
            <input type="name" name="name" id="name" required class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">البريد الإلكتروني</label>
            <input type="email" name="email" id="email" required class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">كلمة المرور</label>
            <input type="password" name="password" id="password" required class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>

        <div >
            <button type="submit" class="bg-blue-500 w-full font-semibold text-center flex items-center justify-center button hover:shadow">انشاء</button>
        </div>
    </form>
</div>

@endsection
