<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = 'careers';


    const HOT = 1; //    gán giá trị cho Hot = 1
}
