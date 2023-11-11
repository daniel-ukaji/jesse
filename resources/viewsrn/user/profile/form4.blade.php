<x-app-layout>
    <div class="d-flex align-items-center justify-content-center mt-3">
        <div
            class="bg-white border rounded-3 shadow col-sm-10 col-md-10 col-lg-6 mx-3 p-4 animate__animated animate__fadeIn">
            <div class="text-left my-2">
                <h3>A little more about yourself</h3>
            </div>
            <div class="progress mb-3" role="progressbar" aria-label="Example with label" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 90%">90%</div>
            </div>
            @php
                Auth::user()->country != '' ? ($isActive = false) : ($isActive = true);
            @endphp
            <form method="POST" action="{{ route('profile.update', auth()->id()) }}" enctype="multipart/form-data"
                class="row g-3">
                @csrf
                @method('PATCH')
                {{-- pets --}}
                <div class="col-md-3">
                    <label for="pets" class="form-label fw-bold">Do you have pets? <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="pets" name="pets"
                        required>
                        <option value="{{ Auth::user()->pets }}" selected disabled>
                            {{ Auth::user()->pets ? Auth::user()->pets . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- smoke --}}
                <div class="col-md-3">
                    <label for="smokes" class="form-label fw-bold">Do you smoke? <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="smokes" name="smokes"
                        required>
                        <option value="{{ Auth::user()->smokes }}" selected disabled>
                            {{ Auth::user()->smokes ? Auth::user()->smokes . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- drink --}}
                <div class="col-md-3">
                    <label for="drinks" class="form-label fw-bold">Do you drink? <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="drinks" name="drinks"
                        required>
                        <option value="{{ Auth::user()->drinks }}" selected disabled>
                            {{ Auth::user()->drinks ? Auth::user()->drinks . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Yes, once a week">Yes, once a week</option>
                        <option value="Yes, socially">Yes, socially</option>
                        <option value="Yes, moderately">Yes, moderately</option>
                        <option value="I'm one drink from being admitted to AA">I'm one drink from being admitted to AA
                        </option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- drugs --}}
                <div class="col-md-3">
                    <label for="drugs" class="form-label fw-bold">Do you do drugs? <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="drugs" name="drugs"
                        required>
                        <option value="{{ Auth::user()->drugs }}" selected disabled>
                            {{ Auth::user()->drugs ? Auth::user()->drugs . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- How jelous --}}
                <div class="col-md-3">
                    <label for="how_jelly" class="form-label fw-bold">Jealous type? <b class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="how_jelly" name="how_jelly"
                        required>
                        <option value="{{ Auth::user()->how_jelly }}" selected disabled>
                            {{ Auth::user()->how_jelly ? Auth::user()->how_jelly . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- profile pic --}}
                <div class="col-md-3">
                    <label for="profile_pic" class="form-label fw-bold">Profile Picture</label>
                    <input class="form-control" type="file" name="profile_pic" id="profile_pic">
                </div>

                {{-- display pic --}}
                <div class="col-md-3">
                    <label for="dp_1" class="form-label fw-bold">Display Picture</label>
                    <input class="form-control" type="file" name="dp_1" id="dp_1">
                </div>

                {{-- display pic --}}
                <div class="col-md-3">
                    <label for="dp_2" class="form-label fw-bold">Display Picture</label>
                    <input class="form-control" type="file" name="dp_2" id="dp_2">
                </div>

                {{-- country --}}
                <div class="col-md-6">
                    <label for="country" class="form-label fw-bold">What country do you come from? <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="country" name="country"
                        required>
                        <option value="{{ Auth::user()->country }}" selected disabled>
                            {{ Auth::user()->country ? Auth::user()->country . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Canada">Canada</option>
                        <option value="United States">United States</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="city" class="form-label fw-bold">What city are located?</label>
                    <input class="form-control" type="text" name="city" id="city"
                        placeholder="Your City" value="{{ old('city', Auth::user()->city) }}">
                </div>

                <div class="mt-4 d-flex align-item-center justify-content-between">
                    <div>
                       
                            <button type="submit" class="btn btn-success shadow fw-bold">save</button>
                        
                    </div>
                    <div>
                        <a href="/profile/edit/form/3" class="btn btn-outline-dark shadow fw-bold">
                            <i class="bi bi-arrow-bar-left"></i> Back
                        </a>
                        <a href="/" @class([
                            'btn',
                            'btn-danger',
                            'disabled' => $isActive,
                            'shadow',
                            'fw-bold',
                        ])>
                            Finish
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
