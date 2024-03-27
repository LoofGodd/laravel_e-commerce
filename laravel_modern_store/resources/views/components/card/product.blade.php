@props(['product'])
@php
use Illuminate\Support\Str;
    if(!isset($product)) $product = [];
@endphp
@if (empty($product))
    <h1>No product</h1>
@else
<section class='bg-white px-4 py-2 rounded-lg flex flex-col items-center justify-between h-[30rem] shadow-lg shadow-gray-500 hover:shadow-green-200 hover:shadow-sm transition duration-all'>
    <div class='mb-3 rounded-lg w-[13rem]'>
        <img src={{ $product->image ? asset('storage/'. $product->image) :  asset('images/default.png')  }} class='max-w-full h-auto' />
    </div>
    <div class='flex flex-col gap-y-3 justify-start items-center'>
        <div class='text-gray-500 text-[8px] uppercase'>{{$product->categories}}</div>
        <a href="/product/{{$product->slug}}">
            <h1 class='text-md text-left font-semibold tracking-widest cursor-pointer hover:text-green-500 transition-all duration-300'>{{$product->name}}</h1>
        </a>
        <p class='text-left'>{{Str::limit($product->short_description, 20)}}</p>
        <p class='text-2xl font-semibold text-left'>{{$product->price}} $</p>
    </div>
</section>
@endif
