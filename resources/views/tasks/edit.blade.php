@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 ">تعديل المهمة</h1>

        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">عنوان المهمة</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $task->title }}" required />
            </div>

            <div class="mb-4" >
                <label for="description" class="block text-sm font-medium text-gray-700">وصف المهمة</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $task->description }}</textarea>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md w-full duration-200 transform hover:scale-110 transition-all ease-in-out hover:shadow-2xl sun ">تحديث المهمة</button>
            </div>
        </form>
    </div>
@endsection
