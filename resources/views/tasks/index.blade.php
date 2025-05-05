@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold text-gray-800">قائمة المهام</h1>
            <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white button">إضافة مهمة جديدة</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-md p-4">
            <ul>
                @foreach($tasks as $task)
                    <li class="flex justify-between items-center mb-4">
                        <div class="flex ">
                            <form action="{{ route('tasks.toggle-complete', $task) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="mr-2">
                                    <input type="checkbox" {{ $task->is_completed ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-blue-500 " />
                                </button>
                            </form>
                            <span class="{{ $task->is_completed ? 'line-through text-gray-500' : 'text-gray-900' }}">{{ $task->title }}</span>
                        </div>

                        <div class="space-x-2 flex items-center">
                            <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 button hover:bg-yellow-400 ">تعديل</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="">

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 button hover:bg-red-600 ">حذف</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
