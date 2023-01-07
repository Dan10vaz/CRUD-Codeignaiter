<?php

namespace App\Database;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class genericDatabaseTest extends CIUnitTestCase{
    use DatabaseTestTrait;

    protected $migrate = false;
    protected $migrateOnce = false;
    protected $refresh = true; 
    protected $namespace   = 'Tests\Support';
    protected $seedOnce = false;
    protected $seed     = 'TestSeeder';
    protected $basePath = 'path/to/database/files';
}