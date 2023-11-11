<x-app-layout>
    <div class="container">
        <h2><i class="bi bi-person-gear"></i> Memberships</h2>
        <hr>
        <p>
            You can change this anytime you want.
        </p>
        <p>
            <small>
                <i class="bi bi-info-circle text-success fs-6"></i> Matchmaking is allowed to members who have selected a
                paid
                membership.
                <br>
                <i class="bi bi-info-circle text-success fs-6"></i> If you select a <b>Free Membership</b>, you will only
                be eligible to be selected in a Match made by a paying user. <br>
                <i class="bi bi-info-circle text-success fw-bold fs-6"></i> You will get an email if you get matched.
            </small>
        </p>
        <div class="subscriptions">
            @unless (count($subs) == 0)

                @foreach ($subs as $sub)
                    <div class="box">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3>{{ $sub->subscription_type }}</h3>
                            <a href="" class="btn btn-outline-light p-1"
                                onclick="event.preventDefault(); document.getElementById('update-sub-{{ $sub->id }}').submit();">
                                Select
                            </a>
                        </div>
                        <p>${{ $sub->price }}</p>
                        <p>
                            {{ $sub->description }}
                        </p>
                    </div>
                    <form id="update-sub-{{ $sub->id }}" action="{{ route('profile.update', Auth::id()) }}"
                        method="POST" class="d-none">
                        @csrf
                        @method('PATCH')
                        <input type="text" value="{{ $sub->subscription_type }}" name="subscription">
                    </form>
                @endforeach
            @else
                <p class="bg-secondary p-2">No memberships available at the momonet</p>
            @endunless
        </div>
    </div>
</x-app-layout>
