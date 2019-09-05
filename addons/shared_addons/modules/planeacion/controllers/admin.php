<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	protected $section='planeacion';
	
	public function __construct()
	{
		parent::__construct();
        $this->lang->load('planeacion');
        $this->load->model(array('programas/programa_m','planeacion_m','localidades/municipio_m','localidades/estado_m','localidades/localidad_m'));
        $this->rules = array(
  	      
			array(
				'field' => 'iIdPrograma',
				'label' => 'Programa',
				'rules' => 'trim|required'
				),
  	         array(
				'field' => 'iIdEstado',
				'label' => 'Estado',
				'rules' => 'trim|required'
				),
   	        array(
				'field' => 'iIdMunicipio',
				'label' => 'Municipio',
				'rules' => 'trim|required'
				),
			array(
                'field' => 'iIdLocalidad',
				'label' => 'Localidad',
				'rules' => 'trim|required'
				)
           
        );
 	}
    function index(){
        $items = $this->planeacion_m->select('*,tblcatestado.cNombre as estado,tblcatmunicipio.cNombre as municipio,tblcatlocalidad.cNombre as localidad,tblcatprograma.cNombre as programa')
                        ->join('tblcatprograma','tblcatprograma.iIdPrograma=tblplaneacionentrega.iIdPrograma')
                        ->join('tblcatlocalidad','tblplaneacionentrega.iIdLocalidad=tblcatlocalidad.iIdLocalidad')
                        ->join('tblcatmunicipio','tblplaneacionentrega.iIdMunicipio=tblcatmunicipio.iIdMunicipio')
                        ->join('tblcatestado','tblplaneacionentrega.iIdEstado=tblcatestado.iIdEstado')
                        ->get_all();
        $this->template->title($this->module_details['name'])
			->set('items',$items)
            //->set('pagination',$pagination)
			//->append_js('module::banner.js')
			->build('admin/index');
    }
    
    function edit($id=0)
    {
        if(!$planeacion = $this->planeacion_m->get($id))
		{
			$this->session->set_flashdata('error', lang('global:not_found_item'));
			redirect('admin/programas');
		}
         
        
        
        
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
		    $post = $this->input->post();
            
			$data= array(
					'iIdPrograma' => $post['iIdPrograma'],
                    'iIdEstado' => $post['iIdEstado'],
					'iIdMunicipio' => $post['iIdMunicipio'],
                    'iIdLocalidad' => $post['iIdLocalidad'],					
                    'dtModificacion' => date('Y-m-d'),
                    
			);
			if($this->planeacion_m->update($id,$data)){
				
				$this->session->set_flashdata('success',lang('global:save_success'));
				
			}else{
				$this->session->set_flashdata('error',lang('global:save_error'));
				
			}
			redirect('admin/planeacion/edit/'.$id);
		}
        elseif($_POST){
            $planeacion = (Object)$_POST;
        }
         
         $this->template->title($this->module_details['name'])
            ->append_js('module::form.js')
            ->set('programas',$this->programa_m->dropdown('iIdPrograma','cNombre')) 
            ->set('estados',$this->estado_m->dropdown('iIdEstado','cNombre')) 
            ->set('municipios',$this->municipio_m->where('iIdEstado',$planeacion->iIdEstado)->dropdown('iIdMunicipio','cNombre'))      
            ->set('localidades',$this->localidad_m->where('iIdMunicipio',$planeacion->iIdMunicipio)->dropdown('iIdLocalidad','cNombre'))                        
			->set('planeacion',$planeacion)
			->build('admin/form');
    }
    function create(){
        $planeacion = new StdClass();
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
            $post = $this->input->post();
            
			$data= array(
                    'iIdPrograma' => $post['iIdPrograma'],
                    'iIdEstado' => $post['iIdEstado'],
					'iIdMunicipio' => $post['iIdMunicipio'],
                    'iIdLocalidad' => $post['iIdLocalidad'],					
                    'dtModificacion' => date('Y-m-d'),
                    'dtalta'         => date('Y-m-d'),
			);
			if($id = $this->planeacion_m->insert($data)){
				
				$this->session->set_flashdata('success',lang('global:save_success'));
				
			}else{
				$this->session->set_flashdata('error',lang('global:save_error'));
				
			}
			redirect('admin/planeacion');
        }
        
  	    foreach ($this->rules as $rule)
		{
			$planeacion->{$rule['field']} = $this->input->post($rule['field']);
		}
         $this->template->title($this->module_details['name']) 
            ->append_js('module::form.js')
            ->set('programas',$this->programa_m->dropdown('iIdPrograma','cNombre')) 
            ->set('estados',$this->estado_m->dropdown('iIdEstado','cNombre')) 
            ->set('municipios',$this->municipio_m->where('iIdEstado',$this->input->post('iIdEstado'))->dropdown('iIdMunicipio','cNombre'))      
            ->set('localidades',$this->localidad_m->where('iIdMunicipio',$this->input->post('iIdMunicipio'))->dropdown('iIdLocalidad','cNombre'))                        
			->set('planeacion',$planeacion)
			->build('admin/form');
    }
    
     function delete($id=0)
    {
        $ids = ($id) ?array(0=>$id) : $this->input->post('action_to');
		$deletes = array();
        if ( ! empty($ids))
		{
		  
   	        foreach ($ids as $id)
			{
				// Get the current page so we can grab the id too
				
				    
                   
                    $this->planeacion_m->delete($id);
                    $deletes[]=$id;
                
            }
        }
        if ( ! empty($deletes))
		{
		    $this->session->set_flashdata('success', lang('global:delete_success'));
        }
        else
        {
            $this->session->set_flashdata('error',lang('global:delete_error'));
        }
        redirect('admin/planeacion');
    }
}
?>