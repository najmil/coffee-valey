<?php

namespace App\Models;

use CodeIgniter\Model;

class DistributorsModel extends Model
{
    protected $table = 'distributors';
    protected $primaryKey = 'id';
    protected $allowedFields = ['distributor_name', 'city', 'country', 'phone', 'email', 'updated_at', 'created_at', 'state'];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
}
