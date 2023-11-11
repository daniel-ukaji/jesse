<x-app-layout>
    <x-admin-panel>
        <div class="container">
            <h3>Subscriptions</h3>
            <ul>
                <li>
                    Tap on the membership name to edit or delete it.
                </li>
            </ul>
            <ol class="list-group list-group-numbered">
                @unless (count($subs) == 0)
                    @foreach ($subs as $sub)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">
                                    <a href="{{ route('sub.edit', $sub) }}" class="text-dark text-decoration-none">
                                        {{ $sub->subscription_type }}
                                    </a>
                                </div>
                                {{ $sub->description }}
                            </div>
                            <span class="badge bg-success rounded-pill">$ {{ $sub->price }}</span>
                        </li>
                    @endforeach
                @else
                    <p> No subscriptions, click <b>Create New</b> to add new subscriptions for your users.</p>
                @endunless
            </ol>
            <a href="{{ route('sub.create') }}">
                <button class="btn btn-primary my-3">Create New</button>
            </a>
        </div>
    </x-admin-panel>
</x-app-layout>
