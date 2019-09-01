<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Admin Page Layouts controller for the Pages module
 *
 * @author  PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\Blog\Controllers
 */
class Admin_Municipios extends Admin_Controller
{

	/** @var int The current active section */
	protected $section = 'municipios';
    
    public function __construct()
	{
		parent::__construct();
        $this->lang->load('localidad');
        $this->load->model(array('municipio_m','estado_m'));
        $this->rules = array(
			
  	     
           array(
				'field' => 'iIdEstado',
				'label' => 'Estado',
				'rules' => 'trim|required'
				),
			array(
				'field' => 'cNombre',
				'label' => 'Municipio',
				'rules' => 'trim|required'
				),
    	    array(
				'field' => 'cCodigo',
				'label' => 'Codigo',
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
        $items = $this->municipio_m->select('*,tblcatestado.cNombre as estado,tblcatmunicipio.cNombre as municipio,tblcatmunicipio.cCodigo as cCodigo')
                    ->join('tblcatestado','tblcatmunicipio.iIdEstado=tblcatestado.iIdEstado')
                    ->get_all();
        $this->template->title($this->module_details['name'])
			->set('items',$items)
            //->set('pagination',$pagination)
			//->append_js('module::banner.js')
			->build('admin/municipios/index');
    }
    function edit($id=0){
        $municipio = $this->municipio_m->get($id);
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
            $post = $this->input->post();
            
			$data= array(
					'cNombre'       => $post['cNombre'],
  	                'cCodigo'       => $post['cCodigo'],					
                    'dtModificacion' => date('Y-m-d'),
                    
			);
			if($this->municipio_m->update($id,$data)){
				
				$this->session->set_flashdata('success',lang('global:save_success'));
				
			}else{
				$this->session->set_flashdata('error',lang('global:save_error'));
				
			}
			redirect('admin/localidades/estados');
        }        
  	    elseif($_POST){
            $municipio = (Object)$_POST;
        }
         $this->template->title($this->module_details['name']) 
            ->set('estados',$this->estado_m->dropdown('iIdEstado','cNombre'))            
			->set('municipio',$municipio)
			->build('admin/municipios/form');
    }
    function create(){
        $municipio = new StdClass();
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
            $post = $this->input->post();
            
			$data= array(
                    'iIdEstado' => $post['iIdEstado'],
					'cNombre'       => $post['cNombre'],
  	                'cCodigo'       => $post['cCodigo'],					
                    'dtModificacion' => date('Y-m-d'),
                    'dtalta'         => date('Y-m-d'),
			);
			if($id = $this->municipio_m->insert($data)){
				
				$this->session->set_flashdata('success',lang('global:save_success'));
				
			}else{
				$this->session->set_flashdata('error',lang('global:save_error'));
				
			}
			redirect('admin/localidades/municipios');
        }
        
  	    foreach ($this->rules as $rule)
		{
			$municipio->{$rule['field']} = $this->input->post($rule['field']);
		}
         $this->template->title($this->module_details['name'])  
            ->set('estados',$this->estado_m->dropdown('iIdEstado','cNombre'))          
			->set('municipio',$municipio)
			->build('admin/municipios/form');
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
				
				    
                   
                    $this->municipio_m->delete($id);
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
        redirect('admin/localidades/municipios');
    }
    function lista($id=0)
    {
        
        $muns = $this->municipio_m->where('iIdEstado',$id)->get_all();
        return $this->template->build_json($muns);
    }
 }
 ?>