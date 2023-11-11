<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-header">
                        <p class="m-0 fs-5">
                            We match you based on your preferences
                        </p>
                    </div>
                    <div class="card-body">
                        <p class="m-0">
                            I'm looking for - <b> A {{ $seeks->sexual_orientation }} {{ $seeks->gender }}.</b>
                        </p>
                        <hr>
                        <div>
                            <p class="fs-6">
                                Other Preferences:
                            </p>
                            <ol>
                                <li>
                                    Height: <b>{{ $seeks->height }}</b>
                                </li>
                                <li>
                                    Body Type: <b>{{ $seeks->body_type }}</b>
                                </li>
                                <li>
                                    Hair Color: <b>{{ $seeks->hair_color }}</b>
                                </li>
                                <li>
                                    Eye Color: <b>{{ $seeks->eye_color }}</b>
                                </li>
                                <li>
                                    Ethnicity: <b>{{ $seeks->ethnicity }} </b>
                                </li>
                                <li>
                                    Religion: <b>{{ $seeks->religion }} </b>
                                </li>
                                <li>
                                    Zodiac Sign: <b>{{ $seeks->zodiac_sign }} </b>
                                </li>
                                <li>
                                    Can you date them if they own pets? <b>{{ $seeks->date_pet_owner }} </b>
                                </li>
                                <li>
                                    Can date them if they do drugs? <b>{{ $seeks->date_drug }} </b>
                                </li>
                                <li>
                                    Can you date them if the drink? <b>{{ $seeks->date_drink }} </b>
                                </li>
                                <li>
                                    Can you date a smoker? <b>{{ $seeks->date_smoker }} </b>
                                </li>
                            </ol>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('seeks.edit', $seeks) }}">
                                <button class="btn btn-dark">
                                    Edit Preference
                                </button>
                            </a>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('delete-preference').submit();">
                                <button class="btn btn-danger mx-3">
                                    Reset Preferences
                                </button>
                            </a>

                            {{-- for delete --}}
                            <form id="delete-preference" action="{{ route('seeks.destroy', $seeks) }}" method="POST"
                                class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
