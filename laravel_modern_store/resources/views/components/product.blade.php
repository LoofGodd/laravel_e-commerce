@props(['product'])
<div class='flex flex-col items-center justify-center gap-y-8 border border-gray-500 border-lg w-[60%] p-4 rounded-lg md:flex-row md:justify-between md:gap-x-4 lg:gap-x-8'>
    <div>
        <p class='text-2xl font-semibold text-slate-400 text-nowrap'>id: {{$product['id']}}</p>
    </div>
    <div class='w-[8rem] bg-red-800'>
        <img src="{{ $product->image ? asset('storage/'. $product->image) :  asset('images/default.png')}}" class='h-auto max-w-auto' />
    </div>
    <div>
        <h1 class='text-lg font-semibold'>{{$product['name']}}</h1>
        <p class='text-wrap'>{{$product['description']}}</p>
    </div>
    <div>
        <p class='text-lg font-semibold'> {{$product['price']}}$ </p>
    </div>

</div>
