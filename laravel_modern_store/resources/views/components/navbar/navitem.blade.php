@props(['category', 'icon'])
@php
    $isActive = $category == $slot ? 'bg-green-100 shadow-lg hover:bg-green-100' : "";
    if(!isset($icon)) $icon = ''
@endphp
<li {{$attributes->merge(['class' => 'capitalize text-green-600 bg-gray-100  cursor-pointer hover:bg-gray-200 rounded-lg '. $isActive])}}>
    <a href="/{{$slot}}" type="submit" class='w-full px-8 py-2 rounded-lg cursor-pointer flex items-center gap-x-2 justify-center capitalize'><i class="{{$icon}}"></i>{{$slot}} </a>
</li>
