<?php

namespace App\Controllers;

use App\Models\Libro;
use CodeIgniter\RESTful\ResourceController;

class RestLibro extends ResourceController
{
    protected $modelName = 'App\Models\Libro';
    protected $format    = 'json';

    public function index()
    {
        return $this->generandoRespuesta($this->model->findAll(), "", 200);
    }

    public function show($id = null)
    {
        if ($id == null) {
            return $this->generandoRespuesta(null, "El ID no existe", 500);
        }

        $libro = $this->model->find($id);

        if (!$libro) {
            return $this->generandoRespuesta(null, "El libro no existe", 500);
        }

        return $this->generandoRespuesta($libro, "", 200);
    }

    public function create()
    {
        $libro = new Libro();

        if ($this->validate('libro')) {

            /* if ($imagen = $this->request->getPost('imagen')) {
                $nuevoNombre = $imagen->getRandomName();
                $imagen->move('../public/uploads/', $nuevoNombre);

                $id = $libro->insert([
                    'nombre' => $this->request->getPost('nombre'),
                    'imagen' => $this->request->getPost('imagen'),
                ]);

                return $this->generandoRespuesta($this->model->find($id), null, 200);
            } */

            $id = $libro->insert([
                'nombre' => $this->request->getPost('nombre'),
            ]);

            return $this->generandoRespuesta($this->model->find($id), null, 200);
        }

        $validation = \Config\Services::validation();

        return $this->generandoRespuesta(null, $validation->getErrors(), 500);
    }


    public function generandoRespuesta($data, $msj, $code)
    {
        if ($code == 200) {
            return $this->respond(array(
                "data" => $data,
                "code" => $code
            ));
        } else {
            return $this->respond(array(
                "msj" => $msj,
                "code" => $code
            ));
        }
    }
}
