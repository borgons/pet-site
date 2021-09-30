<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet_Vaccinated extends Model
{
    use HasFactory;

    // PRIMARY KEY 
    protected $primaryKey=  'vcntdPetID';

    // TABLE 
    protected $table= 'tblpetvaccinated';

    //TIMESTAMPS
    public $timestamps = false;

    //FILLABLE
    protected $fillable = [
        'vcntdPetID',
        'vcntdPetName',
        'vcntdPetImage',
        'vcntdPetAge',
        'vcntdPetStatus',
        'vcntdVacType',
        'vcntdVacDate',
        'vcntdVacStatus'
    ];
}
