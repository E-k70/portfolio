<x-layout>
    <h1>
        Outfits
    </h1>

    <form action="{{ route('outfits.index') }}" method="GET" class="filter-bar">
        <input type="text" name="search" placeholder="Search…" value="{{ request('search') }}">

        <select name="filter" id="filter">
            <option value="">All styles</option>
            @foreach($filters as $filter)
                <option value="{{ $filter->id }}" {{ request('filter') == $filter->id ? 'selected' : '' }}>
                    {{ $filter->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Search</button>
    </form>

    <div class="outfit-grid">
        @foreach($outfits as $outfit)
            <x-card>
                <img src="{{ $outfit->image_url }}" alt="{{ $outfit->title }}" class="outfit-image">
                <h3>{{ $outfit->title }}</h3>
                <p>{{ $outfit->filter?->name }}</p>
                <p>Description: {{ $outfit->description }}</p>

                @auth
                    <form action="{{ route('outfits.like', $outfit) }}" method="post">
                        @csrf
                        <button type="submit">
                            {{ in_array($outfit->id, $likedIds) ? '♥' : '♡' }} {{ $outfit->liked_by_count }}
                        </button>
                    </form>
                @else
                    <p>♡ {{ $outfit->liked_by_count }}</p>
                @endauth


                <a href="{{ route('outfits.show', $outfit) }}" class="button">More details</a>
            </x-card>
        @endforeach
    </div>

</x-layout>
