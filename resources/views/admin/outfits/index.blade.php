<x-layout>
    <style>
        .admin-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 750px;
            padding: 10px 0;
        }

        .admin-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-actions form {
            margin: 0;
        }

        .btn {
            padding: 7px 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
            background: #fff;
            color: #222;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-danger {
            background: #d9534f;
            border-color: #d43f3a;
            color: #fff;
        }

        .toggle {
            min-width: 110px;
            padding: 7px 16px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            border: 1px solid #ccc;
        }

        .toggle.on {
            background: #5b8fc9;
            border-color: #4a7ab0;
            color: #fff;
        }

        .toggle.off {
            background: #e6e6e6;
            color: #555;
        }
    </style>

    <h1>Manage outfits</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @foreach($outfits as $outfit)
        <div class="admin-row">
            <div>
                <strong>{{ $outfit->title }}</strong><br>
                <small>by {{ $outfit->user?->name }}</small>
            </div>

            <div class="admin-actions">
                <form action="{{ route('admin.outfits.toggle', $outfit) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="toggle {{ $outfit->active ? 'on' : 'off' }}">
                        {{ $outfit->active ? 'Active' : 'Not active' }}
                    </button>
                </form>

                <a href="{{ route('outfits.edit', $outfit) }}" class="btn">Edit</a>

                <form action="{{ route('outfits.destroy', $outfit) }}" method="post"
                      onsubmit="return confirm('Are you sure you want to delete this outfit?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

    <p style="margin-top: 30px;">
        <a href="{{ route('outfits.create') }}">Add new outfit</a>
    </p>
</x-layout>
