<x-app-layout>
    <x-admin-panel>
        <div class="container">
            <div class="d-md-flex justify-content-between">
                <div class="col-md-3 mx-3">
                    <div>
                        <img src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('assets/img/logo.png') }}"
                            class="img-fluid rounded border" alt="..." style="width: 250px;">
                    </div>
                    <h3 class="text-dark text-decoration-none mt-2">
                        {{ $user->first_name }} {{ $user->last_name }}
                    </h3>
                    <small class="bg-secondary rounded-pill px-2 border border-2 text-white">
                        {{ $user->subscription }} member
                    </small>
                    <p>
                        {{ $user->extra }}
                    </p>
                </div>

                <div class="d-md-flex justify-content-between">
                    <div class="col-md-5">
                        <p>
                            <span class="fw-bold">
                                E-mail
                            </span> - {{ $user->email }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Phone
                            </span> - {{ $user->phone_number }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Sexual Orientation
                            </span> - {{ $user->orientation }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Gender
                            </span> - {{ $user->gender }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Height
                            </span> - {{ $user->height }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Weight
                            </span> - {{ $user->weight }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Eye Color
                            </span> - {{ $user->eye_color }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Hair Color
                            </span> - {{ $user->hair_color }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Body Type
                            </span> - {{ $user->body_type }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Date of Birth
                            </span> - {{ $user->date_of_birth }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Zodiac Sign
                            </span> - {{ $user->zodiac_sign }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Relationship status
                            </span> - {{ $user->relationship_status }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Looking For
                            </span> - {{ $user->looking_for }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Ethnicity
                            </span> - {{ $user->ethnicity }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Religion
                            </span> - {{ $user->religion }}
                        </p>

                    </div>

                    <div class="col-md-4">
                        <p>
                            <span class="fw-bold">
                                Children
                            </span> - {{ $user->children }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Education
                            </span> - {{ $user->education }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Relationship Status
                            </span> - {{ $user->relationship_status }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Employment Status
                            </span> - {{ $user->employed }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Profession
                            </span> - {{ $user->profession }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Activity Level
                            </span> - {{ $user->activity_level }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Possessive Partner?
                            </span> - {{ $user->how_jelly }}
                        </p>

                        <p>
                            <span class="fw-bold">
                                Smokes?
                            </span> - {{ $user->smokes }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Drugs?
                            </span> - {{ $user->drugs }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Drinks?
                            </span> - {{ $user->drinks }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Pets?
                            </span> - {{ $user->pets }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                First Language
                            </span> - {{ $user->first_language }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Second language
                            </span> - {{ $user->second_language }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                City
                            </span> - {{ $user->city }}
                        </p>
                        <p>
                            <span class="fw-bold">
                                Country
                            </span> - {{ $user->country }}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </x-admin-panel>
</x-app-layout>
