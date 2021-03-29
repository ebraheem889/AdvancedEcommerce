<?php

namespace App\Rules;

use App\Models\AttributeTranslation;
use Attribute;
use Illuminate\Contracts\Validation\Rule;

class UniqueAttributeName implements Rule
{

    private  $attributeName;

    public function __construct($attributeName)
    {
        $this->attributeName = $attributeName;
    }

    public function passes($attribute, $value)
    {

        $attribute = AttributeTranslation::where('name', $value)->first();

        if ($attribute)
            return false;
        else
            return true;
    }


    public function message()
    {
        return 'الخاصية موجودة من قبل ';
    }
}
