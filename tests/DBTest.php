<?php

namespace DBInspector\Tests;

use Orchestra\Testbench\TestCase;


class DBTest extends TestCase
{
    /** @test */
	public function testValidInstanceType()
	{
		
		$connectionParams = array(
			'dbname' => 'db-ninja-01',
			'user' => 'ninja',
			'password' => 'ninja',
			'host' => 'localhost',
			'driver' => 'pdo_mysql',
		);

		$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

		$platform = $conn->getDatabasePlatform();

		$platform->registerDoctrineTypeMapping('enum', 'string');

		$sm = $conn->getSchemaManager();
		// $databases = $sm->listDatabases();

		$tables = $sm->listTables();

		print_r($tables);

		$this->assertTrue(true);
	}
}