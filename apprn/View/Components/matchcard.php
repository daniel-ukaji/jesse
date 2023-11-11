<?php

namespace App\View\Components;

use Illuminate\View\Component;

class matchcard extends Component
{
    public $accuracy = 6.25;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $match, public $auth, public $ageData, public $age)
    {
        // Match percentage || Algorithm for percentage ---------------------------------

        if ($ageData > 13 || $ageData < -13) {
            $this->accuracy -= 6.25;
        }
        if ($auth->seeks->how_jelly == $match->how_jelly) {
            $this->accuracy += 6.25;
        }
        if ($auth->seeks->religion == $match->religion) {
            $this->accuracy += 6.25;
        }
        if ($auth->seeks->country == $match->country) {
            $this->accuracy += 6.25;
        }

        // Attributes with N/A----------------------//
        if ($auth->seeks->height == 'N/A') {
            $this->accuracy += 6.25;
        } elseif ($auth->seeks->height == $match->height) {
            $this->accuracy += 6.25;
        }

        if ($auth->seeks->body_type == 'N/A') {
            $this->accuracy += 6.25;
        } elseif ($auth->seeks->body_type == $match->body_type) {
            $this->accuracy += 6.25;
        }

        if ($auth->seeks->hair_color == 'N/A') {
            $this->accuracy += 6.25;
        } elseif ($auth->seeks->hair_color == $match->hair_color) {
            $this->accuracy += 6.25;
        }

        if ($auth->seeks->eye_color == 'N/A') {
            $this->accuracy += 6.25;
        } elseif ($auth->seeks->eye_color == $match->eye_color) {
            $this->accuracy += 6.25;
        }

        if ($auth->seeks->how_pa == 'N/A') {
            $this->accuracy += 6.25;
        } elseif ($auth->seeks->how_pa == $match->activity_level) {
            $this->accuracy += 6.25;
        }

        if ($auth->seeks->education == 'N/A') {
            $this->accuracy += 6.25;
        } elseif ($auth->seeks->education == $match->education) {
            $this->accuracy += 6.25;
        }

        if ($auth->seeks->ethnicity == 'N/A') {
            $this->accuracy += 6.25;
        } elseif ($auth->seeks->ethnicity == $match->ethnicity) {
            $this->accuracy += 6.25;
        }

        // if ($auth->seeks->zodiac_sign == 'N/A') {
        //     $this->accuracy += 6.25;
        // } elseif ($auth->seeks->zodiac_sign == $match->zodiac_sign) {
        //     $this->accuracy += 6.25;
        // }
        // END attributes with N/A----------------------//


        // Children compatibility
        if ($auth->seeks->children == 'Yes') {
            // break;
        } elseif ($auth->seeks->children == 'No') {
            if ($auth->seeks->children == $match->children) {
                $this->accuracy += 6.25;
            }
        }
        // Pet compatibility
        if ($auth->seeks->date_pet_owner == 'Yes') {
            // break;
        } elseif ($auth->seeks->date_pet_owner == 'No') {
            if ($auth->seeks->date_pet_owner == $match->pets) {
                $this->accuracy += 6.25;
            }
        }
        // Drug compatibility
        if ($auth->seeks->date_drug == 'Yes') {
            // break;
        } elseif ($auth->seeks->date_drug == 'No') {
            if ($auth->seeks->date_drug == $match->drugs) {
                $this->accuracy += 6.25;
            }
        }

        // Drinking compatibility
        if ($auth->seeks->date_drink == 'Yes') {
            // break;
        } elseif ($auth->seeks->date_drink == 'No') {
            if ($auth->seeks->date_drink == $match->drinks) {
                $this->accuracy += 6.25;
            }
        }
        // Smoking compatibility
        if ($auth->seeks->date_smoker == 'Yes') {
            // break;
        } elseif ($auth->seeks->date_smoker == 'No') {
            if ($auth->seeks->date_smoker == $match->smokes) {
                $this->accuracy += 6.25;
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.matchcard', [
            'accuracy' => $this->accuracy,
        ]);
    }
}
