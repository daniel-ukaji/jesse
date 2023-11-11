<!-- Nothing worth having comes easy. - Theodore Roosevelt -->
<!-- This component has its algorigthm in app/View/Components -->
@php
    $accuracy = 6.25;
    
    if ($ageData > 13 || $ageData < -13) {
        $accuracy -= 6.25;
    }
    if ($auth->seeks->how_jelly == $match->how_jelly) {
        $accuracy += 6.25;
    }
    if ($auth->seeks->religion == $match->religion) {
        $accuracy += 6.25;
    }
    if ($auth->seeks->country == $match->country) {
        $accuracy += 6.25;
    }
    
    // Attributes with N/A----------------------//
    if ($auth->seeks->height == 'N/A') {
        $accuracy += 6.25;
    } elseif ($auth->seeks->height == $match->height) {
        $accuracy += 6.25;
    }
    
    if ($auth->seeks->body_type == 'N/A') {
        $accuracy += 6.25;
    } elseif ($auth->seeks->body_type == $match->body_type) {
        $accuracy += 6.25;
    }
    
    if ($auth->seeks->hair_color == 'N/A') {
        $accuracy += 6.25;
    } elseif ($auth->seeks->hair_color == $match->hair_color) {
        $accuracy += 6.25;
    }
    
    if ($auth->seeks->eye_color == 'N/A') {
        $accuracy += 6.25;
    } elseif ($auth->seeks->eye_color == $match->eye_color) {
        $accuracy += 6.25;
    }
    
    if ($auth->seeks->how_pa == 'N/A') {
        $accuracy += 6.25;
    } elseif ($auth->seeks->how_pa == $match->activity_level) {
        $accuracy += 6.25;
    }
    
    if ($auth->seeks->education == 'N/A') {
        $accuracy += 6.25;
    } elseif ($auth->seeks->education == $match->education) {
        $accuracy += 6.25;
    }
    
    if ($auth->seeks->ethnicity == 'N/A') {
        $accuracy += 6.25;
    } elseif ($auth->seeks->ethnicity == $match->ethnicity) {
        $accuracy += 6.25;
    }
    
    // END attributes with N/A----------------------//
    
    // Children compatibility
    if ($auth->seeks->children == 'Yes') {
        // break;
    } elseif ($auth->seeks->children == 'No') {
        if ($auth->seeks->children == $match->children) {
            $accuracy += 6.25;
        }
    }
    // Pet compatibility
    if ($auth->seeks->date_pet_owner == 'Yes') {
        // break;
    } elseif ($auth->seeks->date_pet_owner == 'No') {
        if ($auth->seeks->date_pet_owner == $match->pets) {
            $accuracy += 6.25;
        }
    }
    // Drug compatibility
    if ($auth->seeks->date_drug == 'Yes') {
        // break;
    } elseif ($auth->seeks->date_drug == 'No') {
        if ($auth->seeks->date_drug == $match->drugs) {
            $accuracy += 6.25;
        }
    }
    
    // Drinking compatibility
    if ($auth->seeks->date_drink == 'Yes') {
        // break;
    } elseif ($auth->seeks->date_drink == 'No') {
        if ($auth->seeks->date_drink == $match->drinks) {
            $accuracy += 6.25;
        }
    }
    // Smoking compatibility
    if ($auth->seeks->date_smoker == 'Yes') {
        // break;
    } elseif ($auth->seeks->date_smoker == 'No') {
        if ($auth->seeks->date_smoker == $match->smokes) {
            $accuracy += 6.25;
        }
    }
@endphp
<div class="bg-white p-3 rounded shadow mb-3 d-flex align-items-center justify-content-between">
    <div>
        <h3>
            <a href="{{ route('user.foo', $match) }}" class="text-decoration-none text-dark">{{ $match->first_name }}</a>
        </h3>
        <p class="m-0">
            <small>
                {{ $accuracy }}% match with you | <a href="{{ route('user.foo', $match) }}">See
                    profile</a>
            </small>
        </p>
        <p>
            <span class="badge bg-gradient bg-primary rounded-pill">
                <span class="badge bg-white text-dark rounded-pill">Age:</span>
                <span>{{ $age }} Years</span>
            </span>

            <span class="badge bg-gradient bg-primary mx-1 rounded-pill">
                <span class="badge bg-white text-dark rounded-pill">seeking:</span>
                {{ $match->looking_for }}
            </span>
        </p>
    </div>
    <div>
        <button class="btn btn-outline-secondary rounded-0 shadow"
            onclick="event.preventDefault(); 
            document.getElementById('match-user-{{ $match->id }}').submit();">
            <small>Send Request</small>
        </button>
    </div>
</div>

<form action="{{ route('match.store') }}" class="d-none" id="match-user-{{ $match->id }}" method="POST">
    @csrf
    <input type="number" value="{{ $match->id }}" name="matchedUser_id">
    <input type="text" value="{{ $accuracy }}%" name="match_info">
</form>
