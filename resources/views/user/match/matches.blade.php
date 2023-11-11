{{-- This page shows all search results for a match search --}}

<x-app-layout>
    <div class="container">
        <h2 class="mb-3 fw-bold">Match Search</h2>
        <p>
            <small>
                - Tap <b>Take</b> to save the person of your choice. <br>
                - You can view their profile by tapping their or <b>See Profile</b>.
            </small>
        </p>

        @unless (count($matches) == 0)
            @foreach ($matches as $match)
                @php
                    // format age
                    $dob = new DateTime($match->date_of_birth);
                    $currentDate = new DateTime();
                    $age = $currentDate->diff($dob)->y;
                    
                    // User Instance
                    $auth = auth()->user();
                    
                    // User age
                    $u_dob = new DateTime($auth->date_of_birth);
                    $u_age = $currentDate->diff($u_dob)->y;
                    
                    // Age difference
                    $ageData = $u_age - $age;
                @endphp
                <x-matchcard :$match :$auth :$ageData :$age />
            @endforeach
        @else
            <div class="p-5 bg-secondary text-white">
                <p>
                    No match made at the moment, make sure you have your profile
                    correctly filled out and try again.
                </p>
                <a href="{{ route('dashboard') }}">
                    <button class="btn btn-light">Back to dashboard</button>
                </a>
            </div>
        @endunless
        <div class="my-1 p-2">
            {{ $matches->links() }}
        </div>
    </div>
    </script>
</x-app-layout>
