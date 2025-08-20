@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

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

        <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-2xl shadow p-6 space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                    class="w-full border rounded-xl p-2 focus:ring focus:ring-blue-200 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block font-medium">Code</label>
                <input type="text" name="code" value="{{ old('code', $product->code) }}"
                    class="w-full border rounded-xl p-2 focus:ring focus:ring-blue-200 @error('code') border-red-500 @enderror">
                @error('code')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block font-medium">Description</label>
                <textarea name="description" rows="4"
                    class="w-full border rounded-xl p-2 focus:ring focus:ring-blue-200 @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block font-medium">Current Image</label>
                @if ($product->image_url)
                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}"
                        class="w-40 h-40 object-cover rounded-xl mb-2">
                @else
                    <p class="text-gray-500 mb-2">No image uploaded</p>
                @endif
                <input type="file" name="image_url" accept="image/*"
                    class="w-full border rounded-xl p-2 focus:ring focus:ring-blue-200 @error('image_url') border-red-500 @enderror">
                <p class="text-sm text-gray-500 mt-1">Leave empty to keep current image</p>
                @error('image_url')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex gap-4">
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700 transition">
                    Update Product
                </button>
                <a href="{{ route('product.index') }}"
                    class="px-6 py-3 bg-gray-500 text-white rounded-xl shadow hover:bg-gray-600 transition">
                    Cancel
                </a>
                <form action="{{ route('product.destroy', $product) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this product?');"
                    class="bg-white rounded-2xl shadow p-6">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-6 py-3 bg-red-600 text-white rounded-xl shadow hover:bg-red-700 transition">
                        Delete
                    </button>
                </form>
            </div>
        </form>      
    </div>
@endsection
