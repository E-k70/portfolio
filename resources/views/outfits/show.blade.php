<x-app-layout>
    <h1>Outfit details</h1>

    <p>Titel: {{ $outfit->title }}</p>
    <p>Beschrijving: {{ $outfit->description }}</p>
    <p>Afbeelding: {{ $outfit->image_url }}</p>

    <form action="{{ route('outfits.destroy', $outfit) }}" method="post"
          onsubmit="return confirm('Are you sure you want to delete this outfit');">
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

</x-app-layout>
