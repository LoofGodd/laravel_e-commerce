<x-layout :carts="$carts">
    <header>
        <x-hero>
              <div class='flex flex-col gap-y-4 items-center justify-center'>
                 <span class='text-4xl font-semibold text-gray-200 text-center'>Welcome to our store</span>
                <button class='bg-emerald-600 px-5 py-2 font-xl font-semibold rounded-lg hover:bg-emerald-300 transtion duration-300'>Discover more</button>
             </div>
        </x-hero>
    </header>
    <main>
        <x-landing-category.landing-category/>
        <div class='w-[75vw] mx-auto'>
            <x-card.products :products="$products"/>
        </div>
        <x-truth.truth />
    </main>
</x-layout>
