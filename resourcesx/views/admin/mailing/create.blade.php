<x-app-layout>
    <x-admin-panel>
        <div class="container">
            <h3 class="fw-semibold">Mailing</h3>
            <ul>
                <li>
                    Use this form to communicate with your app users.
                </li>
                <li>
                    Ensure to read emails properly before they're sent, as sending <b class="text-danger">cannot be
                        undone</b>
                </li>
                <li>
                    You do not need to type a salutation, as this system will take care of that. Simply type in a
                    <b>title</b> and the <b>content</b> of the email
                </li>
            </ul>
            <hr>
            <form action="{{ route('send.mail') }}" method="POST" class="row g-3 align-items-center">
                @csrf
                <p class="m-0">
                    Send to . . .
                </p>
                <div class="d-sm-flex fw-medium fst-italic mt-0">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="send_to" id="verified" value="verified">
                        <label class="form-check-label" for="verified">Verified Users</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="send_to" id="unverified"
                            value="unverified">
                        <label class="form-check-label" for="unverified">Unverified Users</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="send_to" id="all_users" value="all">
                        <label class="form-check-label" for="all_users">All Users</label>
                    </div>
                </div>

                <div class="mb-1">
                    <label for="title" class="form-label">Mail Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="Hello all users">
                    @error('title')
                        <small class="text-danger fw-bold mt-1">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Mail Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3"
                        placeholder="Write email content to all verified users"></textarea>
                    @error('content')
                        <small class="text-danger fw-bold mt-1">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Send Emails</button>
                </div>
            </form>
        </div>
    </x-admin-panel>
</x-app-layout>
