<x-app-layout>
    <div class="container">
        <h2>Referrals</h2>
        <p>
            You've found something wonderful, don't keep it to yourself. <br>
            Fill the form below to refer your friends, family and loved ones and you'll be given a referral bonus
        </p>
        <div class="d-flex align-items-center justify-content-start mt-4">
            <form method="POST" action="{{ route('submit.ref') }}" class="row g-3">
                @csrf

                {{-- Reference's full name --}}
                <div class="col-md-6">
                    <label for="ref_name" class="form-label fw-bold">
                        Full Name <b class="text-danger">*</b>
                    </label>
                    <input type="text" class="form-control" id="ref_name" name="ref_name"
                        value="{{ old('ref_name') }}" placeholder="John Doe" required>

                    @error('ref_name')
                        <p class="text-danger fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- gender --}}
                <div class="col-md-6">
                    <label for="ref_gender" class="form-label fw-bold">
                        Gender <b class="text-danger">*</b>
                    </label>
                    <select id="ref_gender" class="form-select" aria-label="Default select example" name="ref_gender"
                        required>
                        <option value="" selected disabled>
                            {{ __('Choose a option') }}
                        </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                {{-- email --}}
                <div class="col-md-6">
                    <label for="referral_email" class="form-label fw-bold">
                        Email <span class="fw-normal">(optional)</span>
                    </label>
                    <input type="email" class="form-control" id="referral_email" name="referral_email"
                        value="{{ old('referral_email') }}" placeholder="johndoe@xyz.com">

                    @error('referral_email')
                        <p class="text-danger fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- phone number --}}
                <div class="col-md-6">
                    <label for="ref_no" class="form-label fw-bold">
                        Phone Number <b class="text-danger">*</b>
                    </label>
                    <input type="tel" class="form-control" id="ref_no" name="ref_no" value="{{ old('ref_no') }}"
                        placeholder="+234 818 367 0422" required>

                    @error('ref_no')
                        <p class="text-danger fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <small class="m-0">
                    - Fields marked with <b class="text-danger fs-3" style="position: relative; top: 9px">*</b> are
                    compulsory.
                    <br>
                    - Make sure to notify your friends before submitting their details to us as we will reach out to
                    them.
                    <br>
                    - If your friend has been referred with the same email, your form will be rejected.
                </small>

                <div class="mt-3 d-flex align-item-center justify-content-between">
                    <div>
                        <button type="submit" class="btn btn-success shadow fw-bold">Refer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
