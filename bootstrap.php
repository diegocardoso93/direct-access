<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/src/Blog/Model'], true, null, null, false);

// If you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

$conn = array(
    'driver' => 'pdo_mysql',
    'dbname' => 'test',
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'port' => '3306',
);

$entityManager = EntityManager::create($conn, $config);