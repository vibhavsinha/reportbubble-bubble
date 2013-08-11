<?php
/**
 * The default site controller
 **/
class ErrorController extends BaseController
{
	public $layout = 'column1';
	public $showbanner =true;
	public $accessToken;
	public function index()
	{
		$this->redirect(array('error/e404'));
	}
	public function e404()
	{
		$this->render('error', array(
			'code' => 404,
			'message'=>'The page does not exists.',
		));
	}
}
?>
