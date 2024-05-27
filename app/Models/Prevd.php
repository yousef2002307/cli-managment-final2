<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prevd extends Model
{
    use HasFactory;
    protected $table = 'prevdisease';
    public function patients(): BelongsTo
    {
        return $this->belongsTo(Patient::class,"patient_id","id");
    }
}
