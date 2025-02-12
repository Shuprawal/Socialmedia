<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'bio', 'address','birthdate'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
