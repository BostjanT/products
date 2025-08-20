@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl  dark:text-white text-center font-bold m-6">Create Product</h1>

        {{-- Display validation errors --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-gray-600 rounded-2xl dark:text-white shadow p-6 max-w-lg mx-auto space-y-4">
            @csrf
            <div class="flex flex-col gap-4">
                <div>
                    <label class="block font-medium">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full border rounded-md p-2 focus:ring focus:ring-blue-200 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block font-medium">Code</label>
                    <input type="text" name="code" value="{{ old('code') }}"
                        class="w-full border rounded-md p-2 focus:ring focus:ring-blue-200 @error('code') border-red-500 @enderror">
                    @error('code')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block font-medium">Description</label>
                    <textarea name="description" rows="4"
                        class="w-full border rounded-md p-2 focus:ring focus:ring-blue-200 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div>
                <label class="block font-medium">Image</label>
                <input type="file" name="image_url" accept="image/*"
                    class="w-full rounded-md my-4 focus:ring focus:ring-blue-200 @error('image_url') border-red-500 @enderror">
                @error('image_url')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit"
                    class="px-4 py-1 bg-green-600 text-white rounded-xl shadow hover:bg-green-700 transition">
                    Save Product
                </button>
                <a href="{{ route('product.index') }}"
                    class="px-6 py-3 bg-violet-500 text-white rounded-xl shadow hover:bg-violet-600 transition">
                    Cancel
                </a>
            </div>
        </form>

    </div>
@endsection
