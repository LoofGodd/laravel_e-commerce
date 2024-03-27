@props(['products'])
<main class='min-h-[20rem] h-fit w-screen grid lg:grid-cols-4 lg:grid-rows-1'>
    <div class='h-full bg-gray-200/10'>
        <x-shop.aside />
    </div>
    <div class='h-full lg:col-start-2 lg:col-span-3 lg:row-start-1 row-start-2 row-span-3'>
        @if (count($products) <= 0 )
            <h1>No product was found</h1>
        @else
            <x-card.products :products="$products" />
        @endif
    </div>
</main>
