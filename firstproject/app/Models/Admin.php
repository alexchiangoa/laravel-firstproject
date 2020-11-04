<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /*
     * HasFactory
     * 快速大量做一樣的事，ex大量產生假資料用
    */
    use HasFactory;

    protected $table="admins"; //admins 是預設 可以改

    protected $primaryKey = 'admin_id'; // overwrite
}
