<x-app-layout>
    <div class="d-flex align-items-center justify-content-center mt-3">
        <div class="bg-white border rounded-3 shadow col-sm-4 col-lg-6 mx-3 p-4">
            <div class="text-center my-4">
                <h2>Create Your {{ $url }} Account</h2>
            </div>
            <form method="POST" action="{{route('/register/admin')}}" class="row g-3">
                @csrf
                {{-- first name --}}
                <div class="col-md-6">
                    <label for="first_name" class="form-label fw-bold">First Name</label>
                    <input type="text" class="form-control" name="first_name" placeholder="John"
                        value="{{ old('first_name') }}">
                    @error('first_name')
                        <p class="text-danger fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- last name --}}
                <div class="col-md-6">
                    <label for="last_name" class="form-label fw-bold">Last Name</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Doe"
                        value="{{ old('last_name') }}">
                    @error('last_name')
                        <p class="text-danger fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- email --}}
                <div class="col-12">
                    <label for="email" class="form-label fw-bold">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="john@xyz.com"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-danger fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- password --}}
                <div class="col-12">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    @error('password')
                        <p class="text-danger fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- password cocfirmation --}}
                <div class="col-12">
                    <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                    @error('password_confirmation')
                        <p class="text-danger fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary shadow fw-bold">Sign In</button>
                </div>
                <div>
                    <p>
                        Already have an account? <a href="{{url('/login/admin')}}">Log in</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
