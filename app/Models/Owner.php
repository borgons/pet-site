<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    // PRIMARY KEY 
    protected $primaryKey=  'ownID';

    // TABLE 
    protected $table= 'tblowners';

    //TIMESTAMPS
    public $timestamps = false;

    //FILLABLE
    protected $fillable = [
        'ownID',
        'ownFirst',
        'ownLast',
        'ownAddress',
        'ownEmail',
        'ownContact',
    ];

}
