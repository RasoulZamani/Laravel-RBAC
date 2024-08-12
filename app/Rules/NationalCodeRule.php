<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NationalCodeRule implements ValidationRule
{   
    protected $is_legal;
    public function __construct($is_legal) {
        $this->is_legal = $is_legal;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->is_legal) { // non legal users should have national code

            $value = $value."";
            if(strlen($value) != 10){
                $fail(__("messages.national_code_error"));
            }else {
                if (!preg_match("/^\d{10}$/", $value)) {
                    $fail(__("messages.national_code_error"));
                }

                $check = (int)$value[9];
                $sum = array_sum(array_map(function ($x) use ($value) {
                        return ((int)$value[$x]) * (10 - $x);
                    }, range(0, 8))) % 11;

                $result = $sum < 2 ? $check == $sum : $check + $sum == 11;
                if (!$result)
                    $fail(__("messages.national_code_error"));
            }
        } else {
            $value = $value."";
            if(strlen($value) != 11){ //legal code has 11 digits
                $fail(__("messages.national_code_error"));
            }

        }  
    }
}