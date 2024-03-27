@props(['cart'])
@isset($cart)
 <div class="relative flex flex-col gap-y-8 md:flex-row items-center justify-around gap-x-8 px-10 w-[50%] mx-auto md:w-full shadow-lg shadow-gray-300/10 py-2">
    <div class='absolute top-0 right-1 text-2xl cursor-pointer hover:bg-gray-200/20 px-3 py-1 text-red-500/60'>
        <form action="/cart/delete" method='POST'>
            @csrf
            <input hidden name='cart_id' value="{{$cart->cart_id}}" />
            <button>
                <i class='fa-solid fa-xmark'></i>
            </button>
        </form>
    </div>
    <div class="w-[100px] md:w-[150px]">
        <img src="{{ $cart->image ? asset('storage/'. $cart->image) :  asset('images/default.png')}}" class="h-auto max-w-full" />
    </div>
    <div class="text-center md:text-start">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4 md:mb-2">{{$cart->name}}</h2>
        <p class="text-gray-500 text-wrap">{{$cart->short_description}}</p>
    </div>
    @if ($cart->cart_id)
    <div class="flex gap-x-2 items-center jusitfy-center">
        <form action="/cart/decrease_count" method='POST'>
            @csrf
            <input hidden name='cart_id' value="{{$cart->cart_id}}" />
            <button type="submit" {{$cart->count == 1 ? 'disabled' : ''}} class="px-4 py-1 border border-2 hover:bg-gray-200 transition duration-300">-</button>
        </form>
        <p class="px-2">{{$cart->count}}</p>
        <form method="POST" action='/cart/increase_count'>
            @csrf
            <input hidden name='cart_id' value="{{$cart->cart_id}}" />
            <button type="submit" class="px-4 py-1 border border-2 hover:bg-gray-200 transition duration-300">+</button>
        </form>
    </div>
    @endif
    <div>
        <p class="text-2xl font-bold text-gray-700">{{$cart->price}}$</p>
    </div>
</div>
@else
<h1>brother that is not the correct broduct</h1>
@endisset
