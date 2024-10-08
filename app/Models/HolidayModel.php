<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayModel extends Model
{
    use HasFactory;

    protected $table = 'holiday';

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'participants'
    ];

    protected $hidden = ['updated_at', 'created_at'];
}
