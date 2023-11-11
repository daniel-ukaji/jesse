<x-app-layout>
    <div class="d-flex align-items-center justify-content-center mt-3">
        <div class="bg-white border rounded-3 shadow col-sm-4 col-lg-4 mx-3 p-4">
            <div class="text-center my-4">
                <h2>User Login</h2>
            </div>
            <form method="POST" action="{{url('/login')}}" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="john@xyz.com">
                    @error('email')
                        <p class="text-danger fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    @error('password')
                        <p class="text-danger fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="col-12 my-4">
                    <button type="submit" class="btn btn-primary shadow fw-bold">Login</button>
                </div>
                <hr>
                <div>
                    <p>
                        Don't have an account? <a href="{{ route('register') }}"
                            class="text-decoration-none fw-bold">create account</a>
                    </p>
                    <p>
                        <a href="{{ route('password.request') }}" class="text-decoration-none fw-bold">
                            Forgot password?
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
