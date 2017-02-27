<?php
/**
 * @author Vasilis Naskos (vnaskos[at]gmail[dot]com)
 */
class DBHelper {
	/* @var $db mysqli */
	protected static $db = null;

	/**
	 * Fetches the database object used and will initialize one if needed
	 *
	 * @throws Exception
	 * @return mysqli		The db connection object
	 */
	public static function getDBO() {
		/*
		 * Check for the required DB configuration parameters
		 */
		if(!defined('ETH_CONF_DB_HOST')) {
			throw new Exception('ETH_CONF_DB_HOST configuration not set');
		}
		if(!defined('ETH_CONF_DB_USERNAME')) {
			throw new Exception('ETH_CONF_DB_USERNAME configuration not set');
		}
		if(!defined('ETH_CONF_DB_PASSWORD')) {
			throw new Exception('ETH_CONF_DB_PASSWORD configuration not set');
		}
		if(!defined('ETH_CONF_DB_DBNAME')) {
			throw new Exception('ETH_CONF_DB_DBNAME configuration not set');
		}

		$db = new mysqli(ETH_CONF_DB_HOST, ETH_CONF_DB_USERNAME,
				ETH_CONF_DB_PASSWORD, ETH_CONF_DB_DBNAME);
				
		if($db->connect_error){
			throw new Exception(
					sprintf('DB Connect Error %d: %s',
							$db->connect_errno, $db->connect_error));
		}

		self::$db = $db;
		return self::$db;
	}

	/**
	 * Close the connection
	 */
	public static function close(){
		//Make sure that we have a db to close in the first place
		if(self::$db == null){
			return true;
		}

		$result = self::$db->close();

		//Null-out the db object so we can re-create one if needed
		self::$db = null;
		
		return $result;
	}
}
