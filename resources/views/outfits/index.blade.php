<x-app-layout>
    <h1>
        Outfits
    </h1>

    @foreach($outfits as $outfit)
        <ul>
            <img src="{{ $outfit->image_url }}" alt="{{ $outfit->title }}" class="outfit-image">
            <li> {{ $outfit->title }} </li>
            <li> Description: {{ $outfit->description }} </li>
            <a href="{{ route('outfits.show', $outfit) }}" class="button">More details</a>
        </ul>
    @endforeach
</x-app-layout>
