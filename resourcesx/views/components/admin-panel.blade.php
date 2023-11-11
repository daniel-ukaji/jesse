<!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
@props(['users', 'subs', 'matches', 'pending'])

<div class="container">
    <div class="dashboard">
        <div class="my-card">
            <h3 class="mb-2"><i class="bi bi-person-check"></i><br>
                Users
            </h3>
            <span>
                <a href="{{ route('users.index') }}" class="text-white text-decoration-none">Members</a>
                <br>
                <a href="{{ route('sub.users') }}" class="text-white text-decoration-none">Subscribed Members</a>
            </span>
        </div>
        <div class="my-card">
            <h3 class="mb-2"><i class="bi bi-valentine"></i><br>
                Matches
            </h3>
            <span>
                <a href="{{ route('admin.dashboard') }} " class="text-white text-decoration-none">View Matches</a>
                <br>
                <a href="{{ route('create.mail') }}" class="text-white text-decoration-none">Send Emails</a>
            </span>
        </div>
        <div class="my-card">
            <h3 class="mb-2"><i class="bi bi-gear"></i><br>
                Manage
            </h3>
            <span>
                <a href="{{ route('manage.subs') }}" class="text-white text-decoration-none">
                    Memberships
                </a>
                <br>
                <a href="{{ route('user.refs') }}" class="text-white text-decoration-none">
                    Referrals
                </a>
            </span>
        </div>
    </div>

    {{-- --------------------SLOT --}}

    <div class="my-3">
        {{ $slot }}
    </div>

    {{-- Mutually Accepted Matches --}}
    @if (Route::is('admin.dashboard'))
        <div class="container accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="fs-4 accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        Recent Matches
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <ol class="list-group list-group-numbered">
                            @unless (count($matches) == 0)
                                @foreach ($matches as $match)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">{{ $match->user->first_name }}'s match</div>
                                            <a href="{{ route('users.show', $match->user) }}"
                                                class="rounded-pill bg-white text-dark border border-2 text-decoration-none px-1">
                                                {{ $match->user->first_name }}
                                                {{ $match->user->last_name }}
                                            </a>
                                            <i class="bi bi-arrow-left-right text-danger m-2"></i>
                                            <a href="{{ route('users.show', $match->matched_user) }}"
                                                class="rounded-pill bg-white text-dark border border-2 text-decoration-none px-1">
                                                {{ $match->matched_user->first_name }}
                                                {{ $match->matched_user->last_name }}
                                            </a>
                                        </div>
                                        <span class="badge bg-info rounded-pill mx-2">{{ $match->match_info }}</span>

                                        <span class="badge bg-danger rounded-pill">
                                            <a class="m-0"
                                                onclick="event.preventDefault(); document.getElementById('delete-{{ $match->id }}').submit();">
                                                <i class="bi bi-x text-white"></i>
                                            </a>

                                            <form method="POST" action="{{ route('match.delete', $match) }}"
                                                class="d-none" id="delete-{{ $match->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </span>
                                    </li>
                                @endforeach
                            @else
                                <p>
                                    No Matches have been made yet.
                                </p>
                            @endunless
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pending Matches --}}
        <div class="container accordion mt-3" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="fs-4 accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded=""
                        aria-controls="panelsStayOpen-collapseTwo">
                        Pending Matches
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <ol class="list-group list-group-numbered">
                            @unless (count($pending) === 0)
                                @foreach ($pending as $pend)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">{{ $pend->user->first_name }}'s match</div>
                                            <a href="{{ route('users.show', $pend->user) }}"
                                                class="rounded-pill bg-white text-dark border border-2 text-decoration-none px-1">
                                                {{ $pend->user->first_name }}
                                                {{ $pend->user->last_name }}
                                            </a>
                                            <i class="bi bi-arrow-left-right text-danger m-2"></i>
                                            <a href="{{ route('users.show', $pend->matched_user) }}"
                                                class="rounded-pill bg-white text-dark border border-2 text-decoration-none px-1">
                                                {{ $pend->matched_user->first_name }}
                                                {{ $pend->matched_user->last_name }}
                                            </a>
                                        </div>
                                        <span class="badge bg-info rounded-pill mx-2">{{ $pend->match_info }}</span>

                                        <span class="badge bg-danger rounded-pill">
                                            <a class="m-0"
                                                onclick="event.preventDefault(); document.getElementById('delete-{{ $pend->id }}').submit();">
                                                <i class="bi bi-x text-white"></i>
                                            </a>

                                            <form method="POST" action="{{ route('match.delete', $pend) }}" class="d-none"
                                                id="delete-{{ $pend->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </span>
                                    </li>
                                @endforeach
                            @else
                                <p>
                                    No Pending Matches here.
                                </p>
                            @endunless
                        </ol>
                    </div>
                </div>


            </div>
        </div>
    @endif
