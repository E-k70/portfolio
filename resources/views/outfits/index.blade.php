<x-app-layout>
    <h1>
        Outfits
    </h1>

    @foreach($outfits as $outfit)
        <ul>
            <li> {{ $outfit->image_url }} </li>
            <li> {{ $outfit->title }} </li>
            <li> Description: {{ $outfit->description }} </li>
            <a href="{{ route('outfits.show', $outfit) }}" class="button">More details</a>
        </ul>
    @endforeach
</x-app-layout>
