<?php

namespace App\Models;

use App\Enums\TableLocation;
use App\Enums\TableStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'guest_number',
        'status',
        'location'

    ];

    protected  $casts = [
        'status' => TableStatus::class,
        'location' => TableLocation::class
    ];

    //relationships with reservation tabale , tables and reservation

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
