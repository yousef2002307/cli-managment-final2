<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\Doctor;
class Precraption extends Model
{
    use HasFactory;
    protected $table = 'precraption';
    public function patients(): BelongsTo
    {
        return $this->belongsTo(Patient::class,"patient_id","id");
    }
    public function doctors(): BelongsTo
    {
        return $this->belongsTo(Doctor::class,"doctor_id","id");
    }
}
