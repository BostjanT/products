@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl text-white font-bold mb-6">Products</h1>
        <div class="my-6">
            <a href="{{ route('product.create') }}"
                class="inline-block px-6 py-3 bg-orange-600 text-white font-medium rounded-xl shadow hover:bg-orange-800 transition">
                + Add Product
            </a>
        </div>
        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            @forelse ($products as $product)
                <a href="{{ route('product.edit', $product) }}"
                    class="block bg-gray-300 rounded-2xl shadow hover:shadow-lg hover:transform hover:scale-95 transition p-4 cursor-pointer">
                    @if ($product->image_url)
                        <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}"
                            class="w-full h-48 object-cover rounded-xl mb-4">
                    @else
                        <div class="w-full h-48 bg-gray-200 rounded-xl mb-4 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    @endif
                    <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $product->code }}</p>
                    @if ($product->description)
                        <p class="mt-2 text-gray-700">{{ Str::limit($product->description, 80) }}</p>
                    @endif
                </a>
            @empty
                <div class="col-span-full text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path
                            d="M34 40h10v-4a6 6 0 00-10.712-3.714M34 40H14m20 0v-4a9.971 9.971 0 00-.712-3.714M14 40H4v-4a6 6 0 0110.713-3.714M14 40v-4c0-1.313.253-2.566.713-3.714m0 0A10.003 10.003 0 0124 26c4.21 0 7.813 2.602 9.288 6.286M30 14a6 6 0 11-12 0 6 6 0 0112 0zm12 6a4 4 0 11-8 0 4 4 0 018 0zm-28 0a4 4 0 11-8 0 4 4 0 018 0z"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No products</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by creating a new product.</p>
                </div>
            @endforelse
        </div>


    </div>
@endsection
