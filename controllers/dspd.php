<?php
class dspd extends Controller { 
	
	public $controleur="dspd";
	
	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('location: '.URL.'login');
			exit;
		}
		$this->view->js = array($this->controleur.'/js/default.js?t='.time());
		$this->view->css = array($this->controleur.'/css/default.css?t='.time());
	}
	function index() {
	    $this->view->title = 'dspd';
		$this->view->msg = 'dsp';
		$this->view->render($this->controleur.'/index');
	}
	
	
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search';
	    $this->view->msg = 'Search';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl =9     ;     //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/index');
	}

	function graphe($id) 
	{
	    $this->view->title = 'dspd';
		$this->view->msg = 'dspd';
		if($id!=0) {
		$this->view->render($this->controleur.'/index'.$id);
		} else {
		$this->view->render($this->controleur.'/index');
		}	
	}
	function Evaluation() {
	    $this->view->title = 'Evaluation';
		$this->view->msg = 'Evaluation';
		$this->view->render($this->controleur.'/Evaluation');
	}
	
    function logout()
	{
		Session::destroy();
		header('location: ' . URL .  'login');
		exit;
	}
	

	function nouveau() {
	    $this->view->title = 'nouveau';
		$this->view->msg = 'Ajouter';
		$this->view->render($this->controleur.'/nouveau');
	}
	
	function nouveau1() {
	    $this->view->title = 'nouveau1';
		$this->view->msg = 'Ajouter';
		$this->view->tbl_name =$_POST['tbl_name'];
		$this->view->Datedebut =$_POST['Datedebut'];
		$this->view->Datefin =$_POST['Datefin'];
		$this->view->render($this->controleur.'/nouveau1');
	}
}