<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueCreditCardExceptCurrent implements Rule
{
    public function passes($attribute, $value)
    {
        $userId = session('userid');

        return DB::table('patient')
            ->where('creditcardnumber', $value)
            ->where('id', '!=', $userId)
            ->count() === 0;
    }

    public function message()
    {
        return 'This credit card number is already in use by another patient.';
    }
}
