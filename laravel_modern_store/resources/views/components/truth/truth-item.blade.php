@props(['name', 'text', 'icon'])

<article class='flext flex-col gap-y-4 justify-center items-center relative bg-gray-100 w-[17rem] px-4 pt-8 pb-3 mt-4'>
    <div class='text-cyan-600 text-6xl hover:text-[4rem] transition-all duration-200 absolute left-1/2 -translate-x-1/2'>
        <i class="{{$icon}}"></i>
    </div>
    <div class='h-[4rem]'></div>
 <h1 class='text-lg font-semibold text-center'>{{$name}}</h1>
    <p class='text-md text-gray-500 text-center'>{{$text}}</p>
</article>
