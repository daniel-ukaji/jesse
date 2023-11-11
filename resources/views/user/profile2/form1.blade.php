<x-app-layout>
    <div class="d-flex align-items-center justify-content-center mt-3">
        <div
            class="bg-white border rounded-3 shadow col-sm-4 col-md-6 col-lg-6 mx-3 p-4 animate__animated animate__fadeIn">
            <div class="text-left my-2">
                <h3>{{ Auth::user()->first_name }}, we need these basic details about you</h3>
                <p class="m-0">
                    Make sure the details you give are accurate and correct.
                </p>
            </div>

            <div class="progress mb-3" role="progressbar" aria-label="Example with label" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 25%">25%</div>
            </div>
            @php
                Auth::user()->looking_for != '' ? ($isActive = false) : ($isActive = true);
            @endphp
            <form method="POST" action="{{ route('profile.update', auth()->id()) }}" enctype="multipart/form-data"
                class="row g-3">
                @csrf
                @method('PATCH')
                {{-- Date of birth --}}
                <div class="col-md-6">
                    <label for="date_of_birth" class="form-label fw-bold">
                        Date of Birth
                        <b class="text-danger">*</b>
                    </label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                        value="{{ old('date_of_birth', Auth::user()->date_of_birth) }}" required>
                </div>

                {{-- gender --}}
                <div class="col-md-6">
                    <label for="gender" class="form-label fw-bold">Select your Gender <b
                            class="text-danger">*</b></label>
                    <select id="gender" class="form-select" aria-label="Default select example" name="gender"
                        required>
                        <option value="{{ Auth::user()->gender }}" selected disabled>
                            {{ Auth::user()->gender ? Auth::user()->gender . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                {{-- Sex orientation --}}
                <div class="col-md-6">
                    <label for="orientation" class="form-label fw-bold">What is your sexual orientation <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="orientation" name="orientation"
                        required>
                        <option value="{{ Auth::user()->orientation }}" selected disabled>
                            {{ Auth::user()->orientation ? Auth::user()->orientation . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Heterosexual">Heterosexual</option>
                        <option value="Bisexual">Bisexual</option>
                        <option value="Lesbian">Lesbian</option>
                        <option value="Gay">Gay</option>
                    </select>
                </div>

                {{-- relationship status --}}
                <div class="col-md-6">
                    <label for="relationship_status" class="form-label fw-bold">Current Relationship Status <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="relationship_status"
                        name="relationship_status" required>
                        <option value="{{ Auth::user()->relationship_status }}" selected disabled>
                            {{ Auth::user()->relationship_status ? Auth::user()->relationship_status . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Single">Single</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Married">Married</option>
                        <option value="Complicated">It's complicated</option>
                    </select>
                </div>

                {{-- children --}}
                <div class="col-md-6">
                    <label for="children" class="form-label fw-bold">Do you have children? <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="children" name="children"
                        required>
                        <option value="{{ Auth::user()->children }}" selected disabled>
                            {{ Auth::user()->children ? Auth::user()->children . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Yes">Yes, they live with me</option>
                        <option value="Yes, independent">Yes, but they live elsewhere</option>
                        <option value="No">No</option>
                    </select>
                </div>

                {{-- looking for --}}
                <div class="col-md-6">
                    <label for="looking_for" class="form-label fw-bold">What are you looking for ? <b
                            class="text-danger">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="looking_for" name="looking_for"
                        required>
                        <option value="{{ Auth::user()->looking_for }}" selected disabled>
                            {{ Auth::user()->looking_for ? Auth::user()->looking_for . __(' • ') : __('Choose a option') }}
                        </option>
                        <option value="Marriage">Marriage</option>
                        <option value="Platonic relationship">Platonic relationship</option>
                        <option value="Friends with benefit">Friends with benefit</option>
                        <option value="Hang out buddy">Hang out buddy</option>
                    </select>
                </div>

                <small class="m-0">
                    Fields marked with <b class="text-danger fs-3" style="position: relative; top: 9px">*</b> are
                    compulsory
                </small>

                <div class="mt-3 d-flex align-item-center justify-content-between">
                    <div>
                        <button type="submit" class="btn btn-success shadow fw-bold">Save</button>
                    </div>
                    <div>
                        <a href="{{url('/profile/edit/form/2')}}" @class([
                            'btn',
                            'btn-outline-danger',
                            'disabled' => $isActive,
                            'shadow',
                            'fw-bold',
                        ])>
                            Next
                            <i class="bi bi-arrow-bar-right"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
