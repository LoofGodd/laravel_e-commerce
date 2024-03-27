<x-layout :carts="$carts">
    <header>
        <x-hero><div class='flex flex-col gap-y-4 items-center justify-center'>
                 <span class='text-4xl font-semibold text-gray-200'>Welcome to our store</span>
                <button class='bg-emerald-600 px-5 py-2 font-xl font-semibold rounded-lg hover:bg-emerald-300 transtion duration-300'>Discover more</button>
             </div></x-hero>
    </header>
    <main class='relative w-screen'>
        <div class='none xl:h-[30rem]'></div>
        <section class='w-screen lg:w-[70vw] lg:mx-auto xl:absolute xl:left-1/2 xl:-top-16 xl:-translate-x-1/2 bg-white shadow-lg shadow-cyan-800 px-7 py-3'>
            <header class='mt-8 grid place-items-center'>
                <h1 class='text-4xl font-bold  text-gray-600 underline decolartion-green-500'>About Us</h1>
            </header>
            <main>
                <div class='lgmt-8'>
                    <h1 class='text-4xl font-semibold text-sky-600 uppercase tracking-widest my-4'>question</h1>
                    <p class='text-gray-700 tracking-wider'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores rerum ex illum ducimus eos adipisci exercitationem necessitatibus impedit recusandae, ea inventore rem minus! Mollitia suscipit perspiciatis laborum cum architecto vel.</p>
                </div>
                <div class='mt-8'>
                    <h1 class='text-2xl font-semibold text-sky-600 uppercase tracking-widest my-4'>question</h1>
                    <p class='text-gray-700 tracking-wider'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores rerum ex illum ducimus eos adipisci exercitationem necessitatibus impedit recusandae, ea inventore rem minus! Mollitia suscipit perspiciatis laborum cum architecto vel.</p>
                </div>
                <div class='mt-8 flex flex-col justify-center items-center gap-y-4'>
                    <h1 class='text-xl font-semibold text-blue-800'>Get more information</h1>
                    <a href='/contact' class='text-md font-semibold text-blue-800 bg-blue-200 px-4 py-2 rounded-lg uppercase hover:bg-cyan-100 hover:text-cyan-800 transition-all duration-300'>contact us</a>
                </div>
            </main>
        </section>
    </main>
</x-layout>
