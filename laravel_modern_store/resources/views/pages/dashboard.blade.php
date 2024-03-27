<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
<script src="//unpkg.com/alpinejs" defer></script>
    <title>Dashbord</title>
</head>
<body>
    <div x-data="{show: true}" x-init="setTimeout(()=> show = false, 3000)" x-show="show">
        @if (session('success'))
        <h1 class='absolute bg-green-600 text-gray-200 px-4 py-2 w-fit top-6 left-1/2 -translate-x-1/2 text-xl font-bold'>{{session('success')}}</h1>
        @elseif(session('error'))
        <h1 class='absolute bg-indigo-500 text-gray-200 px-4 py-2 w-fit top-6 left-1/2 -translate-x-1/2 text-xl font-bold'>{{session('error')}}</h1>
        @endif
    </div>
    <div>
        <form action="/handle_product" method="POST" class='bg-gray-300 text-gray-900 grid place-items-center lg:w-[50vw] mx-auto mt-24 py-10 px-16 gap-y-8   [&>*]:w-full [&>*]:rounded-lg' enctype="multipart/form-data">
            @csrf
            <input type='text' name='id' placeholder="Product Id" value="{{old('id')}}"/>
            @error('id')
                <p class='text-red-800'>{{$message}}</p>
            @enderror

            <input type='text' name='name' placeholder="Product name" value="{{old('name')}}"/>
            @error('name')
                <p class='text-red-800'>{{$message}}</p>
            @enderror
            <input type='text' name='slug' placeholder='Product slug' value="{{old('slug')}}"/>
            @error('slug')
                <p class='text-red-800'>{{$message}}</p>
            @enderror
            <input type='file' name='image' placeholder='product image' value="{{old('image')}}"/>
            @error('image')
                <p class='text-red-800'>{{$message}}</p>
            @enderror
            <input type='text' name='description' placeholder='Product description' value="{{old('description')}}"/>
            @error('description')
                <p class='text-red-800'>{{$message}}</p>
            @enderror
            <input type='text' name='short_description' placeholder='Product short description' value="{{old('short_description')}}"/>
            @error('short_description')
                <p class='text-red-800'>{{$message}}</p>
            @enderror
            <input type='text' name='categories' placeholder='Product, Category' value="{{old('categories')}}"/>
            @error('categories')
                <p class='text-red-800'>{{$message}}</p>
            @enderror
            <input type='text' name='price' placeholder='Product Price' value="{{old('price')}}"/>
            @error('price')
                <p class='text-red-800'>{{$message}}</p>
            @enderror
            <input type='number' name='feature' placeholder='feature' value="{{old('feature')}}" defaultVlaue="{{0}}"/>

            <div class='flex jusitfy-center items-center gap-x-6 [&>*]:px-3 [&>*]:py-1 [&>*]:text-lg [&>*]:text-bold [&>*]:rounded-lg [&>*]:text-white'>
                <button type='submit' name='action' value='add' class='bg-green-600'>Add</button>
                <button type='submit' name='action' value='delete' class='bg-red-600'>Delete</button>
                 <button type='submit' name='action' value='update' class='bg-cyan-600'>Update</button>
            </div>
        </form>
        <div class='bg-white shadow-lg shadow-gray-700/20 rounded-lg lg:basis-[70%] py-2 flex flex-col items-center justify-center gap-y-6'>
             @foreach ($products as $product)
                <x-product :product="$product" />
            @endforeach
        </div>
    </div>
</body>
</html>
