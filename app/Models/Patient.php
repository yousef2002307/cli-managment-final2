<?php

namespace App\Models;
use App\Models\Precraption;
use App\Models\Prevd;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'password',
        'google_id',
        'image' // Add 'password' to the fillable array
    ];

    protected $table = 'patient';
    public function appoi(): HasMany
    {
        return $this->hasMany(Appoiment::class,"patient_id","id");
    }
    public function precraption(): HasMany
    {
        return $this->hasMany(Precraption::class,"patient_id","id");
    }
    public function prevd(): HasMany
    {
        return $this->hasMany(Prevd::class,"patient_id","id");
    }
    public function images(): HasMany
    {
        return $this->hasMany(Image::class,"patient_id","id");
    }
}
