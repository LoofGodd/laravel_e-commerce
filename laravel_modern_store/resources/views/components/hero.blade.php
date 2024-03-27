<section class='relative h-[40rem] grid place-items-center'>
    {{$slot}}
    <div style="background: url({{asset('images/defaultCa.jpeg')}}) center center no-repeat;" class='absolute -z-20 top-0 left-0 w-full h-full before:absolute before:w-full before:h-full before:top-0 before:left-0 before:bg-gradient-to-r before:from-gray-500/50 before:to-gray-800/40'></div>
</section>
