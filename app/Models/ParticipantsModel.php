<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantsModel extends Model
{
    use HasFactory;

    protected $table = 'participants';
    protected $fillable = ['name'];
    protected $hidden = ['updated_at', 'created_at'];
}
