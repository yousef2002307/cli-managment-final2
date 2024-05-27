<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Receptionist;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Cli extends Model
{
    use HasFactory;
    

    /**
     * Searchable rules.
     *
     * @var array
     */
   
    protected $fillable = [
      'username',
      'email',
      'password', // Add 'password' to the fillable array
  ];
    protected $table = 'cli';
    public function res(): HasOne
    {
      return $this->hasOne(Receptionist::class, 'clinic_id', 'id');
    }
    public function doctors(): HasMany
    {
        return $this->hasMany(\App\Models\Doctor::class,"clinic_id","id");
    }
}
