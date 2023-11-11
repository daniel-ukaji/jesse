<x-app-layout>
    <x-admin-panel>
        <div class="container">
            <h3>All Referrals</h3>
            <ul>
                <li>
                    Delete entries once you're done with them
                </li>
            </ul>
            <ol class="list-group list-group-numbered">
                @unless (count($refs) == 0)
                    @foreach ($refs as $ref)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">
                                    <span class="text-dark text-decoration-none">
                                        {{ $ref->ref_name }}
                                    </span>
                                </div>
                                {{ $ref->ref_gender }} | {{ $ref->ref_no }}
                                {{ $ref->ref_email ? '| ' . $ref->ref_email : '' }}
                            </div>
                            <span class="badge bg-gradient bg-primary mx-2 rounded-pill">
                                <span class="badge bg-white text-dark rounded-pill">referred by:</span>
                                {{ $ref->user->first_name }}
                            </span>
                            <a href=""
                                onclick="event.preventDefault(); document.getElementById('delete-ref').submit();"
                                class="badge bg-danger rounded-pill">
                                <i class="bi bi-trash fw-bold fs-6"></i>
                            </a>
                        </li>
                        <form action="{{ route('user.refs.delete', $ref) }}" method="POST" class="d-none" id="delete-ref">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endforeach
                @else
                    <p> No referrals at the moment</p>
                @endunless
            </ol>
        </div>
    </x-admin-panel>
</x-app-layout>
