<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidaysParticipantsModel extends Model
{
    use HasFactory;
    protected $table = 'holidays_participants';
    protected $fillable = ['id_participant', 'id_holiday'];
}
