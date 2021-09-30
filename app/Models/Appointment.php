<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // PRIMARY KEY 
    protected $primaryKey=  'appNumber';

    // TABLE 
    protected $table= 'tblappointments';

    //TIMESTAMPS
    public $timestamps = false;

    //FILLABLE
    protected $fillable = [
        'appNumber',
        'appPetID',
        'appPetName',
        'appPurpose',
        'appDate',
    ];

}
