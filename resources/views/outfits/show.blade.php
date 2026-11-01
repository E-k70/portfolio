<x-layout>
    <h1>Outfit details</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <div class="show-card">
        <x-card>
            <img src="{{ $outfit->image_url }}" alt="{{ $outfit->title }}" class="outfit-image">
            <h3>{{ $outfit->title }}</h3>
            <p>{{ $outfit->description }}</p>

            @can('update', $outfit)
                <a href="{{ route('outfits.edit', $outfit) }}" class="button">Edit</a>
            @endcan

            @can('delete', $outfit)
                <form action="{{ route('outfits.destroy', $outfit) }}" method="post"
                      onsubmit="return confirm('Are you sure you want to delete this outfit?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endcan
        </x-card>
    </div>

    <p style="text-align:center; margin-top:20px;">
        <a href="{{ route('outfits.index') }}">Back to outfits</a>
    </p>
</x-layout>
