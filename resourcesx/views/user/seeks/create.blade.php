<x-app-layout>
    <div class="d-flex align-items-center justify-content-center mt-3">
        <div
            class="bg-white border rounded-3 shadow col-sm-10 col-md-10 col-lg-6 mx-3 p-4 animate__animated animate__fadeIn">
            <div class="text-left my-4">
                <h3>Now, tell us more about your soulmate.</h3>
                <p>The first two (2) fields have been filled based on your previous answers</p>
            </div>
            <form method="POST" action="{{ route('seeks.store') }}" enctype="multipart/form-data" class="row g-3">
                @csrf
                {{-- gender --}}
                <div class="col-md-6">
                    <label for="gender" class="form-label fw-bold">Their gender <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="gender" name="gender"
                        required>
                        <option value="{{ $option }}" selected>
                            {{ $option }}
                        </option>
                    </select>
                </div>

                {{-- sexual orientation --}}
                <div class="col-md-6">
                    <label for="sexual_orientation" class="form-label fw-bold">
                        Their sexual orientation
                        <b class="text-danger">*</b>
                    </label>
                    <select class="form-select" aria-label="Default select example" id="sexual_orientation"
                        name="sexual_orientation" required>
                        <option value="{{ $user->orientation }}" selected>
                            {{ $user->orientation }}
                        </option>
                    </select>
                </div>

                {{-- height --}}
                <div class="col-md-6">
                    <label for="height" class="form-label fw-bold">Their height</label>
                    <select class="form-select" aria-label="Default select example" id="height" name="height"
                        value="{{ old('height') }}">
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="4ft - 4'5ft">4ft - 4'5ft</option>
                        <option value="4'6ft - 5'5ft">4'6ft - 5'5ft</option>
                        <option value="5'5ft - 6ft">5'5ft - 6ft</option>
                        <option value="6ft - 6'5ft">6ft - 6'5ft</option>
                        <option value="6'5 above">6'5 above</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- body type --}}
                <div class="col-md-6">
                    <label for="body_type" class="form-label fw-bold">Their body type</label>
                    <select class="form-select" aria-label="Default select example" id="body_type" name="body_type">
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Slim">Slim</option>
                        <option value="Petite">Petite</option>
                        <option value="Muscular">Muscular</option>
                        <option value="Chubby">Chubby</option>
                        <option value="Fat">Fat</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- hair color --}}
                <div class="col-md-6">
                    <label for="hair_color" class="form-label fw-bold">Their hair color</label>
                    <select class="form-select" aria-label="Default select example" id="hair_color" name="hair_color">
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Black">Black</option>
                        <option value="Brunette">Brunette</option>
                        <option value="Blonde">Blonde</option>
                        <option value="Red">Red</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- eye color --}}
                <div class="col-md-6">
                    <label for="eye_color" class="form-label fw-bold">Their eye color</label>
                    <select class="form-select" aria-label="Default select example" id="eye_color" name="eye_color">
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Black">Black</option>
                        <option value="Brown">Brown</option>
                        <option value="Blue">Blue</option>
                        <option value="Green">Green</option>
                        <option value="Hazel">Hazel</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- physically activity --}}
                <div class="col-md-6">
                    <label for="how_pa" class="form-label fw-bold"
                        title="How physically active do you want your partner to be">Activity level</label>
                    <select class="form-select" aria-label="Default select example" id="how_pa" name="how_pa">
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Once a year">Once a year</option>
                        <option value="A couple times a week">A couple times a week</option>
                        <option value="Daily fitness">Daily fitness</option>
                        <option value="Couch potato">I don't mind a couch potato</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- education --}}
                <div class="col-md-6">
                    <label for="education" class="form-label fw-bold"
                        title="What level of education would you like them to have">Education <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="education" name="education"
                        required>
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Some college">Some college</option>
                        <option value="Bachelors">Bachelors</option>
                        <option value="Masters">Masters</option>
                        <option value="Post-graduate">Post-graduate</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- What they're looking for --}}
                <div class="col-md-6">
                    <label for="rel_type" class="form-label fw-bold"
                        title="What kind of relationship do you expect your partner to be searching for ?">What they
                        seek <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="rel_type" name="rel_type"
                        required>
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Marriage">Someone looking for Marriage</option>
                        <option value="Platonic relationship">Someone looking for a platonic relationship</option>
                        <option value="Friends with benefit">Someone looking for friends with benefits</option>
                        <option value="Hang out buddy">Someone looking to spend time doing outdoor activities</option>
                        <option value="N/A" class="text-danger">Not sure</option>
                    </select>
                </div>

                {{-- how_jelly --}}
                <div class="col-md-6">
                    <label for="how_jelly" class="form-label fw-bold">Do you want an obsessive partner ?</label>
                    <select class="form-select" aria-label="Default select example" id="how_jelly" name="how_jelly">
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- ethnicity --}}
                <div class="col-md-6">
                    <label for="ethnicity" class="form-label fw-bold">Ethnicity <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="ethnicity" name="ethnicity"
                        required>
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="American">American</option>
                        <option value="Asian">Asian</option>
                        <option value="African">African</option>
                        <option value="Latinos">Latino/Hispanic</option>
                        <option value="Middle Eastern/Arab">Middle Eastern/Arab</option>
                        <option value="Mixed/Multiracial">Mixed/Multiracial</option>
                        <option value="Other">Other</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- religion --}}
                <div class="col-md-6">
                    <label for="religion" class="form-label fw-bold">
                        Religion
                        <b class="text-danger">*</b>
                    </label>
                    <select class="form-select" aria-label="Default select example" id="religion" name="religion"
                        required>
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Muslim">Muslim</option>
                        <option value="Christian">Christian</option>
                        <option value="Jewish">Jewish</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddhist">Buddhist</option>
                        <option value="Agnostic">Agnostic</option>
                        <option value="Atheist">Atheist</option>
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- zodiac  --}}
                <div class="col-md-6">
                    <label for="zodiac_sign" class="form-label fw-bold">Their zodiac sign</label>
                    <select class="form-select" aria-label="Default select example" id="zodiac_sign"
                        name="zodiac_sign">
                        <option value="" selected disabled>
                            Choose an option
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
                        <option value="N/A" class="text-danger">I don't mind</option>
                    </select>
                </div>

                {{-- children --}}
                <div class="col-md-6">
                    <label for="children" class="form-label fw-bold"
                        title="Do you mind a partner with children?">Children? <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="children" name="children"
                        required>
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="Yes, independent">Yes, if they're on their own</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- date pet owner --}}
                <div class="col-md-6">
                    <label for="date_pet_owner" class="form-label fw-bold">Can you date a pet owner? <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="date_pet_owner"
                        name="date_pet_owner" required>
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- date drug doer --}}
                <div class="col-md-6">
                    <label for="date_drug" class="form-label fw-bold">
                        Can you date someone who does drugs ? <b class="text-danger">*</b>
                    </label>
                    <select class="form-select" aria-label="Default select example" id="date_drug" name="date_drug"
                        required>
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- date drinker --}}
                <div class="col-md-6">
                    <label for="date_drink" class="form-label fw-bold">
                        Can you date someone who drinks ? <b class="text-danger">*</b>
                    </label>
                    <select class="form-select" aria-label="Default select example" id="date_drink"
                        name="date_drink" required>
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- date smoker --}}
                <div class="col-md-6">
                    <label for="date_smoker" class="form-label fw-bold">
                        Can you date someone who smokes ? <b class="text-danger">*</b>
                    </label>
                    <select class="form-select" aria-label="Default select example" id="date_smoker"
                        name="date_smoker" required>
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- country --}}
                <div class="col-md-12">
                    <label for="country" class="form-label fw-bold">
                        Country <b class="text-danger">*</b>
                    </label>
                    <select class="form-select" aria-label="Default select example" id="country" name="country"
                        autocomplete="on" required>
                        <option value="" selected disabled>
                            Choose an option
                        </option>
                        <option value="Canada">Canada</option>
                        <option value="United States">United States</option>
                    </select>
                </div>

                <div class="mt-4 d-flex align-item-center justify-content-between">
                    <div>
                        <a href="/" class="btn btn-secondary shadow fw-bold">Back</a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success shadow fw-bold">Done & Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
