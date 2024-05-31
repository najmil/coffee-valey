<?php

namespace App\Controllers;

use App\Models\BeanModel;
use App\Models\DailyBeanModel;
use App\Models\BeansModel;
use App\Models\DistributorsModel;
use App\Models\UploadModel;

class Menu extends BaseController
{
    public function catalogue()
    {
        $beanModel = new BeansModel();
        $dailyBeanModel = new DailyBeanModel();
        
        $beans = $beanModel->findAll(); 
        
        $data = [
            'beans' => $beans
        ];
        
        return view('catalogue', $data);
    }

    public function distributors_index()
    {
        $distributorModel = new DistributorsModel();
        
        $distributors = $distributorModel->findAll(); 
        
        $data = [
            'distributors' => $distributors
        ];
        
        return view('distributors', $data);
    }

    public function distributor_add()
    {
        $distributorModel = new DistributorsModel();
        $data = [
                'distributor_name' => $this->request->getPost('distributor_name'),
                'city' => $this->request->getPost('city'),
                'state' => $this->request->getPost('state'),
                'country' => $this->request->getPost('country'),
                'phone' => $this->request->getPost('phone'),
                'email' => $this->request->getPost('email')
        ];
        $distributorModel->insert($data);

        $response = [
            'status' => 'success',
            'message' => 'Distributor added successfully.'
        ];

        return $this->response->setJSON($response);
    }

    public function get_distributor_info()
    {
        $distributorId = $this->request->getPost('id');

        $distributorModel = new DistributorsModel();
        $distributor = $distributorModel->find($distributorId);

        if ($distributor) {
            $response = [
                'status' => 'success',
                'id' => $distributor['id'],
                'distributor_name' => $distributor['distributor_name'],
                'city' => $distributor['city'],
                'state' => $distributor['state'],
                'country' => $distributor['country'],
                'phone' => $distributor['phone'],
                'email' => $distributor['email']
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Distributor not found.'
            ];
        }

        return $this->response->setJSON($response);
    }

    public function distributor_edit()
    {
            $id = $this->request->getPost('edit_distributor_id');
            $distributorName = $this->request->getPost('edit_distributor_name');
            $city = $this->request->getPost('edit_city');
            $state = $this->request->getPost('edit_state');
            $country = $this->request->getPost('edit_country');
            $phone = $this->request->getPost('edit_phone');
            $email = $this->request->getPost('edit_email');
            // var_dump($distributorId, $distributorName, $city, $state, $country, $phone, $email).die;

            $distributorModel = new DistributorsModel();
            $distributorModel->set([
                'distributor_name' => $distributorName,
                'city' => $city,
                'state' => $state,
                'country' => $country,
                'phone' => $phone,
                'email' => $email
            ])->where(['id' => $id])->update();

            return $this->response->setJSON(['status' => 'success']);
    }

    public function upload_index()
    {
        $uploadModel = new UploadModel();
        $upload = $uploadModel->findAll();
        
        return view('upload');
    }

    public function document_add()
    {
        $title = $this->request->getPost('title');
        $author = $this->request->getPost('author');
        $document = $this->request->getFile('document');

        $uploadPath = WRITEPATH . 'uploads/document';
        $newName = $document->getRandomName();
        
        $uploadModel = new UploadModel();
        $uploadModel->insert([
            'title' => $title,
            'author' => $author,
            'file_path' => $newName
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Document saved successfully.'
        ]);
    }
}
