@php
    $query_params_str = request()->query('category');
    $query_params = explode(',', trim($query_params_str, '[]'));
@endphp
<form method="POST" action="/redirect" class='flex gap-x-4 gap-y-8 justify-center items-start flex-wrap lg:flex-col px-6 py-4'>
    @csrf
    <x-checkbox name='category[]' value='new' id='New' :query_params="$query_params"/>
    <x-checkbox name='category[]' value='trending' id='Trending' :query_params="$query_params"/>
    <x-checkbox name='category[]' value='suit price' id='Suit Price' :query_params="$query_params"/>
    <x-checkbox name='category[]' value='quality' id='Quality' :query_params="$query_params"/>
    <x-checkbox name='category[]' value='promotion' id='Promotion' :query_params="$query_params"/>
    <button type="submit" class='lg:self-center text-2xl rounded-lg bg-green-200 hover:bg-green-300 transition duration-300 px-4 py-2'>Filter</button>
</form>
