<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'tel_number',

        'res_date',
        'guest_number',
        'table_id'

    ];


    //etth  oru coulum koodey add akal ann // accser
    public function getResDateFormatedAttribute()
    {
        return date('d-m-Y', strtotime($this->date_of_birth));
    }

    protected $appends = ['res_date_formated'];
}
