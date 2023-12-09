<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transfer extends Model
{
    use HasFactory;

    protected $table="transfer";
    protected $fillable = ['id','transfer_amount','cust_id','transfer_mail','type','details'];

   

}
