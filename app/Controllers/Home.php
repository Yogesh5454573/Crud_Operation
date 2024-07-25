<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // Fetch all users from the database
        $builder = $this->db->table('user');
        $data['users'] = $builder->get()->getResultArray();

        echo view('template/header');
        echo view('index', $data);
        echo view('template/footer');
    }

    public function add()
    {
        echo view('addpage');
    }

    public function addData()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'mobile_number' => $this->request->getPost('mobile_number'),
            'email' => $this->request->getPost('email'),
        ];

        $builder = $this->db->table('user');
        if ($builder->insert($data)) {
            return $this->response->setJSON(1);
        } else {
            return $this->response->setJSON(0);
        }
    }

    public function edit($id)
    {
        $builder = $this->db->table('user');
        $data['edit'] = $builder->getWhere(['id' => $id])->getRowArray();
        echo view('editpage', $data);
    }

    public function update($id)
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'mobile_number' => $this->request->getPost('mobile_number'),
            'email' => $this->request->getPost('email'),
        ];

        $builder = $this->db->table('user');
        if ($builder->update($data, ['id' => $id])) {
            return $this->response->setJSON(1);
        } else {
            return $this->response->setJSON(0);
        }
    }

    public function delete($id)
    {
        $builder = $this->db->table('user');
        if ($builder->delete(['id' => $id])) {
            return $this->response->setJSON(1);
        } else {
            return $this->response->setJSON(0);
        }
    }
}
