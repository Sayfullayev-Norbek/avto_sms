<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
    use HasFactory;

    protected $fillable = ['message','schedule_id_1', 'send_time','schedule_id_3', 'params', 'modme_company_id'];

}
