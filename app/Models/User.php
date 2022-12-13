<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

     protected $dates = ['dob'];
    protected $fillable = [
        'name',
        'email',
        'number',
        'address',
        'dob',
        'image'
    ];
    protected $hidden = [
        'password',
        'id',
        'remember_token'
    ];
    public function userage(){
        return $this->hasOne(UserAge::class,'user_id','id');
    }
    public function orders(){
        return $this->hasMany(Order::class,'user_id','id');
    }
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}

