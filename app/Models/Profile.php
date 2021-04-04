<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $primaryKey = 'user_id';
    protected $fillable = ['profile_link'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function posts(){
        return $this->hasMany(Blog::class);
    }
}
