@props(['name', 'value', 'id', 'query_params'])
<div class='flex gap-x-2 items-center justify-center'>
    <input type="checkbox" name="{{$name}}" value="{{$value}}" {{in_array($value, $query_params) ? 'checked' : null}} class='text-green-500 border-green-500/40 hover:border-cyan-500 p-3 cursor-pointer'/> <span class='text-xl font-semibold text-gray-700 tracking-wider'>{{$id}}</span>
</div>
