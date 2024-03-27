@if ($product)
 <x-layout>
    <section class='flex flex-col md:flex-row gap-6 justify-center items-center px-10 py-8'>
        <div class='lg:basis-[45%]'>
            <img src="{{ $product->image ? asset('storage/'. $product->image) :  asset('images/default.png')}}" alt="{{$product->name}}"  class='max-w-full h-auto'/>
        </div>
        <div class='lg:basis-[65%] w-full flex flex-col gap-y-6 basis-[100%]'>
            <div class='flex items-center jusitfy-center gap-x-8 lg:gap-x-20 text-4xl'>
                <h1 class='font-bold tracking-wider'>{{$product->name}}</h1>
                <p class='text-green-700 font-semibold '>{{$product->price}}$</p>
            </div>
            <div class='bg-black px-2 py-1 w-fit text-gray-200 text-lg font-semibold uppercase rounded-lg'>{{$product->categories}}</div>
            <p class='text-lg text-gray-600 '>{{$product->description}}</p>
            <div class='w-full flex flex-col gap-y-4'>
                <input hidden name='product_slug' value="{{$product->slug}}" />
                <form method="POST" action="/cart/add?product_id={{$product->id}}">
                    @csrf
                    <input hidden name='product_id' value="{{$product->id}}" />
                    <button class='bg-emerald-600 rounded-lg w-full px-5 py-2 font-semibold text-2xl text-green-100 hover:bg-emerald-500 transition-all duration-100 uppercase'>Add to cart</button>
                </form>
            </div>
        </div>
    </section>
</x-layout>
@else
 <h1>No Product was found</h1>
@endif
