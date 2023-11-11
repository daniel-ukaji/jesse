@php
    $word = $match->last_name;
    $last_name = substr($word, 0, 1);
    
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
    
    // Match percentage || Algorithm for percentage ---------------------------------
    //$accuracy = 6.25;   old algorithm
    $accuracy = 25;
    if ($auth->seeks->how_jelly == $match->how_jelly) {
       
       $accuracy +=5;
   }
       //1
   if ($auth->seeks->religion == 'N/A')
   {
       $accuracy +=5;
   }
   else{
       $rels=explode(',',$match->religion);
     
         if(in_array($auth->seeks->religion,$rels)){
               $accuracy +=5;
               
           }
  
   }
//    if($auth->seeks->state !=null){
//         $state=explode(',',$match->state);
//         if(in_array($auth->seeks->state,$state)){
//             $accuracy +=5;
//         }
//    }
//    else{
//         $accuracy +=0;
//    }
   //2
   if ($auth->seeks->country == $match->country) {
       $accuracy +=5;
   }
   
   // Attributes with N/A----------------------//
   //3
   if ($auth->seeks->height == 'N/A') {
       $accuracy += 5;
   } elseif ($auth->seeks->height == $match->height) {
       $accuracy += 5;
   }
   //4
   if ($auth->seeks->body_type == 'N/A') {
       $accuracy += 5;
   } elseif ($auth->seeks->body_type == $match->body_type) {
       $accuracy += 5;
   }
   //5
   if ($auth->seeks->hair_color == 'N/A') {
       $accuracy += 5;
   } elseif ($auth->seeks->hair_color == $match->hair_color) {
       $accuracy += 5;
   }
   //6
   if ($auth->seeks->eye_color == 'N/A') {
       $accuracy += 5;
   } elseif ($auth->seeks->eye_color == $match->eye_color) {
       $accuracy += 5;
   }
   //7
   if ($auth->seeks->how_pa == 'N/A') {
       $accuracy += 5;
   } elseif ($auth->seeks->how_pa == $match->activity_level) {
       $accuracy += 5;
   }
   //8
   if ($auth->seeks->education == 'N/A') {
       $accuracy += 5;
   } elseif ($auth->seeks->education == $match->education) {
       $accuracy += 5;
   }
   //9
   if ($auth->seeks->ethnicity == 'N/A') {
       $accuracy += 5;
   } elseif ($auth->seeks->ethnicity == $match->ethnicity) {
       $accuracy += 5;
   }
   
   // END attributes with N/A----------------------//
   
   // Children compatibility
   //10
 
   if ($auth->seeks->children == $match->children) {
           $accuracy += 5;
   }
   
   // Pet compatibility
   //11
  
   if ($auth->seeks->date_pet_owner == $match->pets) {
           $accuracy += 5;
   }
   
   // Drug <compatibility>
       //12
   if ($auth->seeks->date_drug == 'Yes') {
       // break;
   } elseif ($auth->seeks->date_drug == 'No') {
       if ($auth->seeks->date_drug == $match->drugs) {
           $accuracy += 5;
       }
   }
   
   // Drinking compatibility
   //13
   if ($auth->seeks->date_drink == 'Yes') {
       
       if($match->drinks !='No'){
           
           $accuracy += 5;
       }
       // break;
   } elseif ($auth->seeks->date_drink =='No') {
       
      if($match->drinks=='No'){
      
           $accuracy += 5;
       }
   }
   // Smoking compatibility
   //14
   if ($auth->seeks->date_smoker == $match->smokes) {
           $accuracy += 5;
       // break;
   } 
    // if ($ageData > 13 || $ageData < -13) {
    //     $accuracy -= 6.25;
    // }
    // if ($auth->seeks->how_jelly == $match->how_jelly) {
    //     $accuracy += 6.25;
    // }
    // if ($auth->seeks->religion == $match->religion) {
    //     $accuracy += 6.25;
    // }
    // if ($auth->seeks->country == $match->country) {
    //     $accuracy += 6.25;
    // }
    
    // // Attributes with N/A----------------------//
    // if ($auth->seeks->height == 'N/A') {
    //     $accuracy += 6.25;
    // } elseif ($auth->seeks->height == $match->height) {
    //     $accuracy += 6.25;
    // }
    
    // if ($auth->seeks->body_type == 'N/A') {
    //     $accuracy += 6.25;
    // } elseif ($auth->seeks->body_type == $match->body_type) {
    //     $accuracy += 6.25;
    // }
    
    // if ($auth->seeks->hair_color == 'N/A') {
    //     $accuracy += 6.25;
    // } elseif ($auth->seeks->hair_color == $match->hair_color) {
    //     $accuracy += 6.25;
    // }
    
    // if ($auth->seeks->eye_color == 'N/A') {
    //     $accuracy += 6.25;
    // } elseif ($auth->seeks->eye_color == $match->eye_color) {
    //     $accuracy += 6.25;
    // }
    
    // if ($auth->seeks->how_pa == 'N/A') {
    //     $accuracy += 6.25;
    // } elseif ($auth->seeks->how_pa == $match->activity_level) {
    //     $accuracy += 6.25;
    // }
    
    // if ($auth->seeks->education == 'N/A') {
    //     $accuracy += 6.25;
    // } elseif ($auth->seeks->education == $match->education) {
    //     $accuracy += 6.25;
    // }
    
    // if ($auth->seeks->ethnicity == 'N/A') {
    //     $accuracy += 6.25;
    // } elseif ($auth->seeks->ethnicity == $match->ethnicity) {
    //     $accuracy += 6.25;
    // }
    
    // if ($auth->seeks->zodiac_sign == 'N/A') {
    //     $accuracy += 6.25;
    // } elseif ($auth->seeks->zodiac_sign == $match->zodiac_sign) {
    //     $accuracy += 6.25;
    // }
    // // END attributes with N/A----------------------//
    
    // // Children compatibility
    // if ($auth->seeks->children == 'Yes') {
    //     // break;
    // } elseif ($auth->seeks->children == 'No') {
    //     if ($auth->seeks->children == $match->children) {
    //         $accuracy += 6.25;
    //     }
    // }
    // // Pet compatibility
    // if ($auth->seeks->date_pet_owner == 'Yes') {
    //     // break;
    // } elseif ($auth->seeks->date_pet_owner == 'No') {
    //     if ($auth->seeks->date_pet_owner == $match->pets) {
    //         $accuracy += 6.25;
    //     }
    // }
    // // Drug compatibility
    // if ($auth->seeks->date_drug == 'Yes') {
    //     // break;
    // } elseif ($auth->seeks->date_drug == 'No') {
    //     if ($auth->seeks->date_drug == $match->drugs) {
    //         $accuracy += 6.25;
    //     }
    // }
    
    // // Drinking compatibility
    // if ($auth->seeks->date_drink == 'Yes') {
    //     // break;
    // } elseif ($auth->seeks->date_drink == 'No') {
    //     if ($auth->seeks->date_drink == $match->drinks) {
    //         $accuracy += 6.25;
    //     }
    // }
    // // Smoking compatibility
    // if ($auth->seeks->date_smoker == 'Yes') {
    //     // break;
    // } elseif ($auth->seeks->date_smoker == 'No') {
    //     if ($auth->seeks->date_smoker == $match->smokes) {
    //         $accuracy += 6.25;
    //     }
    // }
