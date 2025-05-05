<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="min-h-screen bg-gray-100">
        <header class="bg-gradient-to-r from-blue-600 to-cyan-500 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-semibold">إدارة المهام</h1>
                <nav class="flex items-center gap-4">
                    <a href="{{ route('login') }}" class="text-white flix button">تسجيل الدخول</a>
                    <a href="{{ route('register') }}" class="text-white flix button">انشاء حساب</a>

                    <a href="{{ route('tasks.index') }}" class="text-white  button"><span> الصفحة الرئيسية </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                      </svg>
                      </a>
                </nav>

            </div>
        </header>

        <main class="py-8">
            @yield('content')
        </main>
    </div>

</body>
</html>
