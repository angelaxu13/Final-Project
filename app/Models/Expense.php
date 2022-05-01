<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public function comments()    
    {         
        return $this->hasMany(Comment::class);     
    }

    public function user() 
    {
        return $this->belongsTo(User::class); 
    }

    public function bookmark() 
    {
        return $this->belongsTo(Bookmark::class); 
    }

    public function category() 
    {
        return $this->belongsTo(Category::class); 
    }
}