@endphp

<style>
    #banner {
        margin-top: -30px;
        background-position: right bottom, right;
        background-blend-mode: normal;
        background-repeat: no-repeat, no-repeat;
        background-size: cover, cover;
    }

    .dp_box {
        width: 200px;
        height: 200px;
        border: 1px solid black;
        background: #fff;
        overflow: hidden;
    }

    #dp {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #up {
        position: relative;
        top: -100px;
    }
</style>

<x-app-layout>
    <div class="h-25" id="banner"
        style="background-image: linear-gradient(rgba(0, 4, 250, 0.3), rgba(0, 2, 133, 0.5)), url({{ $match->profile_pic ? asset('storage/' . $match->profile_pic) : asset('assets/img/logo.png') }});">
    </div>
    <div class="container">
        <div id="up">
            <div class="dp_box my-2 rounded">
                <img src="{{ $match->profile_pic ? asset('storage/' . $match->profile_pic) : asset('assets/img/logo.png') }}"
                    alt="display picture" id="dp" class="img-fluid" />
            </div>

            <div>
                <h2>{{ $match->first_name }} {{ $last_name }}.</h2>
                <i id="data" class="d-none">{{ $match->date_of_birth }}</i>
                <p class="m-0">
                    Age: <span id="age"></span>
                </p>
                <p class="m-0">
                    Location: {{ $match->city }}, {{$statef}},{{ $match->country }}
                </p>

                <hr>

                <div>
                    <h4>Match Accuracy - <span class="fw-bold"> {{ $accuracy }}%</span></h4>
                    <button onclick="goback();"
                        class="btn btn-danger rounded text-white px-2 py-1 text-decoration-none">
                        <i class="bi bi-arrow-left-short"></i>Back
                    </button>
                    <button
                        onclick="event.preventDefault(); document.getElementById('match-user-{{ $match->id }}').submit();"
                        class="btn btn-success rounded text-white px-2 py-1 text-decoration-none mx-2">
                        Send a Request
                    </button>
                </div>
                <form action="{{ route('match.store') }}" class="d-none" id="match-user-{{ $match->id }}"
                    method="POST">
                    @csrf
                    <input type="number" value="{{ $match->id }}" name="matchedUser_id">
                    <input type="text" value="{{ $accuracy }}%" name="match_info">
                </form>
            </div>

            <hr>

            <div>
                <h4>{{ $match->first_name }}'s Bio</h4>
                <div class="border border-secondary px-1 m-1 d-inline-block shadow bg-white">
                    <i class="bi bi-stars"></i> {{ $match->zodiac_sign }}
                </div>
                <div class="border border-secondary px-1 m-1 d-inline-block shadow bg-white">
                    <i class="bi bi-briefcase"></i> {{ $match->profession }}
                </div>
                <div class="border border-secondary px-1 m-1 d-inline-block shadow bg-white">
                    <i class="bi bi-person-workspace"></i> {{ $match->education }}
                </div>
                <div class="border border-secondary px-1 m-1 d-inline-block shadow bg-white">
                    <i class="bi bi-person-heart"></i> {{ $match->relationship_status }}
                </div>

                <p>{{ $match->extra }}</p>

                <div>
                    <h3>
                        Extra Information
                    </h3>
                    <div>
                        <b>Gender:</b> {{ $match->gender }}, <b>Orientation:</b>
                        {{ $match->orientation }}
                    </div>
                    <div>
                        <b>Ethnicity:</b> {{ $match->ethnicity }}, <b>Religion:</b>
                        {{ $match->religion }}
                    </div>
                    <div>
                        <b>Looking for:</b> {{ $match->looking_for }},  <b>Body Type:</b> {{ $match->body_type }}, 
                    </div>
                    <div>
                        <b>Height:</b> {{ $match->height }},
                        <b>Weight:</b> {{ $match->weight }}lbs,
                        <b>Hair color:</b {{ $match->hair_color }}>
                    </div>
                    <div>
                        <b>Language:</b> {{ $match->first_language }},
                        <b>Second Langauge:</b> {{ $match->second_language }}
                    </div>
                    <div>
                        <b>Pets:</b> {{ $match->pets }},
                        
                        <b>Smokes:</b> {{ $match->smokes }},
                        <b>Drugs:</b> {{ $match->drugs }}
                    </div>
                    <div>
                        <b>How often you workout:</b> {{ $match->activity_level }}
                    </div>
                    <div>
                        <b>Jealous type:</b> {{ $match->how_jelly }}, <b> Drink:</b>{{ $match->drinks }}
                    </div>
                </div>
            </div>

            <div class="d-sm-flex justify-content-between mt-3">
                <div>
                    <img class="img-fluid img-thumbnail"
                        src="{{ $match->profile_pic ? asset('storage/' . $match->profile_pic) : asset('assets/img/logo.png') }}"
                        alt="...">
                </div>
                <div>
                    <img class="img-fluid img-thumbnail"
                        src="{{ $match->dp_1 ? asset('storage/' . $match->dp_1) : asset('assets/img/logo.png') }}"
                        alt="...">
                </div>
                <div>
                    <img class="img-fluid img-thumbnail"
                        src="{{ $match->dp_2 ? asset('storage/' . $match->dp_2) : asset('assets/img/logo.png') }}"
                        alt="...">
                </div>
            </div>
        </div>
    </div>
    <script>
        const data = document.getElementById('data').innerHTML;

        const birthDate = new Date(data);
        const today = new Date();

        var yearsDiff = today.getFullYear() - birthDate.getFullYear();
        const monthsDiff = today.getMonth() - birthDate.getMonth();
        const daysDiff = today.getDate() - birthDate.getDate();

        // Check if the birth date hasn't happened yet this year
        if (monthsDiff < 0 || (monthsDiff === 0 && daysDiff < 0)) {
            yearsDiff--;
        }

        const age = document.getElementById('age').innerHTML = `${yearsDiff} years`;
    </script>
</x-app-layout>
