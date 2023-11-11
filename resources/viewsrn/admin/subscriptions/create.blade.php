<x-app-layout>
    <x-admin-panel>
        <div class="container">
            <h3>Create Membership</h3>
            <form action="{{ route('sub.store') }}" method="POST" class="row g-3 align-items-center">
                @csrf
                <div class="col-md-4">
                    <label for="subscription_type" class="form-label">Membership Name</label>
                    <input type="text" class="form-control" id="subscription_type" name="subscription_type"
                        placeholder="Annual Plan" value="{{ old('subscription_type') }}">
                    @error('subscription_type')
                        <small class="text-danger fw-bold mt-1">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description"
                        placeholder="This plan last for one (1) year" value="{{ old('description') }}">
                    @error('description')
                        <small class="text-danger fw-bold mt-1">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="price" class="form-label">Price</label>
                    <div class="input-group">
                        <div class="input-group-text">$</div>
                        <input type="number" class="form-control" id="price" name="price" placeholder="100">
                    </div>
                    @error('price')
                        <small class="text-danger fw-bold mt-1">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-outline-success">Save</button>
                </div>
            </form>
        </div>
    </x-admin-panel>
</x-app-layout>
