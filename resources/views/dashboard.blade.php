<x-layout>
    <h1>Hello, {{ auth()->user()->name }}</h1>

    <div class="dashboard">
        <x-card>
            <h3>Your account</h3>
            <p>{{ auth()->user()->email }}</p>
            <a href="{{ route('profile.edit') }}" class="button">Edit profile</a>
        </x-card>

        <x-card>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Log out</button>
            </form>
        </x-card>
    </div>
</x-layout>
