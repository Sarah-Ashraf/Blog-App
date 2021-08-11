<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

   /* protected $fillable = [
        'name',
        'email',
        'phone',
    ];*/

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function posts() {
        return $this->belongsTo(Post::class);
    }
}
