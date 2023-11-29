<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'tel_number',
        'res_date',
        'guest_number',
        'table_id'

    ];

    protected  $dates = [
        'res_date'
    ];


    //etth  oru coulum koodey add akal ann // accser
    public function getResDateFormatedAttribute()
    {
        return date('d-m-Y H:i:s', strtotime($this->res_date));
    }

    protected $appends = ['res_date_formated'];

    //relation ships with reservation belonsto table 
    //belongs to avubho singular. so table not tables ss
    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
