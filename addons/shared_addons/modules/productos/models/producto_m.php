<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_m extends MY_Model {

	private $folder;

	public function __construct()
	{
		parent::__construct();
		$this->_table = 'tblcatproducto';
        $this->primary_key ='iIdProducto';
		
	}
 }
 ?>