<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	protected $section='entregas';
	
	public function __construct()
	{
		parent::__construct();
        $this->lang->load('entrega');
        $this->load->model(array('entrega_m','productos/producto_m'));
        $this->rules = array(
			
            	array(
				'field' => 'iIdProducto',
				'label' => 'Producto',
				'rules' => 'trim|required'
				),
			array(
				'field' => 'dCantidad',
				'label' => 'Cantidad',
				'rules' => 'trim|required'
				),
   	        array(
				'field' => 'dCantidadEntregado',
				'label' => 'Entregado',
				'rules' => 'trim|required'
				),
   	        array(
				'field' => 'fecha',
				'label' => 'Nombre',
				'rules' => 'trim|required'
				),
            array(
				'field' => 'mes',
				'label' => 'Nombre',
				'rules' => 'trim|required'
				),
        );
 	}
    function index(){
        $items = $this->entrega_m->get_all();
        $this->template->title($this->module_details['name'])
			->set('items',$items)
            //->set('pagination',$pagination)
			//->append_js('module::banner.js')
			->build('admin/index');
    }
    function create(){
        $entrega = new StdClass();
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
            $post = $this->input->post();
            
			$data= array(
					'cNombre'       => $post['nombre'],
					'dPeso'         => $post['peso'],
					'dPrecioCompra' => $post['precio'],
					'lActivo'       => 1,
                    'dtModificacion' => date('Y-m-d'),
                    'dtalta'         => date('Y-m-d'),
			);
			if($id = $this->producto_m->insert($data)){
				
				$this->session->set_flashdata('success',lang('global:save_success'));
				
			}else{
				$this->session->set_flashdata('error',lang('global:save_error'));
				
			}
			redirect('admin/productos');
        }
        
  	    foreach ($this->rules as $rule)
		{
			$entrega->{$rule['field']} = $this->input->post($rule['field']);
		}
         $this->template->title($this->module_details['name'])
            ->set('productos',$this->producto_m->dropdown('cNombre'))
			->set('entrega',$entrega)
			->build('admin/form');
    }
}
?>