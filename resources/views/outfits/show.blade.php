<x-app-layout>
    <h1>Outfit details</h1>

    <p>Titel: {{ $outfit->title }}</p>
    <p>Beschrijving: {{ $outfit->description }}</p>
    <img src="{{ $outfit->image_url }}" alt="{{ $outfit->title }}" class="outfit-image">

    <form action="{{ route('outfits.destroy', $outfit) }}" method="post"
          onsubmit="return confirm('Are you sure you want to delete this outfit');">
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

</x-app-layout>
