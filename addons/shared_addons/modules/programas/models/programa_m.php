<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Programa_m extends MY_Model {

	private $folder;

	public function __construct()
	{
		parent::__construct();
		$this->_table = 'tblcatprograma';
        $this->primary_key ='iIdPrograma';
		
	}
 }
 ?>