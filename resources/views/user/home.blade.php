<x-app-layout>
    @php
        if ($user->seeks) {
            // for buttons at the top.. etc
            isset($user->seeks->gender) ? ($disabled = false) : ($disabled = true);
        } else {
            $disabled = true;
        }
        
        // for card buttons
        $step_1; // used in card 2
        if ($user->gender && $user->date_of_birth && $user->education && $user->employed && $user->country) {
            $step_1 = true;
        } else {
            $step_1 = false;
        }
        
        if ($step_1) {
            if ($user->seeks) {
                isset($user->seeks->gender) ? ($step_2 = false) : ($step_2 = true);
            } else {
                $step_2 = true;
            }
        } else {
            $step_2 = false;
        }
        
        isset($user->seeks->gender, $user->seeks->sexual_orientation) ? ($btn_2 = false) : ($btn_2 = true);
        
        // for matching button
        $user->subscription !== 'Free' && !$disabled ? ($match = true) : ($match = false);
    @endphp
    <div class="container">
        <div>
            <div class="mb-2">
                <h1 class="fw-bold">
                    Dashboard
                </h1>
                <small title="Your email has been verified">Account Status: Verified <i
                        class="bi bi-check-circle-fill text-primary"></i>
                </small>
            </div>
            <div>

                <button @class([
                    'btn',
                    'btn-outline-primary',
                    'fw-bold',
                    'm-1',
                    'bg-gradient',
                    'disabled' => $disabled,
                ]) title="View your profile">
                    <a href="{{ route('profile.index') }}" class="text-decoration-none">
                        <i class="bi bi-person-circle"></i> Profile
                    </a>
                </button>

                <button @class([
                    'btn',
                    'fw-bold',
                    'btn-outline-primary',
                    'm-1',
                    'bg-gradient',
                    'disabled' => $disabled,
                ]) title="Edit your Matching preference">
                    <a href="{{ route('seeks.index') }}" class="text-decoration-none">
                        <i class="bi bi-sliders"></i> Preference
                    </a>
                </button>

                <button @class([
                    'btn',
                    'fw-bold',
                    'btn-outline-primary',
                    'm-1',
                    'bg-gradient',
                    'position-relative',
                    'disabled' => $disabled,
                ]) title="View match request">
                    <a href="{{ route('match.index') }}" class="text-decoration-none">
                        <i class="bi bi-envelope-paper-heart-fill"></i> Requests
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $matches }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </button>

                <div class="d-flex align-items-center my-4 mx-1">
                <!-- <a href="{{ route('profile.edit') }}">
                    <button class="btn btn-dark">
                        Edit Profile
                    </button>
                </a> -->
                {{-- <a href="#" onclick="event.preventDefault(); document.getElementById('delete-profile').submit();">
                    <button class="btn btn-danger mx-2">
                        Delete Your Account
                    </button>
                </a> --}}

                <button type="button" class="btn btn-danger mx-2" data-bs-toggle="modal"
                    data-bs-target="#deleteProfile">
                    Delete Profile
                </button>

                <!-- Modal -->
                <div class="modal fade" id="deleteProfile" tabindex="-1" aria-labelledby="deleteProfileLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-danger" id="deleteProfileLabel">Account Deletion!</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    This process will delete all your user data from Lightning Speed Matchmnaker, and
                                    this <b>cannot be undone.</b><br><br>
                                    Are you sure you want to proceed?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger mx-4 px-4"
                                    onclick="event.preventDefault(); document.getElementById('delete-profile').submit();">
                                    Yes
                                </button>
                                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                                    No
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- for delete --}}
                <form id="delete-profile" action="{{ route('profile.delete') }}" method="POST" class="d-none">
                    @csrf
                    @method('DELETE')
                </form>
            </div>

            </div>
        </div>
        <hr>

        {{-- User Card --}}
        <div class="mx-3 my-2 shadow border card">
            <div class="card-body d-flex align-items-center g-3 p-2">
                <div style="width: 85px; height: 85px;">
                    <img src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('assets/img/logo.png') }}"
                        class="img-fluid rounded border" alt="...">
                </div>
                <div class="mx-3 text-black">
                    <h5>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </h5>

                    <p class="m-0">
                        <small class="fw-semibold">Age: <span class="fw-normal">{{ $age }} years old</span>
                        </small>
                    </p>

                    <p class="m-0">
                        <small class="fw-semibold">Last match: <span class="fw-normal">{{ $md }}</span>
                        </small>
                    </p>

                    <p class="m-0">
                        <small class="fw-semibold">Refer a friend
                            <a href="{{ route('referrals') }}"
                                class="bg-secondary text-white px-2 text-decoration-none">here
                            </a>
                        </small>
                    </p>
                </div>
            </div>
        </div>

        <div class="d-sm-flex justify-content-between align-items-center">
            {{-- STEP 1 --}}
            <div class="card mx-3 my-2 shadow">
                <div class="card-body">
                    <h5 class="card-title">
                        <span class="fw-bold">Step 1:</span> Complete Your Profile.
                    </h5>
                    <p class="card-text">
                        We need you to complete your profile so we can offer you more accurate matches.
                    </p>
                    <p class="fw-bold">
                        This takes just a few minutes.
                    </p>
                    <button @class([
                        'btn',
                        'btn-primary',
                        'shadow',
                        'position-relative',
                        'disabled' => $step_1,
                    ])>
                        <a href="{{ route('profile.edit') }}" class="text-white text-decoration-none">
                            {{ __('Complete Profile') }}
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                @if (!$step_1)
                                    not done
                                @else
                                    done
                                @endif
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                    </button>
                </div>
            </div>

            {{-- ARROW --}}
            <div class="d-none d-lg-block">
                <i class="bi bi-arrow-right fs-1 text-secondary"></i>
            </div>

            {{-- STEP 2 --}}
            <div class="card mx-3 my-2 shadow">
                <div class="card-body">
                    <h5 class="card-title">
                        <span class="fw-bold">Step 2:</span> Your Soulmate
                    </h5>
                    <p class="card-text">
                        Now you've completed your profile, tell us about the kind of partner you're
                        loking for.
                    </p>
                    <p>
                        <b>Let's get started!</b>
                    </p>
                    <button @class([
                        'btn',
                        'btn-primary',
                        'shadow',
                        'position-relative',
                        'disabled' => !$step_2,
                    ])>
                        <a href="{{ route('seeks.create') }}" class="text-white text-decoration-none">
                            {{ __('Preference Form') }}
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                @if ($btn_2)
                                    not done
                                @else
                                    done
                                @endif
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                    </button>
                </div>
            </div>

        </div>

        {{-- STEP 3 --}}
        <div>
            <div class="card mx-3 my-2 shadow">
                <div class="card-body">
                    <h5 class="card-title">
                        <span class="fw-bold">Step 3:</span> Find Your Match
                    </h5>
                    <p class="card-text">
                        We will now match you based on the details you have provided.
                    </p>
                    @if (!$match)
                        <p class="text-danger">
                            <i class="bi bi-info-square-fill text-danger"></i> Only <u class="fw-bold">paying
                                members</u> with complete
                            profiles can make matches.
                        </p>
                        <p>
                            You can click <a href="{{ route('subs') }}">here</a> to update your membership.
                        </p>
                    @endif
                    <a @class(['btn', 'btn-dark', 'disabled' => !$match]) href="{{ route('match') }}">
                        <i class="bi bi-search-heart fs-4"></i> Find Match
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
