<?php
/**
 * The default site controller
 **/
class SiteController extends BaseController
{
	public $layout = 'column1';
	public $showbanner =false;
	public $accessToken;
	public $access = array(
		'index'=>array(
			'user'=>array('isGuest'=>false),
			'returnUrl'=>'site/login',
		),
		'files'=>array(
			'user'=>array('isGuest'=>false),
			'returnUrl'=>'site/login',
		),
		'entities'=>array(
			'user'=>array('isGuest'=>false),
			'returnUrl'=>'site/login',
		),
		'settings'=>array(
			'user'=>array('isGuest'=>false),
			'returnUrl'=>'site/login',
		),
		'doc'=>array(
			'user'=>array('isGuest'=>false),
			'returnUrl'=>'site/login',
		),
		'login'=>array(
			'user'=>array('isGuest'=>true),
			'returnUrl'=>'site/index',
		),
	);
	public $db;
	public function __construct($id)
	{
		parent::__construct($id);
		if (file_exists('protected/config/bubble_config.xml')) {
			$this->db = simplexml_load_file('protected/config/bubble_config.xml');
			$error = array();
			if($conn = mysqli_connect($this->db->host, $this->db->user, $this->db->pass ))
				if(!mysqli_select_db($conn, $this->db->name))
					$conn = false;
			if(!$conn){
				$this->db = false;
				array_push($error, mysql_error());
			}
			else
				mysqli_close($conn);
		}
		else
			$this->db = false;
		if (!Mvcpp::$user->isGuest) {
			$this->accessToken = Mvcpp::$user->id;
		}
	}

	public function index()
	{
		$this->render('index');
	}
	public function login()
	{
		$this->showbanner = true;
		if(!$this->db){
			if (isset($_POST['db']) && isset($_POST['user'])) {
				// if authenticated from web and db connected, login successful, save the configuration and redirect
				$db = $_POST['db'];
				$user = $_POST['user'];
				$error = array();
				if($conn = mysqli_connect($db['server'], $db['username'], $db['password'] ))
					if(!mysqli_select_db($conn, $db['dbname']))
						$conn = false;
				if(!$conn)
					array_push($error, mysqli_error());
				else
					mysqli_close($conn);
				if(($out = $this->fetch('auth' , $user)) == 0)
					array_push($error, $out);
				if($conn && $out){
					$xml = new SimpleXMLElement("<config></config>");
					$xml->addChild('host',$db['server']);
					$xml->addChild('name',$db['dbname']);
					$xml->addChild('user',$db['username']);
					$xml->addChild('pass',$db['password']);
					$xml->addChild('email',$user['email']);
					$xml->asXML('protected/config/bubble_config.xml');
					Mvcpp::$user->login($out->username, $out->token);
					$this->redirect(array('site/index'));
				}
			}
			$this->render('login_db');
		}
		else{
			if(isset($_POST['User'])){
				$user = $_POST['User'];
				if($user['email'] == $this->db->email)
				{
					$out = $this->fetch('auth' , $user);
					if(is_object($out) && isset($out->token)){
						Mvcpp::$user->login($out->username, $out->token);
						$this->redirect(array('site/index'));
					}
					else
						var_dump($out);
					//else
					//catch the errors and display here.
				}
				else
					Mvcpp::$user->setFlash('The bubble is already registered with another user. To reset delete the file protected/data/bubble_config.xml');
			}
			if(isset($_SESSION['flashes'])) var_dump($_SESSION['flashes']);
			$this->render('login');
		}
	}
	public function logout()
	{
		$this->fetch('logout');
		Mvcpp::$user->logout();
		$this->redirect(array('site/index'));
	}
	public function settings()
	{
		echo "Settings view is still not ready";
	}
	public function files()
	{
		$models = $this->fetch('files');
			if($conn = mysqli_connect($this->db->host, $this->db->user, $this->db->pass ))
				if(!mysqli_select_db($conn, $this->db->name))
					$conn = false;
			if(!$conn){
				$this->db = false;
				array_push($error, mysql_error());
			}
		$cols = array();
		$cols_r = mysqli_query($conn, 'select distinct table_name from information_schema.columns where table_schema = "'.$this->db->name.'";');
		$k = 0;
		while ($col = $cols_r->fetch_array(MYSQLI_ASSOC)) {
			$cols[$k++] = $col;
		}
		if (isset($_POST['newdoc'])) {
			var_dump($_POST['newdoc']);
			$this->fetch('CreateDoc', array(
				'title'=>$_POST['newdoc']['title'],
				'base'=>$_POST['newdoc']['base'])
			);
		}
		//$cols = Mvcpp::db()->createCommand('select table_name, column_name from columns where table_schema = "'.$this->db->name.'";')->query();
		$this->render('files', array(
			'files'=>$models,
			'tables'=>$cols,
		));
	}

	public function paraLink()
	{
		if (!isset($_GET['id']))
			$this->redirect(array('site/files'));
		$docid = $_GET['id'];
		$model = $this->fetch('loadDoc?id='.$docid, array('id'=>$docid));
		if(isset($_POST['save'])){
			$doc = $_POST['doc'];
			$doc['action'] = 'update';
			$model = $this->fetch('doc', $doc);
		}
		$this->render('paraLink',array(
			'doc'=>$model,
		));
	}

