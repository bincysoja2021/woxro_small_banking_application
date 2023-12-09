<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $table="deposit";
    protected $fillable = ['id','deposit_amount','cust_id','withdraw'];


}
