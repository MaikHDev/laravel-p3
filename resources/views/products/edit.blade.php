<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit product') }}
        </h2>
    </x-slot>
<div>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
</div>
<form method="post" action="{{route('product.update', $product)}}">
    @csrf
    @method('put')
    <input type="text" maxlength="30" name="name" placeholder="Name" value="{{$product->name}}" />
    <input type="number" min="1" max="10000" name="qty" placeholder="Quantity" value="{{$product->qty}}"/>
    <input type="text" name="price" placeholder="Price" value="{{$product->price}}"/>
    <input type="text" maxlength="255" name="description" placeholder="Description" value="{{$product->description}}"/>
    <button class="text-white bg-gray-500 dark:active:text-gray-300 p-2 rounded" type="submit">
        Update product
    </button>
</form>
</x-app-layout>
