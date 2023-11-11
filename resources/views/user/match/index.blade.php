{{-- This page shows the previously saved matches --}}
<x-app-layout>
    <div class="container">
        <h3>Saved Matches</h3>
        <p>All your accepted matches will be showed here.</p>
        @unless (count($matches) == 0)
            @foreach ($matches as $match)
                {{-- Format the user's last name --}}
                @php
                    $word = $match->matched_user->last_name;
                    $last_name = substr($word, 0, 1);
                @endphp

                <div class="bg-white p-3 rounded border mb-2 d-flex align-items-center justify-content-between">
                    <div>
                        <h3>
                            <a href="{{ route('match.profile', $match) }}" class="text-decoration-none text">
                                {{ $match->matched_user->first_name }} {{ $last_name }}.
                            </a>
                        </h3>
                        <span class="m-0">{{ $match->match_info }} match with you</span> |
                        <a href="{{ route('match.profile', $match) }}">
                            See more
                        </a>
                    </div>

                    @if ($match->status == 'accepted')
                        <div>
                            <span class="bg-success bg-gradient text-white px-2 py-1">{{ $match->status }}</span>
                        </div>
                    @elseif ($match->status == 'pending')
                        <div>
                            <span class="bg-secondary bg-gradient text-white px-2 py-1">{{ $match->status }}</span>
                        </div>
                    @elseif ($match->status == 'declined')
                        <div>
                            <span class="bg-danger bg-gradient text-white px-2 py-1">{{ $match->status }}</span>
                        </div>
                    @endif
                </div>
            @endforeach
        @else
            <div class="p-3 bg-secondary text-white">
                <p>
                    No match made yet.
                </p>
                <a href="{{ route('dashboard') }}">
                    <button class="btn btn-light">Back to dashboard</button>
                </a>
            </div>
        @endunless
    </div>

    <div class="container">
        <hr>

        <h3>Match Requests</h3>
        <p>Accepted/Declined requests will be deleted within 90 days</p>

        @unless (count($requests) == 0)
            @foreach ($requests as $req)
                @php
                    $word = $req->user->last_name;
                    $last_name = substr($word, 0, 1);
                @endphp
                <div class="bg-white p-3 rounded border mb-2 d-flex align-items-center justify-content-between">
                    <div>
                        <h3> {{ $req->user->first_name }} {{ $last_name }}.</h3>
                        <p class="m-0">{{ $req->user->first_name }} is a {{ $req->match_info }} match with you</p>
                    </div>
                    <div>
                        <a href="{{ route('match.show', $req) }}">
                            <button class="btn btn-outline-secondary py-0 px-2">
                                View
                            </button>
                        </a>
                        <button class="btn btn-light bg-gradient border py-0 px-2" title="Status: {{ $req->status }}"
                            disabled>
                            {{ $req->status }}
                        </button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="p-2 bg-secondary text-white">
                <span>
                    No match requests at the moment
                </span>
            </div>
        @endunless
    </div>
</x-app-layout>
