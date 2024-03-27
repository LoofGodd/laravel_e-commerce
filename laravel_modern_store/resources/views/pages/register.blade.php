<x-layout>
    <section style="background:  url({{asset('images/defaultCa.jpeg')}}) center center no-repeat;" class='w-screen min-h-[45rem] grid place-items-center relative before:absolute before:w-full before:h-full before:top-0 before:left-0 before:bg-gradient-to-t before:from-green-400/20 before:to-blue-500/70'>
        <form class='w-[37vw] mx-auto h-fit grid place-items-center gap-y-16 px-16 py-10 rounded-lg my-4 z-20 relative bg-white' method="POST" action="/users/create">
            @csrf
            <h1 class='text-4xl font-semibold text-gray-800 underline decoration-green-500 uppercase'>create an account</h1>
            <section class='grid grid-cols-1 grid-rows-4 gap-y-6 w-full'>
                <div class='w-full'>
                    <input name='username' type='text' placeholder='username' class='font-semibold py-2 px-4 text-xl rounded-lg border-gray-200 w-full' value="{{old('username')}}" />
                    @error('username')
                    <p class='text-red-800'>{{$message}}</p>
                    @enderror
                </div>
                <div class='w-full'>
                    <input name='email' type='email' placeholder='Email' class='font-semibold py-2 px-4 text-xl rounded-lg border-gray-200 w-full' value="{{old('email')}}"/>
                    @error('email')
                    <p class='text-red-800'>{{$message}}</p>
                    @enderror
                </div>
                <div class='w-full'>
                    <input name='password' type='password' placeholder='Password' class='font-semibold py-2 px-4 text-xl rounded-lg border-gray-200 w-full' />
                    @error('password')
                    <p class='text-red-800'>{{$message}}</p>
                    @enderror
                </div>
                <div class='w-full'>
                    <input name='password_confirmation' type='password' placeholder='Verify Password' class='font-semibold py-2 px-4 text-xl rounded-lg border-gray-200 w-full' />
                </div>
            </section>
            <div class='flex flex-col justify-center items-center gap-y-4 w-full'>
                <button type="submit" class='bg-gradient-to-r from-cyan-400 to-sky-400 hover:from-blue-400 hover:to-cyan-400 py-4 w-full rounded-lg text-lg font-semibold w-ful w-full'>Sign Up</button>
                <div class='flex items-center justify-center gap-x-2'>
                    <p>Already have an account?</p>
                    <a href='/login' class='text-red-800'>Login?</a>
                </div>
            </div>
        </form>
    </section>
</x-layout>
