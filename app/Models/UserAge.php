<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAge extends Model
{
    use HasFactory;
    // use Cachable;
    protected $primaryKey = 'age_id';
    public function user(){
        return $this->belongsTo(User::class,'age_id','id');

    }
}
