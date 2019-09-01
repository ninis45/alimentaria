<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Localidad_m extends MY_Model {

	private $folder;

	public function __construct()
	{
		parent::__construct();
		$this->_table = 'tblcatlocalidad';
        $this->primary_key ='iIdLocalidad';
		
	}
 }
 ?>