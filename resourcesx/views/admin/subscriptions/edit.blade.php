<x-app-layout>
    <x-admin-panel>
        <div class="container">
            <form action="{{ route('sub.update', $sub) }}" method="POST" class="row g-3 align-items-center">
                @csrf
                @method('PUT')
                <div class="col-md-4">
                    <label for="subscription_type" class="form-label">Subscription Name</label>
                    <input type="text" class="form-control" id="subscription_type" name="subscription_type"
                        placeholder="Annual Plan" value="{{ old('subscription_type', $sub->subscription_type) }}">
                    @error('subscription_type')
                        <small class="text-danger fw-bold mt-1">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description"
                        placeholder="This plan last for one (1) year"
                        value="{{ old('description', $sub->description) }}">
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
                        <input type="text" class="form-control" id="price" name="price" placeholder="100"
                            value="{{ old('price', $sub->price) }}" />
                        @error('price')
                            <small class="text-danger fw-bold mt-1">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary p-1 fs-6">
                        <small><i class="bi bi-save"></i> Update</small>
                    </button>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('delete-sub').submit();">
                        <button class="btn btn-danger p-1 fs-6">
                            <small><i class="bi bi-trash"></i> Delete</small>
                        </button>
                    </a>
                </div>

            </form>
        </div>
        <form action="{{ route('sub.delete', $sub) }}" method="POST" class="d-none" id="delete-sub">
            @csrf
            @method('DELETE')
        </form>
    </x-admin-panel>
</x-app-layout>
