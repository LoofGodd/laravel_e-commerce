@props(['carts'])
@php
    $category = request()->path();
    $search = request()->query('search') ?? "";
@endphp



<nav class='px-5 flex flex-col gap-y-4'>
    {{-- navbar --}}
    <ul class='flex gap-x-4 md:gap-x-0 justify-between items-center px-3 py-2 mb-8'>
        <li>
            <x-logo />
        </li>
        <li class='px-4 py-2 rounded-lg bg-gray-100 flex gap-x-4'>
            <form method="POST" action='/redirect_search'>
                @csrf
                <input type="text" class="border-none bg-transparent focus:outline-none focus:border-none xl:w-[35rem] lg:w-[25rem] md:w-[20rem] w-[10rem]" placeholder="Search Product" name='search' value="{{$search}}"/>
                <button type="submit" class="hover:text-green-500 text-xl">
                    <i class='fa-solid fa-search hidden lg:inline'></i>
                </button>
            </form>
        </li>
        @auth
        <li class='lg:text-xl texl-lg font-semibold uppercase flex gap-5 flex-wrap text-center items-center justify-center'>
             <span class='hidden md:block'>Welcome {{auth()->user()->username}}</span>
             <span id='setting' class='flex gap-x-1 lg:gap-x-2 items-center justify-center cursor-pointer hover:text-gray-500'>
                <i class='fa-solid fa-right-from-bracket'></i>
                <form action="/users/logout" method="POST" >
                    @csrf
                   <button type='submit' class='font-semibold uppercase'>Logout<button>
                </form>
            </span>
        </li>
        @else
        <li>
                <a href='/register' class='font-semibold hover:text-green-500'><span class='hidden lg:inline'>Register</span>
                    <i class='fa-solid fa-user-plus'></i>
                </a>
                <a href='/login' class='font-semibold hover:text-green-500'><span class='hidden lg:inline'>Login</span>
                    <i class='fa-solid fa-right-to-bracket'></i>
                </a>
        </li>
        @endauth
    </ul>
    <div class='flex items-center justify-between'>
        <ul class='justify-start flex flex-wrap gap-4 items-center [&>*]:transition [&>*]:duration-300'>
            <x-navbar.navitem :category='$category' icon='fa-solid fa-shop'>shop</x-navbar.navitem>
            <x-navbar.navitem :category='$category' icon='fa-solid fa-user'>about</x-navbar.navitem>
            <x-navbar.navitem :category='$category' icon='fa-solid fa-message'>contact</x-navbar.navitem>
            <x-navbar.navitem :category='$category' icon='fa-solid fa-address-book'>address</x-navbar.navitem>

        </ul>
        @auth
            <a href='/cart' class='block cursor-pointer me-8 text-4xl text-green-500 relative'>
                @if (count($carts ?? [])>0)
                <p class='text-sm font-bold bg-black text-center rounded-full text-red-600 w-fit h-fit px-1 absolute -right-2 -top-2'>{{count($carts)}}</p>
                @endif
                <i class='fa-solid fa-cart-shopping'></i>
            </a>
        @endauth
    </div>
    <hr/>
</nav>
