<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fruits') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-primary-button class=""><a href="{{ route('fruits.create')}}"> Add Fruit</a></x-primary-button>
                </div>

                <table class="border-collapse border border-black-500 m-4">
                    <thead>
                        <th class="border border-black">Fruit Name</th>
                        <th class="border border-black">Category</th>
                        <th class="border border-black">Price Per Kilogram</th>
                        <th class="border border-black">Stock</th>
                        <th class="border border-black">Description</th>
                        <th class="border border-black">Availability</th>
                        <th class="border border-black">Action</th>
                    </thead>
                    <tbody>
                        @forelse ($fruits as $fruit)
                        <tr>
                            <td>{{$fruit->fruit_name}}</td>
                            <td>{{$fruit->category}}</td>
                            <td>{{$fruit->price_per_kg}}</td>
                            <td>{{$fruit->stock}}</td>
                            <td>{{$fruit->description}}</td>
                            <td>{{$fruit->availability}}</td>
                            <td>
                                <a href="{{ route('fruits.edit', $fruit)}}">Edit Fruit</a>
                                <form action="{{ route('fruits.destroy', $fruit)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button>Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td>No fruit found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
