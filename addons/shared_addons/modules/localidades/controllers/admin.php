<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	protected $section='localidades';
	
	public function __construct()
	{
		parent::__construct();
        $this->lang->load('localidad');
        $this->load->model(array('localidad_m'));
        $this->rules = array(
			
  	      
			array(
				'field' => 'cNombre',
				'label' => 'Nombre',
				'rules' => 'trim|required'
				),
   	        array(
				'field' => 'dtModificacion',
				'label' => 'Modificacion',
				'rules' => 'trim'
				),
   	        array(
				'field' => 'dtAlta',
				'label' => 'Alta',
				'rules' => 'trim'
				),
           
        );
 	}
    function index(){
        $items = $this->localidad_m->get_all();
        $this->template->title($this->module_details['name'])
			->set('items',$items)
            //->set('pagination',$pagination)
			//->append_js('module::banner.js')
			->build('admin/index');
    }
    
    function edit($id=0)
    {
        if(!$programa = $this->programa_m->get_by('iIdPrograma',$id))
		{
			$this->session->set_flashdata('error', lang('global:not_found_item'));
			redirect('admin/programas');
		}
         
        
        
        
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
		    $post = $this->input->post();
            
			$data= array(
					'cNombre'       => $post['cNombre'],									
                    'dtModificacion' => date('Y-m-d'),
                    
			);
			if($this->programa_m->update($id,$data)){
				
				$this->session->set_flashdata('success',lang('global:save_success'));
				
			}else{
				$this->session->set_flashdata('error',lang('global:save_error'));
				
			}
			redirect('admin/programas/edit/'.$id);
		}
        elseif($_POST){
            $programa = (Object)$_POST;
        }
         
         $this->template->title($this->module_details['name'])
			->set('programa',$programa)
			->build('admin/form');
    }
    function create(){
        $planeacion = new StdClass();
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
            $post = $this->input->post();
            
			$data= array(
					'cNombre'       => $post['cNombre'],					
                    'dtModificacion' => date('Y-m-d'),
                    'dtalta'         => date('Y-m-d'),
			);
			if($id = $this->programa_m->insert($data)){
				
				$this->session->set_flashdata('success',lang('global:save_success'));
				
			}else{
				$this->session->set_flashdata('error',lang('global:save_error'));
				
			}
			redirect('admin/programas');
        }
        
  	    foreach ($this->rules as $rule)
		{
			$planeacion->{$rule['field']} = $this->input->post($rule['field']);
		}
         $this->template->title($this->module_details['name'])            
			->set('planeacion',$planeacion)
			->build('admin/form');
    }
}
?>