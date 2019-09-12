<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	protected $section='entregas';
	
	public function __construct()
	{
		parent::__construct();
        $this->lang->load('entrega');
        $this->load->model(array('entrega_m','productos/producto_m','planeacion/planeacion_m'));
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
				'field' => 'dtFechaCompromiso',
				'label' => 'Fecha compromiso',
				'rules' => 'trim|required'
				),
            array(
				'field' => 'iMes',
				'label' => 'Mes',
				'rules' => 'trim|required'
				),
        );
        $this->template->enable_parser(true);
 	}
    function index(){
        $items = $this->planeacion_m->select('*,tblcatestado.cNombre AS estado')
                    ->join('tblcatestado','tblcatestado.iIdEstado=tblplaneacionentrega.iIdEstado')
                    ->join('tblcatprograma','tblcatprograma.iIdPrograma=tblplaneacionentrega.iIdPrograma')
                    ->get_all();
        $this->template->title($this->module_details['name'])
        
			->set('items',$items)
            //->set('pagination',$pagination)
			//->append_js('module::banner.js')
			->build('admin/index');
    }
    function load($id_planeacion){
        $items = $this->entrega_m->join('tblcatproducto','tblcatproducto.iIdProducto=tbldetplaneacionentrega.iIdProducto')
                        ->where('iIdPlaneacionEnttrega',$id_planeacion)
                        ->get_all();
        $this->template->title($this->module_details['name'])
            
			->set('items',$items)
            ->set('id_planeacion',$id_planeacion)
			//->append_js('module::banner.js')
			->build('admin/index');
    }
    function create($id_planeacion=0){
        $entrega = new StdClass();
        
        $planeacion = $this->planeacion_m->get($id_planeacion);
       
        if(empty($planeacion))
        {
            
            $this->session->set_flashdata('error', lang('global:not_found'));
            redirect('admin/entregas');
        }
        
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
            $post = $this->input->post();
            
			$data= array(
					'iIdPlaneacionEnttrega'       => $id_planeacion,
                    'dtFechaCompromiso'   => $post['dtFechaCompromiso'],
					'iIdProducto'         => $post['iIdProducto'],
                    'dCantidad'           => $post['dCantidad'],
					'dCantidadEntregado' => $post['dCantidadEntregado'],
					'lActivo'       => 1,
                    'dtModificacion' => date('Y-m-d'),
                    'dtalta'         => date('Y-m-d'),
			);
			if($id = $this->entrega_m->insert($data)){
				
				$this->session->set_flashdata('success',lang('global:save_success'));
				
			}else{
				$this->session->set_flashdata('error',lang('global:save_error'));
				
			}
			redirect('admin/entregas/'.$id_planeacion);
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