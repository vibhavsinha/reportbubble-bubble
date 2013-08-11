<?php
/**
 * CLass: WebUser gives apis for login, logout and use maintainance
 **/
class WebUser
{
	public $isGuest = true;
	public $username;
	public $id;
	// this function shall detect and create the user for the request
	function __construct()
	{
		session_start();
		if(isset($_SESSION['user'])){
			$this->username = $_SESSION['user']['username'];
			$this->id = $_SESSION['user']['id'];
			$this->isGuest = false;
		}
		else
			$this->isGuest = true;

	}
	public function login($username, $id, $meta = null)
	{
		$_SESSION['user'] = array(
			'username'=>$username,
			'id'=>$id,
		);
		if ($meta !== null) {
			$_SESSION['user']['meta'] = $meta;
		}
		$this->isGuest = false;
		return true;
	}

	public function logout()
	{
		session_destroy();
	}

	public function setFlash($text, $type = 'info')
	{
		if(!isset($_SESSION['flashes']))
			$_SESSION['flashes'] = array();
		array_push($_SESSION['flashes'], array($text, $type));
	}
}
?>
