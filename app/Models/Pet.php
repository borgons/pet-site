<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PET extends Model
{
    use HasFactory;

    // PRIMARY KEY 
    protected $primaryKey=  'petID';

    // TABLE 
    protected $table= 'tblpets';

    //TIMESTAMPS
    public $timestamps = false;

    //FILLABLE
    protected $fillable = [
        'petID',
        'petName',
        'petAddress',
        'petAge',
        'petStatus'
    ];

}
