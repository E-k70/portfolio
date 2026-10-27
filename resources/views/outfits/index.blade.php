<x-layout>
    <h1>
        Outfits
    </h1>

    <div class="outfit-grid">
        @foreach($outfits as $outfit)
            <x-card>
                <img src="{{ $outfit->image_url }}" alt="{{ $outfit->title }}" class="outfit-image">
                <h3>{{ $outfit->title }}</h3>
                <p>Description: {{ $outfit->description }}</p>
                <a href="{{ route('outfits.show', $outfit) }}" class="button">More details</a>
            </x-card>
        @endforeach
    </div>

</x-layout>
