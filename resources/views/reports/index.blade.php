<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="GET" action="{{ route('reports.index') }}">

    {{-- Filter by Category --}}
    <select name="category">
        <option value="">All Categories</option>
        @foreach ($categories as $category)
            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                {{ ucwords($category) }}
            </option>
        @endforeach
    </select>

    {{-- Filter by Availability --}}
    <select name="availability">
        <option value="">All Availability</option>
        @foreach ($availabilities as $availability)
            <option value="{{ $availability }}" {{ request('availability') == $availability ? 'selected' : '' }}>
                {{ ucwords($availability) }}
            </option>
        @endforeach
    </select>

    <button type="submit">Filter</button>

    {{-- PDF Export Button --}}
    <a href="{{ route('reports.pdf', request()->query()) }}">Export PDF</a>

</form>

{{-- Report Table --}}
<table>
    <thead>
        <tr>
            <th>Fruit Name</th>
            <th>Category</th>
            <th>Price per KG</th>
            <th>Stock</th>
            <th>Availability</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($fruits as $fruit)
            <tr>
                <td>{{ $fruit->fruit_name }}</td>
                <td>{{ ucwords($fruit->category) }}</td>
                <td>{{ $fruit->price_per_kg }}</td>
                <td>{{ $fruit->stock }}</td>
                <td>{{ ucwords($fruit->availability) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No fruits found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
