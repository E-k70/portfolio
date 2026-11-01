<x-layout>
    <h1>create</h1>

    <form action="{{route('outfits.store')}}" method="post">
        @csrf
        
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"/>
            @error('title')
            <span class="text-red-900">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="{{ old('description') }}"/>
            @error('description')
            <span class="text-red-900">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="image_url">Image URL</label>
            <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}"/>
            @error('image_url')
            <span class="text-red-900">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="filter_id">Style</label>
            <select name="filter_id" id="filter_id">
                <option value="">No style</option>
                @foreach($filters as $filter)
                    <option value="{{ $filter->id }}"
                        {{ old('filter_id') == $filter->id ? 'selected' : '' }}>
                        {{ $filter->name }}
                    </option>
                @endforeach
            </select>
            @error('filter_id')
            <span class="text-red-900">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" name="submit">Save</button>

    </form>


</x-layout>
