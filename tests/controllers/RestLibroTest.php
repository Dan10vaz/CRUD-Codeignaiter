<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Test\FeatureTestCase;

class RestLibroTest extends FeatureTestCase
{
    public function testCreateValidRequest(){
        $result = $this->post('post', [
            'title' => 'Basic title for testing',
            'author' => 'Otro autor',
            'content' => 'Otro contenido'
        ]);

        $result->assertStatus(ResponseInterface::HTTP_BAD_REQUEST);
    }

    public function testIndex(){
        $result = $this->get('');
        $result->assertStatus(ResponseInterface::HTTP_OK);
    }
}