	public function	doc()
	{
		$this->hideFooter = true;
		if(!isset($_GET['id']))
			$this->redirect(array('site/files'));
		$docid = $_GET['id'];
		$model = $this->fetch('loadDoc?id='.$docid, array('id'=>$docid));
		if(isset($_POST['action'])){
			$doc = array('text'=>$_POST['text']);
			$doc['action'] = 'update';
			$model = $this->fetch('updateDoc?&id='.$docid, $doc);
		}
		if($model->type == 4)
			$this->render('editDoc',array(
				'doc'=>$model,
			));
		else{
				//$reportsite = "http://127.0.0.1/reportbubble";
				//$doc = json_decode(fetch('api/loaddoc&id='. $_GET['id']));
				//$url = $reportsite.'/index.php/?r=api/download&id='.$doc->id;
				//$ch = curl_init($url);
				//if(isset($config))
				//	$data =array('auth'=>(string)$config->auth);
				//curl_setopt($ch, CURLOPT_POST,1 );
				//curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
				//curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
				header('Content-Type: '. 'application/zip');
				header('Content-Disposition: attachment; filename='.basename($doc->name));
				//curl_exec($ch);
				//curl_close($ch);
				echo $this->fetch('download?id='.$docid);
				//header();
		}
	}
	public function filters(){
		if(!isset($_GET['id']))
			$this->redirect(array('site/files'));
		$docid = $_GET['id'];
		$model = $this->fetch('loadDoc?id='.$docid, array('id'=>$docid));

			if($conn = mysqli_connect($this->db->host, $this->db->user, $this->db->pass ))
				if(!mysqli_select_db($conn, $this->db->name))
					$conn = false;
			if(!$conn){
				$this->db = false;
				array_push($error, mysql_error());
			}
		$cols = mysqli_query($conn, 'select table_name, column_name from columns from columns where table_schema = "'.$this->db->name.'";');
		//$cols = Mvcpp::db()->createCommand('select table_name, column_name from columns where table_schema = "'.$this->db->name.'";')->query();

		$cols = array();
		$sql = 'select distinct column_name from information_schema.columns where table_schema = "'.$this->db->name.'" and table_name = "'.$model->base.'";';
		$cols_r = mysqli_query($conn, $sql);
		$k = 0;
		while ($col = $cols_r->fetch_array(MYSQLI_ASSOC)) {
			$cols[$k++] = $col['column_name'];
		}
		if(isset($_POST['doc'])){
			$doc = $_POST['doc'];
			$doc['action'] = 'update';
			$model = $this->fetch('doc', $doc);
		}
		$this->render('filters',array(
			'doc'=>$model,
			'cols'=>$cols,
		));

	}
	public function dynamic(){
		if(!isset($_GET['id']))
			$this->redirect(array('site/files'));
		$docid = $_GET['id'];
		$model = $this->fetch('loadDoc?id='.$docid, array('id'=>$docid));
		if(isset($_POST['doc'])){
			$doc = $_POST['doc'];
			$doc['action'] = 'update';
			$model = $this->fetch('doc', $doc);
		}
		$this->render('filters',array(
			'doc'=>$model,
		));

	}
	public function preview(){
		if(!isset($_GET['id']))
			$this->redirect(array('site/files'));
		$docid = $_GET['id'];
		$model = $this->fetch('loadDoc?id='.$docid, array('id'=>$docid));
		if(isset($_POST['doc'])){
			$doc = $_POST['doc'];
			$doc['action'] = 'update';
			$model = $this->fetch('doc', $doc);
		}
		$this->render('filters',array(
			'doc'=>$model,
		));

	}
	public function bulk(){
		if(!isset($_GET['id']))
			$this->redirect(array('site/files'));
		$docid = $_GET['id'];
		$model = $this->fetch('loadDoc?id='.$docid, array('id'=>$docid));
		$query = $this->fetch('preparebulk?docid='. $docid);

			if($conn = mysqli_connect($this->db->host, $this->db->user, $this->db->pass ))
				if(!mysqli_select_db($conn, $this->db->name))
					$conn = false;
			if(!$conn){
				$this->db = false;
				array_push($error, mysql_error());
			}
		if(!$result=mysqli_query($conn, $query->sql))
			die($query->sql);;
		$csv= '';
		while($row=mysqli_fetch_array($result)){
			$line = "";
			foreach($row as $key=>$col) {
				if(is_string($key)){
					$line .= '"'.base64_encode($row[$key]).'",';
				}
			}
			$csv .=rtrim($line, ',').';';
		}
		$data = array('values'=>rtrim($csv,';'), 'fields'=>$query->fields);
		$model = $this->fetch('generate?id='.$docid, $data);
		//header('Location: ./');
		$this->redirect(array('site/files'));

		$this->render('files',array(
			'doc'=>$model,
		));

	}

	private function fetch( $path, array $data = array())
	{
		if (!isset($this->accessToken) && $path !== 'auth') {
			$this->redirect(array('site/login'));
		}
		elseif($path!= 'auth')
			$data['token'] = $this->accessToken;
		$url = 'http://localhost/reportbubble/api/'. $path;
		$ch = curl_init($url);
		$count = sizeOf($data);
		curl_setopt($ch, CURLOPT_POST,$count);
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$out = curl_exec($ch);
		if($out === "0"){
			Mvcpp::$user->setFlash('User could not be authenticated', 'round');
			header('Location : ./');
		}
		curl_close($ch);
		if(json_decode($out) === null){
			echo $out;
			die();
		}
		return json_decode($out);
	}
}
?>
