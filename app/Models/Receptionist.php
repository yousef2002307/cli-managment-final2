<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Appoiment;
use App\Models\Cli;
class Receptionist extends Model
{
    use HasFactory;
    protected $table = 'receptionist';
    public function cli(): BelongsTo
    {
        return $this->belongsTo(Cli::class,'clinic_id', 'id');
    }
    public function appoi(): HasMany
    {
        return $this->hasMany(Appoiment::class,"rec_id","id");
    }
}
