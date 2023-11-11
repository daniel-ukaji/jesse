<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-4">
                <div class="card text-start shadow my-5">
                    <div class="card-header">
                        <p class="m-0 fs-4 fw-medium">
                            {{ __('You\'re almost there!') }}
                        </p>
                    </div>

                    <div class="card-body">
                        <p class="my-1">
                            Please check your email inbox for a <b>verification email</b> and follow the prompts to
                            verify your account. <br>
                            <a href="mailto:" class="text-danger fw-bold text-decoration-none">Click here</a> to open your
                            mail.
                        </p>
                        <hr>
                        <p>
                            Didn't receive an email from us yet?
                        </p>
                        <ul>
                            <li>Check your spam box/junk folder</li>
                            <li>You can request another verification email by clicking below</li>
                            <li>Be patient as this may take up to 15 - 30 minutes.</li>
                        </ul>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('resend').submit();">
                            <button class="btn btn-danger mb-2">
                                Resend Email
                            </button>
                        </a>

                        <form action="/email/verification-notification" class="d-none" method="POST" id="resend">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
