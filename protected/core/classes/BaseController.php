<?php
/**
 * Base Controller. This is the controler that provides functions to the controller classses
 **/
class BaseController
{
	public $layout = 'column1';
	private $_id;
	//make it work make it work
	function __construct($id)
	{
		$this->_id = $id;
	}

	public function renderInternal($viewfile, $_data_ = null, $partial = false, $return=false)
	{
		if(is_array($_data_))
			extract($_data_,EXTR_PREFIX_SAME,'data');
		else
			$data = $_data_;
		if($partial)
			require($viewfile);
		else{
			ob_start();
			ob_implicit_flush(false);
			require($viewfile);
			$output = ob_get_clean();
			if(isset($this->layout)){
				$layoutFile = 'protected/views/layout/'.$this->layout.'.php';
				unset($this->layout);
				$this->renderInternal($layoutFile, array('content'=>$output), $partial);
				}
			else{
				$layoutFile = 'protected/views/layout/main.php';
				$partial = true;
				echo $output;
			}
		}
	}

	public function render($view, $data = null, $partial = false, $return = false)
	{
		if($return)
		{
			ob_start();ob_implicit_flush();
		}
		$viewfile = 'protected/views/'.$this->_id.'/'.$view.'.php';
		$this->renderInternal($viewfile, $data, $partial, $return);
		if($return)
			return ob_get_clean();
	}
	public function redirect($route)
	{
		if (is_array($route)) {
			header('Location: '. Mvcpp::$baseUrl.'?r='. $route[0]);
			die();
		}
		header('Location: '.$route);
	}
}
?>
