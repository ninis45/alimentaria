<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Entrega_m extends MY_Model {

	private $folder;

	public function __construct()
	{
		parent::__construct();
		$this->_table = 'tbldetplaneacionentrega';
        $this->primary_key ='iIdDetPlaneacionEntrega';
		
	}
 }
 ?>