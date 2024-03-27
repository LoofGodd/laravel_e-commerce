<x-layout>
    <section class='lg:px-24 lg:py-10 bg-slate-100 my-8'>
        <div class='flex flex-col gap-y-16 lg:flex-row lg:items-start lg:gap-x-8'>
            <div class='bg-white shadow-lg shadow-gray-700/20 rounded-lg lg:basis-[70%] py-2 flex flex-col items-center justify-center gap-y-6'>
                @if (count($carts) <= 0)
                   <h1>No cart yet</h1>
                @endif
                @foreach ($carts as $cart)
                    <x-cart :cart="$cart" />
                @endforeach
            </div>
            @if (count($carts) > 0)
            <div class='lg:basis-[30%] bg-white shadow-lg shadow-orange-500/30 px-8 py-4 rounded-md'>
                <h1 class='text-2xl font-bold text-gray-700 tracking-wider uppercase mx-auto w-fit underline'>Information</h1>
                <div class='flex flex-col gap-y-8 jusitfy-center py-8'>
                    <div class='flex items-center justify-between gap-x-16'>
                        <h1 class='text-xl font-semibold text-gray-800'>Total Products:</h1>
                        <span class='text-lg text-gray-500 font-semibold'>{{count($carts)}}</span>
                    </div>
                    <div class='flex items-center justify-between gap-x-16'>
                        <h1 class='text-xl font-semibold text-gray-800'>Total Items:</h1>
                        @php
                            $collect_carts = collect($carts);
                            $total_count = $collect_carts->reduce(function ($carry, $item){
                                return $item->count + $carry;
                            }, 0);
                            $total_price = $collect_carts->reduce(function ($carry, $item){
                                return ($item->count * $item->price) + $carry;
                            }, 0);
                        @endphp
                        <span class='text-lg text-gray-500 font-semibold'>{{$total_count}}</span>
                    </div>
                    <div class='flex items-center justify-between gap-x-16'>
                        <h1 class='text-xl font-semibold text-gray-800'>Total:</h1>
                        <span class='text-xl text-gray-700 font-semibold'>{{$total_price}} $</span>
                    </div>
                </div>
                <form action="{{route('payment')}}" method='post'>
                    @csrf
                    @foreach ($carts as $cart)
                        <input hidden name='cart_id[]' value="{{$cart->cart_id}}" />
                    @endforeach
                    <button class='text-xl font-bold py-2 w-full rounded-md bg-gradient-to-t from-orange-400/60 to-yellow-300 uppercase' name='amount' value="{{$total_price}}">Checkout</button>
                </form>
            </div>
            @endif
        </div>
     </section>
</x-laout>
