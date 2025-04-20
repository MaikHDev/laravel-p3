<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create product') }}
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
<form method="post" action="{{route('product.store')}}">
    @csrf
    @method('post')
    <input type="text" maxlength="30" name="name" placeholder="Name" />
    <input type="number" min="1" max="10000" name="qty" placeholder="Quantity" />
    <input type="text" name="price" placeholder="Price" />
    <input type="text" maxlength="255" name="description" placeholder="Description" />
    <input type="submit" value="Create product" />
</form>
</x-app-layout>
