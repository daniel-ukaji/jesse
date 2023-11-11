@php
    $word = $match->matched_user->last_name;
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
        style="background-image: linear-gradient(rgba(0, 4, 250, 0.3), rgba(0, 2, 133, 0.5)), url({{ $match->matched_user->profile_pic ? asset('storage/' . $match->matched_user->profile_pic) : asset('assets/img/logo.png') }});">
    </div>
    <div class="container">
        <div id="up">
            <div class="dp_box my-2 rounded">
                <img src="{{ $match->matched_user->profile_pic ? asset('storage/' . $match->matched_user->profile_pic) : asset('assets/img/logo.png') }}"
                    alt="display picture" id="dp" class="img-fluid" />
            </div>

            <div>
                <h3>{{ $match->matched_user->first_name }} {{ $last_name }}.</h3>
                <i id="data" class="d-none">{{ $match->matched_user->date_of_birth }}</i> {{-- JS gets data from here --}}
                <p id="age"></p>
                <p>{{ $match->matched_user->city }}, {{ $match->matched_user->country }}</p>
            </div>

            <hr>

            <div>
                <h4>{{ $match->matched_user->first_name }}'s Bio</h4>
                <div class="border border-secondary px-1 m-1 d-inline-block rounded bg-white">
                    <i class="bi bi-stars"></i> {{ $match->matched_user->zodiac_sign }}
                </div>
                <div class="border border-secondary px-1 m-1 d-inline-block rounded bg-white">
                    <i class="bi bi-briefcase"></i> {{ $match->matched_user->profession }}
                </div>
                <div class="border border-secondary px-1 m-1 d-inline-block rounded bg-white">
                    <i class="bi bi-person-workspace"></i> {{ $match->matched_user->education }}
                </div>
                <div class="border border-secondary px-1 m-1 d-inline-block rounded bg-white">
                    <i class="bi bi-person-heart"></i> {{ $match->matched_user->relationship_status }}
                </div>

                <p>{{ $match->matched_user->extra }}</p>

                <div>
                    <h3>
                        Extra Information
                    </h3>
                    <div>
                        <b>Gender:</b> {{ $match->matched_user->gender }}, <b>Orientation:</b>
                        {{ $match->matched_user->orientation }}
                    </div>
                    <div>
                        <b>Ethnicity:</b> {{ $match->matched_user->ethnicity }}, <b>Religion:</b>
                        {{ $match->matched_user->religion }}
                    </div>
                    <div>
                        <b>Looking for:</b> {{ $match->matched_user->looking_for }}
                    </div>
                    <div>
                        <b>Height:</b> {{ $match->matched_user->height }},
                        <b>Weight:</b> {{ $match->matched_user->weight }}lbs,
                        <b>Hair color:</b {{ $match->matched_user->hair_color }}>
                    </div>
                    <div>
                        <b>Language:</b> {{ $match->matched_user->first_language }},
                        <b>Second Langauge:</b> {{ $match->matched_user->second_language }}
                    </div>
                    <div>
                        <b>Pets:</b> {{ $match->matched_user->pets }},
                        <b>Smokes:</b> {{ $match->matched_user->smokes }},
                        <b>Drugs:</b> {{ $match->matched_user->drugs }}
                    </div>
                    <div>
                        <b>How often you workout:</b> {{ $match->matched_user->activity_level }}
                    </div>
                    <div>
                        <b>Jealous type:</b> {{ $match->matched_user->how_jelly }}
                    </div>
                </div>
            </div>

            <div class="d-inline-block bg-white bg-gradient border border-secondary border-1 rounded px-3 p-1 fw-bold my-3"
                title="Request Status: {{ $match->status }}">
                Status: {{ $match->status }}
            </div>

            <div class="d-sm-flex justify-content-between mt-3">
                <div>
                    <img class="img-fluid img-thumbnail"
                        src="{{ $match->matched_user->profile_pic ? asset('storage/' . $match->matched_user->profile_pic) : asset('assets/img/logo.png') }}"
                        alt="...">
                </div>
                <div>
                    <img class="img-fluid img-thumbnail"
                        src="{{ $match->matched_user->dp_1 ? asset('storage/' . $match->matched_user->dp_1) : asset('assets/img/logo.png') }}"
                        alt="...">
                </div>
                <div>
                    <img class="img-fluid img-thumbnail"
                        src="{{ $match->matched_user->dp_2 ? asset('storage/' . $match->matched_user->dp_2) : asset('assets/img/logo.png') }}"
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

        const age = document.getElementById('age').innerHTML = `${yearsDiff} years old`;
    </script>
</x-app-layout>
