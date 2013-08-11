<?php
/**
 * Base class for mvcpp web application
 **/
class Mvcpp
{
	public static $config;
	public static $user;
	public $route;
	public static $baseUrl;
	public static $name;
	private $db;
	
	public function init($config)
	{
		self::$baseUrl = $_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"];
		self::$baseUrl = 'http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'],0, strrpos($_SERVER['SCRIPT_NAME'], '/') );
	
		self::$config = array_merge(include $config);
		if (isset(self::$config['db'])) {
			echo "hu hahahah";
			$this->db = new DBObject;
		}
		spl_autoload_register( array($this, 'autoloadDomain') );
		if (isset($_GET['r'])) {
			$this->route = explode('/', trim($_GET['r'], '/'));
		}
		else
			$this->route = array(self::$config['defaultController']);
		self::$user = new WebUser;
		$this->run($this->route);
	}
	public static function run($route)
	{
		if(!isset($route[1]))
			$route[1] = 'index';
		foreach (self::$config['controllerMap'] as $controller) {
			$file = $controller.ucfirst($route[0]).'Controller.php';
			if(file_exists($file)){
				require($file);
				$class_id = $route[0];
				$class = $class_id.'Controller';
				$control = new $class($class_id);
				$allowed = true;
				if(isset($control->access[$route[1]])){
					$access = $control->access[$route[1]];
					if(isset($access['user']))
						foreach($access['user'] as $key=>$val)
							$allowed = $allowed && $val == ( isset(self::$user->$key)?self::$user->$key:false);
					if(isset($access['returnUrl']) && !$allowed){
						header('Location: '. self::$baseUrl.'?r='.$access['returnUrl']);
						die();
					}
				}
				if($allowed)
					call_user_func_array(array($control , $route[1]), array());
				else
					throw new Exception('You are not permitted');
				return;
			}
		}
		throw new Exception('There are no such controllers, so you shall get a 404 for that.', 404);
	}
	public static function log($text){
		if($this->log == file)
		{
			$f = fopen('protected/runtime/application.log', 'a');
			fputs($f, $text);
			fclose($f);
		}
	}
	public function db()
	{
		return $this->db;
	}

    public static function autoloadDomain($className) {
	    $path = self::$config['import'];
	    foreach ($path as $folder) {
		if(file_exists($folder.$className.'.php')){
		    require_once($folder.$className.'.php');
		    return true;
		}       
	    }
        self::throwFileNotFoundException($className);
    }

    public static function throwFileNotFoundException($class)
    {
        throw new Exception($class. ' not found here.');
    }
}
