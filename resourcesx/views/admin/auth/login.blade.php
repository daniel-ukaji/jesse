<x-app-layout>
    <div class="d-flex align-items-center justify-content-center mt-3">
        <div class="bg-white border rounded-3 shadow col-sm-4 col-lg-6 mx-3 p-4">
            <div class="text-center my-4">
                <h2>
                    <a href="/register/admin" class="text-decoration-none text-dark">Admin Login</a>
                </h2>
            </div>
            <form method="POST" action="/login/admin" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="email" class="form-label fw-bold">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="john@admin.com">
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

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary shadow fw-bold">Log in</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
