<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	protected $section='localidades';
	
	public function __construct()
	{
		parent::__construct();
        $this->lang->load('localidad');
        $this->load->model(array('municipio_m','estado_m','localidad_m'));
        $this->rules = array(
			array(
				'field' => 'iIdMunicipio',
				'label' => 'Municipio',
				'rules' => 'trim|required'
				),
  	      
			array(
				'field' => 'cNombre',
				'label' => 'Nombre',
				'rules' => 'trim|required'
				)
           
        );
 	}
    function index(){
        $items = $this->localidad_m->select('*,tblcatestado.cNombre as estado,tblcatmunicipio.cNombre as municipio,tblcatlocalidad.cNombre as localidad')
                    ->join('tblcatmunicipio','tblcatmunicipio.iIdMunicipio=tblcatlocalidad.iIdMunicipio')
                    ->join('tblcatestado','tblcatmunicipio.iIdEstado=tblcatestado.iIdEstado')
                    ->get_all();
        $this->template->title($this->module_details['name'])
			->set('items',$items)
            //->set('pagination',$pagination)
			//->append_js('module::banner.js')
			->build('admin/index');
    }
    
    function edit($id=0)
    {
        if(!$localidad = $this->localidad_m->get($id))
		{
			$this->session->set_flashdata('error', lang('global:not_found_item'));
			redirect('admin/programas');
		}
         
        
        $municipio = $this->municipio_m->get($localidad->iIdMunicipio);
        $iIdEstado = $municipio->iIdEstado;
        
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
		    $post = $this->input->post();
            
			$data= array(
					'cNombre'       => $post['cNombre'],									
                    'dtModificacion' => date('Y-m-d'),
                    
			);
			if($this->localidad_m->update($id,$data)){
				
				$this->session->set_flashdata('success',lang('global:save_success'));
				
			}else{
				$this->session->set_flashdata('error',lang('global:save_error'));
				
			}
			redirect('admin/localidades/edit/'.$id);
		}
        elseif($_POST){
            $localidad = (Object)$_POST;
            $iIdEstado = $this->input->post('iIdEstado');
        }
         
         $this->template->title($this->module_details['name'])
            ->append_js('module::form.js')
            ->set('iIdEstado',$iIdEstado)
            ->set('estados',$this->estado_m->dropdown('iIdEstado','cNombre')) 
            ->set('municipios',$this->municipio_m->where('iIdEstado',$iIdEstado)->dropdown('iIdMunicipio','cNombre'))            
			
			->set('localidad',$localidad)
			->build('admin/form');
    }
    function create(){
        $localidad = new StdClass();
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
            $post = $this->input->post();
            
			$data= array(                    
                    'iIdMunicipio' => $post['iIdMunicipio'],
					'cNombre'       => $post['cNombre'],					
                    'dtModificacion' => date('Y-m-d'),
                    'dtalta'         => date('Y-m-d'),
			);
			if($id = $this->localidad_m->insert($data)){
				
				$this->session->set_flashdata('success',lang('global:save_success'));
				
			}else{
				$this->session->set_flashdata('error',lang('global:save_error'));
				
			}
			redirect('admin/localidades');
        }
        
  	    foreach ($this->rules as $rule)
		{
			$localidad->{$rule['field']} = $this->input->post($rule['field']);
		}
         $this->template->title($this->module_details['name'])  
            ->append_js('module::form.js')
            ->set('iIdEstado',$this->input->post('iIdEstado'))
            ->set('estados',$this->estado_m->dropdown('iIdEstado','cNombre')) 
            ->set('municipios',$this->municipio_m->where('iIdEstado',$this->input->post('iIdEstado'))->dropdown('iIdMunicipio','cNombre'))              
			->set('localidad',$localidad)
			->build('admin/form');
    }
    function lista($id=0)
    {
        
        $locs = $this->localidad_m->where('iIdMunicipio',$id)->get_all();
        return $this->template->build_json($locs);
    }
}
?>