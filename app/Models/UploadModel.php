<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadModel extends Model
{
    protected $table = 'upload';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'author', 'file_path', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
