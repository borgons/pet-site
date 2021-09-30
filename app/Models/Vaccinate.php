<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccinate extends Model
{
    use HasFactory;

    // PRIMARY KEY 
    protected $primaryKey=  'vacID';

    // TABLE 
    protected $table= 'tblvaccine';

    //TIMESTAMPS
    public $timestamps = false;

    //FILLABLE
    protected $fillable = [
        'vacID',
        'vacPetID',
        'vacName',
        'vacType',
        'vacDate',
        'vacStatus',
    ];



}
