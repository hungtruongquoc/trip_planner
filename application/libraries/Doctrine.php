<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 6/29/15
 * Time: 5:02 PM
 */

use Doctrine\Common\ClassLoader,
	Doctrine\ORM\Configuration,
	Doctrine\ORM\EntityManager,
	Doctrine\Common\Cache\ArrayCache;
//	Doctrine\DBAL\Logging\EchoSQLLogger;

class Doctrine {

	public $em = null;

	public function __construct()
	{
		// load database configuration from CodeIgniter
		require_once __DIR__ . '/../config/database.php';

		// Set up class loading. You could use different autoloaders, provided by your favorite framework,
		// if you want to.
		//require_once APPPATH.'libraries/Doctrine/Common/ClassLoader.php';

		// We use the Composer Autoloader instead - just set
		// $config['composer_autoload'] = TRUE; in application/config/config.php
		//require_once APPPATH.'vendor/autoload.php';

		//A Doctrine Autoloader is needed to load the models
		$entitiesClassLoader = new ClassLoader('TP', APPPATH."models");
		$entitiesClassLoader->register();

		// Set up caches
		$config = new Configuration;
		if(ENVIRONMENT == 'development')
			// set up simple array caching for development mode
			$cache = new \Doctrine\Common\Cache\ArrayCache;
		else
			// set up caching with APC for production mode
			$cache = new \Doctrine\Common\Cache\ApcCache;

		$config->setMetadataCacheImpl($cache);
		$driverImpl = $config->newDefaultAnnotationDriver(array(APPPATH.'models/TP'));
		$config->setMetadataDriverImpl($driverImpl);
		$config->setQueryCacheImpl($cache);

		$config->setQueryCacheImpl($cache);

		// Proxy configuration
		$config->setProxyDir(APPPATH.'/models/proxies');
		$config->setProxyNamespace('Proxies');

		// Sets up logger - uncomment following lines if you want to print the query for each data request from
		// Doctrine
//		$logger = new EchoSQLLogger;
//		$config->setSQLLogger($logger);

		$config->setAutoGenerateProxyClasses( TRUE );

		// Database connection information
		// The line 'charset' is very important to get the Uniccode string work properly
		// The variable $db is loaded from the configuration file database.php
		$connectionOptions = array(
			'driver'    =>  'pdo_mysql',
			'user'      =>  $db['default']['username'],
			'password'  =>  $db['default']['password'],
			'host'      =>  $db['default']['hostname'],
			'dbname'    =>  $db['default']['database'],
			'charset'   =>  $db['default']['char_set']
		);

		// Create EntityManager
		$this->em = EntityManager::create($connectionOptions, $config);
	}
}