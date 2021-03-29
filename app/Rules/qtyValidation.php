<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class qtyValidation implements Rule
{

    private  $manage_stuck;

    public function __construct($manage_stuck)
    {
        $this->manage_stuck = $manage_stuck;

    }

    public function passes($depend_on_attribute, $checked_attribute)
    {

        if ( $this->manage_stuck == 1 && $checked_attribute == null)

            return false;
        else
            return true;
    }


    public function message()
    {
        return 'يجب ادخال القيمة لأنك قمت بتتبع المنتج';
    }
}
