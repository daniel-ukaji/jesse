<x-app-layout>
    <x-admin-panel>
        <div class="container">

            <form action="/admin/dashboard/users/" class="col-md-6 shadow">
                <div class="input-group mb-3">
                    <button class="input-group-text bg-white fw-bold" type="submit">Search</button>
                    <input type="text" class="form-control" name="search"
                        placeholder="Search by name, gender or country">
                </div>
            </form>
            <span class="border border-4 fw-bold p-1 rounded">
                {{ $title }} - {{ count($allUsers) }}
            </span>
            <ol class="list-group list-group-numbered mt-3">
                @unless(count($users) == 0)
                    @foreach ($users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="d-flex ">
                                    <img src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('assets/img/logo.png') }}"
                                        class="img-fluid rounded border" alt="..."
                                        style="width: 50px; height: 50px; aspect-ratio: 3/2;">
                                    {{--  object-fit: contain; --}}
                                    <div class="mx-2">
                                        <a href="{{ route('users.show', $user) }}"
                                            class="text-dark text-decoration-none fw-bold">
                                            {{ $user->first_name }} {{ $user->last_name }}
                                            <br>
                                        </a>
                                        @if ($user->orientation || $user->gender || $user->country)
                                            <a href="/admin/dashboard/users/?orientation={{ $user->orientation }}"
                                                class="text-decoration-none text-white bg-secondary rounded px-1 mx-1">
                                                <small> {{ $user->orientation }}</small>
                                            </a>
                                            <a href="/admin/dashboard/users/?gender={{ $user->gender }}"
                                                class="text-decoration-none text-white bg-secondary rounded px-1 mx-1">
                                                <small>{{ $user->gender }}</small>
                                            </a>
                                            <a href="/admin/dashboard/users/?country={{ $user->country }}"
                                                class="text-decoration-none text-white bg-secondary rounded px-1 mx-1">
                                                <small>{{ $user->country }}</small>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <span class="badge bg-secondary rounded-pill">{{ $user->subscription }}</span>
                        </li>
                    @endforeach
                @else
                    <p class="bg-secondary p-2 text-white">No users to show</p>
                @endunless
            </ol>
            <div class="my-1 p-2">
                {{ $users->links() }}
            </div>
        </div>
    </x-admin-panel>
</x-app-layout>
