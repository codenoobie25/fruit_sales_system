<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Fruit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('fruits.update.post', $fruit)}}" method="POST">
                        
                        @csrf

                        <label>Fruit Name:</label>
                        <input type="text" name="fruit_name" value="{{$fruit->fruit_name}}">

                        <label>Category:</label>
                        <select name="category">
                        @foreach ($categories as $category)
                            <option value="{{$category}}" {{ $fruit->category == $category ? 'selected' : ''}}>
                                {{$category}}
                            </option>
                        @endforeach
                        </select>
                         
                        <label>Price Per Kilogram:</label>
                        <input type="number" name="price_per_kg" value="{{$fruit->price_per_kg}}">

                        <label>Stock:</label>
                        <input type="number" name="stock" value="{{$fruit->stock}}">

                        <label>Description:</label>
                        <input type="text" name="description" value="{{$fruit->description}}">

                        <label>Availability:</label>
                        <select name="availability">
                            @foreach ($availabilities as $availability)
                                <option value="{{$availability}}" {{$fruit->availability == $availability ? 'selected' : ''}}>
                                    {{ $availability}}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit" class="border border-black rounded p-3">Update Fruit</button>
                        <a href="{{ route('fruits.index')}}" class="border border-black rounded p-3">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
