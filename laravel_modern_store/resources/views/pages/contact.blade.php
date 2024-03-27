<x-layout :carts="$carts">
    <form class='bg-gray-200/20 rounded-lg shadow-lg shadow-green-200/20 lg:w-[50vw] lg:mx-auto w-screen px-10 py-4  my-8 flex flex-col justify-center items-center'>
        <div class='flex flex-col justify-center items-center gap-x-6 mb-8'>
            <label for='email' class='font-seimobold text-xl text-gray-600 self-start mb-4'>Email:</label>
            <input type="email" name='email' placeholder='Your Email'/>
        </div>
        <div class='flex flex-col justify-center items-center gap-x-6 mb-8'>
            <label for='text' class='font-seimobold text-xl text-gray-600 self-start mb-4'>Your tought:</label>
            <textarea name='text' value='what do you want to say?'></textarea>
        </div>
        <button type="submit" class='bg-sky-200 text-lg font-semibold px-4 py-1 text-sky-700 rounded-md hover:bg-sky-300'>Send</button>
    </form>
</x-layout>
