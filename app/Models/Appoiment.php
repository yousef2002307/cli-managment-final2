<?php

namespace App\Models;
use App\Models\Patient;
use App\Models\Cli;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Appoiment extends Model
{
    use HasFactory;
    protected $table = 'appoiments';
    public function patients(): BelongsTo
    {
        return $this->belongsTo(Patient::class,"patient_id","id");
    }
    public function cli(): BelongsTo
    {
        return $this->belongsTo(Cli::class,"clinic_id","id");
    }
}
