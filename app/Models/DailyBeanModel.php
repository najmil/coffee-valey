<?php

namespace App\Models;

use CodeIgniter\Model;

class DailyBeanModel extends Model
{
    protected $table = 'dailyBeans';
    protected $primaryKey = 'id';
    protected $allowedFields = ['bean_id', 'sale_price', 'created_at'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}
