<?php

namespace App\Controllers;

use App\Models\BeanModel;
use App\Models\DailyBeanModel;
use App\Models\BeansModel;

class Home extends BaseController
{
    public function index()
    {
        $beanModel = new BeansModel();
        $dailyBeanModel = new DailyBeanModel();
        
        $firstBean = $beanModel->getFirstData(); 
        
        $data = [
            'beans' => $firstBean
        ];
        
        return view('home/index', $data);
    }

}
