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
        return $this->generandoRespuesta($this->model->findAll(), "si trajo datosssssss", 200);
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

        return $this->generandoRespuesta($libro, "si hay datos", 200);
    }

    public function create()
    {
        $libro = new Libro();

        if ($this->validate('libro')) {

            $imagen = $this->request->getFile('imagen');
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('../public/uploads/', $nuevoNombre);

            $id = $libro->insert([
                'nombre' => $this->request->getPost('nombre'),
                'imagen' => $nuevoNombre,
            ]);

            return $this->generandoRespuesta($this->model->find($id), 'Se creo correctamente', 200);
        }

        $validation = \Config\Services::validation();

        return $this->generandoRespuesta(null, $validation->getErrors(), 500);
    }


    public function generandoRespuesta($data, $msj, $code)
    {
        if ($code == 200) {
            return $this->respond(array(
                "data" => $data,
                "code" => $code,
                "msj" => $msj
            ));
        } else {
            return $this->respond(array(
                "msj" => $msj,
                "code" => $code
            ));
        }
    }
}
