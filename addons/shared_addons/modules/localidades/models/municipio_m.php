<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Municipio_m extends MY_Model {

	private $folder;

	public function __construct()
	{
		parent::__construct();
		$this->_table = 'tblcatmunicipio';
        $this->primary_key ='iIdMunicipio';
		
	}
 }
 ?>