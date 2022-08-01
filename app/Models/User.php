<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{

    public function courses(){
        return $this->hasMany("App\Models\Course");
    }

    public function coursesAsParticipant(){
        return $this->belongsToMany("App\Models\Course");
    }
}
