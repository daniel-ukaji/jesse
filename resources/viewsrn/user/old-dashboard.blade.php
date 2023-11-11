<div class="row justify-content-center">
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-body bg-primary bg-gradient">
                <p class="m-0 fs-3 text-white fw-bold">
                    Hi there, {{ $user->first_name }} 🤙🏽
                </p>
                <span class="text-white">
                    <a href="{{ route('subs') }}" class="text-dark rounded px-2 text-decoration-none bg-white border">
                        {{ __('Change Subscription') }}
                    </a>
                    <a href="{{ route('referrals') }}"
                        class="text-dark rounded px-2 mx-2 text-decoration-none bg-white border">
                        {{ __('Refer a friend') }}
                    </a>
                    <br>
                    <hr>
                    @isset($user->seeks->gender)
                        <a href="{{ route('seeks.index') }}"
                            class="text-dark rounded px-2 text-decoration-none bg-white border">
                            {{ __('View Preference') }}
                        </a>
                        <a href="{{ route('profile.index') }}"
                            class="text-dark rounded px-2 mx-2 text-decoration-none bg-white border">
                            {{ __('Go To Profile') }}
                        </a>
                        <br>
                    @endisset
                </span>
            </div>
        </div>
    </div>

    {{-- show if user hasn't filled these fields --}}
    <div class="col-md-8 mb-4">
        @unless ($user->gender && $user->date_of_birth && $user->education && $user->employed && $user->country)
            <div class="card shadow animate__animated animate__headShake">
                <div class="card-header text-danger">
                    <p class="m-0 fs-5">
                        {{ __('Complete Your Matching Questionaire') }}
                    </p>
                </div>

                <div class="card-body">
                    <p>
                        To move forward with completing your profile, we would need you to answer all of the
                        questions to the best of your abilities to increase the quality of your matches.
                        <br>
                        This takes just a few minutes.
                    </p>
                    <p>
                        <b>Let's get started!</b>
                    </p>
                    <a href="{{ route('profile.edit') }}">
                        <button class="btn btn-primary shadow">
                            {{ __('Edit Profile') }}
                        </button>
                    </a>
                </div>
            </div>
        @else
            @unless (isset($user->seeks->gender))
                <div class="card animate__animated animate__headShake">
                    <div class="card-header">{{ __('Describe your ideal person') }}</div>

                    <div class="card-body">
                        <p>
                            Now you've filled out the necessary quesetions, tell us about the kind of partner you're
                            loking for.
                        </p>
                        <p>
                            <b>Let's get started!</b>
                        </p>
                        <a href="{{ route('seeks.create') }}">
                            <button class="btn btn-dark shadow fw-bolder">
                                {{ __('Start') }}
                            </button>
                        </a>
                    </div>
                </div>
            @endunless
        @endunless
    </div>

    <div class="col-md-8">
        @isset($user->seeks->gender)
            <div class="card shadow animate__animated animate__headShake">
                <div class="card-header fw-bold text-success">{{ __('You\'re all set!') }}</div>

                <div class="card-body">
                    <p>
                        Now you've filled out the necessary quesetions, we will make you the best match possible
                        with the details you've provided.
                    </p>

                    @if ($user->subscription !== 'Free')
                        <p class="fw-bold text-success">
                            Find your Match!
                        </p>
                        <button class="btn btn-success"
                            onclick="event.preventDefault(); 
                            document.getElementById('match').submit();">
                            <i class="bi bi-search-heart fs-5"></i> Match
                        </button>
                        <form id="match" action="{{ route('match', Auth::id()) }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <p class="text-secondary">
                            You are on the free plan and this means you're unable to make matches for yourself.
                            <br>
                            <span class="text-danger">
                                Change your subscription to be able to make Matches
                            </span>
                        </p>
                    @endif
                </div>
            </div>
        @endisset
    </div>
    <div class="col-md-8">
        <h4>How to get matched</h4>
    </div>
</div>
