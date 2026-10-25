<x-app-layout>
    <h1>
        Outfits
    </h1>

    <x-card>
        @foreach($outfits as $outfit)
            <img src="{{ $outfit->image_url }}" alt="{{ $outfit->title }}" class="outfit-image">
            <p> {{ $outfit->title }} </p>
            <p> Description: {{ $outfit->description }} </p>
            <a href="{{ route('outfits.show', $outfit) }}" class="button">More details</a>
        @endforeach
    </x-card>

</x-app-layout>
