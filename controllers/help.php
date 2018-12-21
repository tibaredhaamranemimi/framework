<?php
class Help extends Controller {

    public $controleur="Help";

	function __construct() {
		parent::__construct();
		$this->view->js = array($this->controleur.'/js/default.js?t='.time());
		$this->view->css = array($this->controleur.'/css/default.css?t='.time());
	}
	
	function index() {
		$this->view->title = 'Help';
		$this->view->msg = 'Help';
		$this->view->render('help/index');	
	}
}