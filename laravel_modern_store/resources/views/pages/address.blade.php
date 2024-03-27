<x-layout :carts="$carts">
    <section class='w-full flex jucstify-center items-center gap-x-8 flex-col lg:flex-row'>
        <div class='h-full basis-[40%] self-start bg-red-800'>
            <img src="{{asset('images/map.jpg')}}" class='max-w-full h-auto' />
        </div>
        <div class='w-full flex flex-col justify-center items-center gap-y-6'>
            <h1 class='text-4xl text-gray-800 font-bold underline decolartion-green-500'>Adderss</h1>
            <div>
                <span class='text-xl font-bold'>Location</span>
                <span class='text-lg font-semibold text-gray-600'>Touk Kork near Epic 2</span>
            </div>
            <div>
                <span class='text-xl font-bold'>Phone Number</span>
                <span class='text-lg font-semibold text-gray-600'>099 311 366</span>
            </div>
        </div>
    </section>
</x-layout>
