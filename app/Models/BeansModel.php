<?php

namespace App\Models;

use CodeIgniter\Model;

class BeansModel extends Model
{
    protected $table = 'beans';
    protected $primaryKey = 'id';
    protected $allowedFields = ['bean', 'description', 'price_unit'];

    public function getFirstData($minSalePrice = 0.00)
    {
        $builder = $this->db->table('beans');
        $builder->join('dailybeans', 'beans.id = dailybeans.bean_id');
        $builder->select('beans.id as bean_id, beans.bean as bean_name, beans.description, dailybeans.sale_price');
        $builder->where('dailybeans.sale_price >=', $minSalePrice);
        $builder->orderBy('dailybeans.created_at', 'ASC');
        $builder->limit(1);

        $query = $builder->get();

        return $query->getRowArray();
    }
}
