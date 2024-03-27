@props(['products'])
@php
    if(!isset($products)) $products = [];
@endphp
<section class='px-8 pt-8 pb-4 relative'>
    <div class='container flex gap-6 flex-wrap items-center justify-center lg:[&>*]:basis-[20%] md:[&>*]:basis-[30%] sm:[&>*]:basis-[45%] [&>*]:basis-[90%]'>`
        @if (count($products) > 0)
            @foreach ($products as $product)
                <x-card.product :product="$product"/>
            @endforeach
        @endif
    </div>
</section>
