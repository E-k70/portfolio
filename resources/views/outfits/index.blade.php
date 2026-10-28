<x-layout>
    <h1>
        Outfits
    </h1>

    <form action="{{ route('outfits.index') }}" method="get">
        <input type="text" name="search">
        <button>Search</button>
    </form>


    <form action="{{ route('outfits.index') }}" method="GET">
        <label for="filter">Filter:</label>

        <select name="filter" id="filter">
            <option value="">All styles</option>

            @foreach($filters as $filter)
                <option value="{{ $filter->id }}"
                    {{ request('filter') == $filter->id ? 'selected' : '' }}>
                    {{ $filter->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Filter</button>
    </form>

    <div class="outfit-grid">
        @foreach($outfits as $outfit)
            <x-card>
                <img src="{{ $outfit->image_url }}" alt="{{ $outfit->title }}" class="outfit-image">
                <h3>{{ $outfit->title }}</h3>
                <p>{{ $outfit->filter?->name }}</p>
                <p>Description: {{ $outfit->description }}</p>
                <a href="{{ route('outfits.show', $outfit) }}" class="button">More details</a>
            </x-card>
        @endforeach
    </div>

</x-layout>
