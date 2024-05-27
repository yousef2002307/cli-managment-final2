<?php

namespace App\Models;

use App\Models\Precraption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    use HasFactory;
   

    /**
     * Searchable rules.
     *
     * @var array
     */
   
    protected $table = 'doctors';
    protected $fillable = [
        'username',
        'email',
        'password', // Add 'password' to the fillable array
    ];
    public function precraption(): HasMany
    {
        return $this->hasMany(Precraption::class,"doctor_id","id");
    }

    public function profits(): HasMany
    {
        return $this->hasMany(\App\Models\Profit::class,"doctor_id","id");
    }
    public function cli(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Cli::class,"clinic_id","id");
    }
}
