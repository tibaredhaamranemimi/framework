<?php
class Register extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() {
	    $this->view->title = 'register';
		$this->view->msg = 'register';
		$this->view->render('register/index');
	}
	
    function Registerrun()
	{
		$data = array();
		$data['wilaya']    = $_POST['wilaya'];
		$data['structure'] = $_POST['structure'];
		$data['login']     = $_POST['login'];
		$data['password']  = $_POST['password'];
		$data['captcha']   = $_POST['captcha'];
	    session_start();
		$data['code']   = $_SESSION["code"];
		// echo '<pre>';print_r ($data);echo '<pre>'; 
		if ($data['captcha']==$data['code']) {
		$this->model->runRegister($data);
		} else {
		header('location: '.URL.'register');
		}
			
	}
}