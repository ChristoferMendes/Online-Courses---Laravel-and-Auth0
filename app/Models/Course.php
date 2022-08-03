<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;
    
    protected $casts = [
        "items" => "array"
    ];

    protected $fillable = [
        'title',
        'descriptions',
        'items',
        'image',
        'user_id',
        'updated_at'
        
    ];

    public function user(){
        return $this->belongsTo("App\Models\User"); 
    }

    public function users(){
        return $this->belongsToMany("App\Models\User");
    }

    public function modules(){
        return $this->hasMany("App\Models\Module");
    }


}
