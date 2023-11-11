@php
    $word = $match->user->last_name;
    $last_name = substr($word, 0, 1);
@endphp

<style>
    #banner {
        margin-top: -30px;
        background-position: right bottom, right;
        background-blend-mode: normal;
        background-repeat: no-repeat, no-repeat;
        background-size: cover, cover;
    }

    .dp_box {
        width: 200px;
        height: 200px;
        border: 1px solid black;
        background: #fff;
        overflow: hidden;
    }

    #dp {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #up {
        position: relative;
        top: -100px;
    }
</style>

<x-app-layout>
    <div class="h-25" id="banner"
        style="background-image: linear-gradient(rgba(0, 4, 250, 0.3), rgba(0, 2, 133, 0.5)), url({{ $match->user->profile_pic ? asset('storage/' . $match->user->profile_pic) : asset('assets/img/logo.png') }});">
    </div>
    <div class="container">
        <div id="up">
            <div class="dp_box my-2 rounded">
                <img src="{{ $match->user->profile_pic ? asset('storage/' . $match->user->profile_pic) : asset('assets/img/logo.png') }}"
                    alt="display picture" id="dp" class="img-fluid" />
            </div>

            <div>
                <h3>{{ $match->user->first_name }} {{ $last_name }}.</h3>
                <i id="data" class="d-none">{{ $match->user->date_of_birth }}</i>
                <p id="age"></p>
                <p>{{ $match->user->city }}, {{ $match->user->country }}</p>
            </div>

            <hr>

            <div>
                <h4>{{ $match->user->first_name }}'s Bio</h4>
                <div class="border border-secondary px-1 m-1 d-inline-block shadow bg-white">
                    <i class="bi bi-stars"></i> {{ $match->user->zodiac_sign }}
                </div>
                <div class="border border-secondary px-1 m-1 d-inline-block shadow bg-white">
                    <i class="bi bi-briefcase"></i> {{ $match->user->profession }}
                </div>
                <div class="border border-secondary px-1 m-1 d-inline-block shadow bg-white">
                    <i class="bi bi-person-workspace"></i> {{ $match->user->education }}
                </div>
                <div class="border border-secondary px-1 m-1 d-inline-block shadow bg-white">
                    <i class="bi bi-person-heart"></i> {{ $match->user->relationship_status }}
                </div>

                <p>{{ $match->user->extra }}</p>

                <div>
                    <h3>
                        Extra Information
                    </h3>
                    <div>
                        <b>Gender:</b> {{ $match->user->gender }}, <b>Orientation:</b> {{ $match->user->orientation }}
                    </div>
                    <div>
                        <b>Ethnicity:</b> {{ $match->user->ethnicity }}, <b>Religion:</b> {{ $match->user->religion }}
                    </div>
                    <div>
                        <b>Looking for:</b> {{ $match->user->looking_for }}
                    </div>
                    <div>
                        <b>Height:</b> {{ $match->user->height }},
                        <b>Weight:</b> {{ $match->user->weight }}lbs,
                        <b>Hair color:</b {{ $match->user->hair_color }}>
                    </div>
                    <div>
                        <b>Language:</b> {{ $match->user->first_language }},
                        <b>Second Langauge:</b> {{ $match->user->second_language }}
                    </div>
                    <div>
                        <b>Pets:</b> {{ $match->user->pets }},
                        <b>Smokes:</b> {{ $match->user->smokes }},
                        <b>Drugs:</b> {{ $match->user->drugs }}
                    </div>
                    <div>
                        <b>How often you workout:</b> {{ $match->user->activity_level }}
                    </div>
                    <div>
                        <b>Jealous type:</b> {{ $match->user->how_jelly }}
                    </div>
                </div>

                @if ($match->status == 'pending')
                    <div class="my-3">
                        <button class="btn btn-success"
                            onclick="event.preventDefault(); document.getElementById('accept').submit();">
                            Accept
                        </button>
                        <button class="btn btn-danger mx-3"
                            onclick="event.preventDefault(); document.getElementById('decline').submit();">
                            Decline
                        </button>
                    </div>

                    {{-- Accept --}}
                    <form action="{{ route('match.update', $match->id) }}" method="POST" id="accept"
                        class="d-none">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="status" value="accepted">
                    </form>
                    {{-- Decline --}}
                    <form action="{{ route('match.update', $match->id) }}" method="POST" id="decline"
                        class="d-none">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="status" value="declined">
                    </form>
                @elseif ($match->status == 'accepted')
                    <span class="bg-success bg-gradient my-1 p-2 d-inline-block border text-white"
                        title="Your match maker will contatct you soon for reservations">
                        Request accepted
                    </span>
                @elseif ($match->status == 'declined')
                    <span class="bg-danger bg-gradient my-1 p-2 d-inline-block border text-white">
                        Request Rejected
                    </span>
                @endif
            </div>

            <div class="d-sm-flex justify-content-between mt-3">
                <div>
                    <img class="img-fluid img-thumbnail"
                        src="{{ $match->user->profile_pic ? asset('storage/' . $match->user->profile_pic) : asset('assets/img/logo.png') }}"
                        alt="...">
                </div>
                <div>
                    <img class="img-fluid img-thumbnail"
                        src="{{ $match->user->dp_1 ? asset('storage/' . $match->user->dp_1) : asset('assets/img/logo.png') }}"
                        alt="...">
                </div>
                <div>
                    <img class="img-fluid img-thumbnail"
                        src="{{ $match->user->dp_2 ? asset('storage/' . $match->user->dp_2) : asset('assets/img/logo.png') }}"
                        alt="...">
                </div>
            </div>
        </div>
    </div>

    <script>
        const data = document.getElementById('data').innerHTML;

        const birthDate = new Date(data);
        const today = new Date();

        var yearsDiff = today.getFullYear() - birthDate.getFullYear();
        const monthsDiff = today.getMonth() - birthDate.getMonth();
        const daysDiff = today.getDate() - birthDate.getDate();

        // Check if the birth date hasn't happened yet this year
        if (monthsDiff < 0 || (monthsDiff === 0 && daysDiff < 0)) {
            yearsDiff--;
        }

        const age = document.getElementById('age').innerHTML = `${yearsDiff} years`;
    </script>
</x-app-layout>
