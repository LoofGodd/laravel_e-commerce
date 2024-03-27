@php
    $truth= ['service' => ['text' => "Never Worry about service", 'icon' => 'fa-solid fa-gem'], 'delivery' => ['text' => "Never Worry", 'icon' => 'fa-solid fa-truck'], 'Payment' =>['text' => "Never Worry", 'icon' => 'fa-solid fa-money-bill'], 'Available' =>['text' => "Never Worry", 'icon' => 'fa-solid fa-person-running']];
@endphp
<section class='bg-gray-100 flex flex-wrap gap-x-4 items-center justify-between px-10 flex-col md:flex-row'>
    @foreach ($truth as $key=>$value)
        <x-truth.truth-item :name="$key" :text="$value['text']" :icon="$value['icon']"/>
    @endforeach
</section>
