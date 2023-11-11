@php
    // format age
    $dateOfBirth = new DateTime($match->date_of_birth);
    $currentDate = new DateTime();
    $age = $currentDate->diff($dateOfBirth)->y;
    
    // User Instance
    $auth = auth()->user();
    
    // User age
    $u_dob = new DateTime($auth->date_of_birth);
    $u_age = $currentDate->diff($u_dob)->y;
    
    // Age difference
    $ageData = $u_age - $age;
    
    // Match percentage || Algorithm for percentage ---------------------------------
    $accuracy = ;
    //age difference
    if ($ageData > 13 || $ageData < -13) {
        $accuracy -= 6.25;
    }
    //jelly body
    if ($auth->seeks->how_jelly == $match->how_jelly) {
        $accuracy += 6.25;
    }
    //religion
    if ($auth->seeks->religion == $match->religion) {
        $accuracy += 6.25;
    }
    //country
    if ($auth->seeks->country == $match->country) {
        $accuracy += 6.25;
    }
    
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
