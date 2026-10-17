<x-app-layout>
    <h1>
        Fitjes
    </h1>

    @foreach($outfits as $outfit)
        <ul>
            <li> {{ $outfit->title }} </li>
            <li> Description: {{ $outfit->description }} </li>

        </ul>
    @endforeach
</x-app-layout>
