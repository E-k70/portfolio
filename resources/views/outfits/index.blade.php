<x-app-layout>
    <h1>
        Outfits
    </h1>

    @foreach($outfits as $outfit)
        <ul>
            <li> {{ $outfit->image_url }} </li>
            <li> {{ $outfit->title }} </li>
            <li> Description: {{ $outfit->description }} </li>
        </ul>
    @endforeach
</x-app-layout>
