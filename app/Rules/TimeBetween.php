<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pickupDate = Carbon::parse($value);
        $pickUpTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
        //when the resturent open
        $earliestTime = Carbon::createFromTimeString('17:00:00');
        $lastTime = Carbon::createFromTimeString('23:00:00');

        if ($pickUpTime->between($earliestTime, $lastTime)) {

            $fail("Please Choose the Time beetween 17:00-23:00");
        } else {
        }


        // return $pickUpTime->between($earliestTime, $lastTime) ? true : false;
    }
}
