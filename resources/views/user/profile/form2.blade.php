<x-app-layout>
    <div class="d-flex align-items-center justify-content-center mt-3">
        <div
            class="bg-white border rounded-3 shadow col-sm-4 col-md-6 col-lg-6 mx-3 p-4 animate__animated animate__fadeIn">
            <div class="text-left my-2">
                <h3>Describe yourself</h3>
                <p class="m-0">Please fill all fields for accurately for proper <b>Match Making</b></p>
            </div>
            <div class="progress mb-3" role="progressbar" aria-label="Example with label" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 50%">50%</div>
            </div>
            @php
                Auth::user()->religion != '' ? ($isActive = false) : ($isActive = true);
            @endphp
            <form method="POST" action="{{ route('profile.update', auth()->id()) }}" enctype="multipart/form-data"
                class="row g-3">
                @csrf
                @method('PATCH')
                {{-- height --}}
                <div class="col-md-6">
                    <label for="height" class="form-label fw-bold">How tall are you?</label>
                    <select class="form-select" aria-label="Default select example" id="height" name="height"
                        value="{{ old('height') }}">
                        <option value="{{ Auth::user()->height }}" selected disabled>
                            {{ Auth::user()->height ? Auth::user()->height . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="4ft - 4'5ft">4ft - 4'5ft</option>
                        <option value="4'6ft - 5'5ft">4'6ft - 5'5ft</option>
                        <option value="5'5ft - 6ft">5'5ft - 6ft</option>
                        <option value="6ft - 6'5ft">6ft - 6'5ft</option>
                        <option value="6'5 above">6'5 above</option>
                    </select>
                </div>
                <input name="form" value="form2" hidden>
                {{-- weight --}}
                <div class="col-md-6">
                    <label for="weight" class="form-label fw-bold">How much do you weigh?</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend">lbs</span>
                        <input type="number" class="form-control" id="weight" name="weight"
                            value="{{ old('weight', Auth::user()->weight) }}" placeholder="140"
                            aria-describedby="inputGroupPrepend">
                    </div>
                </div>

                {{-- body type --}}
                <div class="col-md-6">
                    <label for="body_type" class="form-label fw-bold">What is your body type</label>
                    <select class="form-select" aria-label="Default select example" id="body_type" name="body_type">
                        <option value="{{ Auth::user()->body_type }}" selected disabled>
                            {{ Auth::user()->body_type ? Auth::user()->body_type . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Slim">Slim</option>
                        <option value="Petite">Petite</option>
                        <option value="Muscular">Muscular</option>
                        <option value="Chubby">Chubby</option>
                        <option value="Fat">Fat</option>
                    </select>
                </div>

                {{-- hair color --}}
                <div class="col-md-6">
                    <label for="hair_color" class="form-label fw-bold">Hair color</label>
                    <select class="form-select" aria-label="Default select example" id="hair_color" name="hair_color">
                        <option value="{{ Auth::user()->hair_color }}" selected disabled>
                            {{ Auth::user()->hair_color ? Auth::user()->hair_color . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Black">Black</option>
                        <option value="Brunette">Brunette</option>
                        <option value="Blonde">Blonde</option>
                        <option value="Red">Red</option>
                    </select>
                </div>

                {{-- eye color --}}
                <div class="col-md-6">
                    <label for="eye_color" class="form-label fw-bold">Eye color</label>
                    <select class="form-select" aria-label="Default select example" id="eye_color" name="eye_color">
                        <option value="{{ Auth::user()->eye_color }}" selected disabled>
                            {{ Auth::user()->eye_color ? Auth::user()->eye_color . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Black">Black</option>
                        <option value="Brown">Brown</option>
                        <option value="Blue">Blue</option>
                        <option value="Green">Green</option>
                        <option value="Hazel">Hazel</option>
                    </select>
                </div>

                {{-- ethnicity --}}
                <div class="col-md-6">
                    <label for="ethnicity" class="form-label fw-bold">Ethnicity</label>
                    <select class="form-select" aria-label="Default select example" id="ethnicity" name="ethnicity">
                        <option value="{{ Auth::user()->ethnicity }}" selected disabled>
                            {{ Auth::user()->ethnicity ? Auth::user()->ethnicity . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="White/Caucasian">White/Caucasian</option>
                        <option value="Asian">Asian</option>
                        <option value="African">African</option>
                        <option value="Latinos">Latino/Hispanic</option>
                        <option value="Middle Eastern/Arab">Middle Eastern/Arab</option>
                        <option value="Mixed/Multiracial">Mixed/Multiracial</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                {{-- religion --}}
                <div class="col-md-6">
                    <label for="religion" class="form-label fw-bold">Religious stance</label>
                    <select class="form-select" aria-label="Default select example" id="religion" name="religion">
                        <option value="{{ Auth::user()->religion }}" selected disabled>
                            {{ Auth::user()->religion ? Auth::user()->religion . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Muslim">Muslim</option>
                        <option value="Christian">Christian</option>
                        <option value="Jewish">Jewish</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddhist">Buddhist</option>
                        <option value="Agnostic">Agnostic</option>
                        <option value="Atheist">Atheist</option>
                    </select>
                </div>

                {{-- zodiac  --}}
                <div class="col-md-6">
                    <label for="zodiac_sign" class="form-label fw-bold">Your zodiac sign</label>
                    <select class="form-select" aria-label="Default select example" id="zodiac_sign"
                        name="zodiac_sign">
                        <option value="{{ Auth::user()->zodiac_sign }}" selected disabled>
                            {{ Auth::user()->zodiac_sign ? Auth::user()->zodiac_sign . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Capricon">Capricon</option>
                        <option value="Libra">Libra</option>
                        <option value="Sagittarius">Sagittarius</option>
                        <option value="Cancer">Cancer</option>
                        <option value="Gemini">Gemini</option>
                        <option value="Leo">Leo</option>
                        <option value="Aquarius">Aquarius</option>
                        <option value="Taurus">Taurus</option>
                        <option value="Pisces">Pisces</option>
                        <option value="Virgo">Virgo</option>
                        <option value="Aries">Aries</option>
                        <option value="Scorpio">Scorpio</option>
                    </select>
                </div>

                <div class="mt-4 d-flex align-item-center justify-content-between">
                    <div>
                        <button type="submit" class="btn btn-success shadow fw-bold">Save</button>
                    </div>
                    <div>
                        <a href="{{url('/profile/edit/form/1')}}" class="btn btn-outline-dark shadow fw-bold">
                            <i class="bi bi-arrow-bar-left"></i>
                            Back
                        </a>
                        <button href="{{url('/profile/edit/form/3')}}" @class([
                            'btn',
                            'btn-danger',
                            'disabled' => $isActive,
                            'shadow',
                            'fw-bold',
                        ])>
                            Next
                            <i class="bi bi-arrow-bar-right"></i>
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
