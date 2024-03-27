<section class='w-screen bg-white relative'>
    <button class='absolute right-4 pr-9 pt-4 text-cyan-600 hover:text-cyan-700 text-xl font-bold hover:underline w-fit block flex gap-x-2 items-center justify-center'>see more <i class='fa-solid fa-arrow-right'></i></button>
    <div class='h-10'></div>
    <div class='mx-auto w-[80vw] pt-8 pb-4 flex flex-wrap gab-x-8 gap-y-4 justify-between items-center px-8 '>
        <x-landing-category.landing-category-item image_src="{{asset('images/defaultCa.jpeg')}}" slug="tranding">Tranding</x-landing-category.landing-category-item>
        <x-landing-category.landing-category-item image_src="{{asset('images/defaultCa.jpeg')}}" slug="suit-price">Suit Price</x-landing-category.landing-category-item>
        <x-landing-category.landing-category-item image_src="{{asset('images/defaultCa.jpeg')}}" slug="qualiity">Quality</x-landing-category.landing-category-item>
        <x-landing-category.landing-category-item image_src="{{asset('images/defaultCa.jpeg')}}" slug="new">New</x-landing-category.landing-category-item>
    </div>
</section>
