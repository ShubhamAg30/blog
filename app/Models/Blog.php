<?php

namespace App\Models;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query){
        return $query->where("status", "PUBLISHED");
    }

    public function scopeDraft($query){
        return $query->where("status", "DRAFT");
    }

    public function scopeSelf($query){
        return $query->where("user_id", Auth::id());
    }
}
