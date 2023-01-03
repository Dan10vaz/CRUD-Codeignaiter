<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Register extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $rules = [
            'email' => ['rules' => 'required|min_length[4]|max_length[50]|valid_email|is_unique[users.email]'],
            'password' => ['rules' => 'required|min_length[8]|max_length[20]'],
            /* 'confirm_password'  => ['label' => 'confirm password', 'rules' => 'matches[password]'] */
        ];


        if ($this->validate($rules)) {

            $model = new UserModel();

            $data = [
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s', time()),
            ];

            $model->save($data);

            return $this->respond(['message' => 'Registro exitoso'], 200);
        } else {

            $response = [
                'errors' => $this->validator->getErrors(),
                'message' => 'Campos invalidos, favor de revisarlos'
            ];

            return $this->fail($response, 500);
        }
    }
}
