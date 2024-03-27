@props(['image_src', 'slug'])
@php
    if(!isset($image_src))
        $image_src= "";
@endphp
<figure class='h-auto w-[20rem] overflow-hidden rounded-lg relative before:absolute before:w-full before:h-full before:bg-gray-200 before:blur-sm hover:before:bg-opacity-30 before:bg-opacity-10 before:hover:bg-opacity-70 before:transition-all before:duration-300'>
    <img src="{{$image_src}}" class='h-auto max-w-full' />
    <a href="/shop?category=[{{$slug}}]">
        <figcaption class='absolute bottom-3 left-1/2 -translate-x-1/2 w-full text-center text-2xl font-semibold tracking-wider bg-gray-800 bg-opacity-60 px-4 py-2 text-green-500'>
            {{$slot}}
        </figcaption>
    </a>
</figure>
