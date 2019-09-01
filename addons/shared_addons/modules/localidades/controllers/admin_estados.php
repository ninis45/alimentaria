<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Admin Page Layouts controller for the Pages module
 *
 * @author  PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\Blog\Controllers
 */
class Admin_Estados extends Admin_Controller
{

	/** @var int The current active section */
	protected $section = 'estados';
    
    public function __construct()
	{
		parent::__construct();
        $this->lang->load('localidad');
        $this->load->model(array('estado_m'));
        $this->rules = array(
			
  	      
			array(
				'field' => 'cNombre',
				'label' => 'Nombre',
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
        $items = $this->estado_m->get_all();
        $this->template->title($this->module_details['name'])
			->set('items',$items)
            //->set('pagination',$pagination)
			//->append_js('module::banner.js')
			->build('admin/estados/index');
    }
    function edit($id=0){
        $estado = $this->estado_m->get($id);
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
            $post = $this->input->post();
            
			$data= array(
					'cNombre'       => $post['cNombre'],
  	                'cCodigo'       => $post['cCodigo'],					
                    'dtModificacion' => date('Y-m-d'),
                    
			);
			if($this->estado_m->update($id,$data)){
				
				$this->session->set_flashdata('success',lang('global:save_success'));
				
			}else{
				$this->session->set_flashdata('error',lang('global:save_error'));
				
			}
			redirect('admin/localidades/estados');
        }        
  	    elseif($_POST){
            $estado = (Object)$_POST;
        }
         $this->template->title($this->module_details['name'])            
			->set('estado',$estado)
			->build('admin/estados/form');
    }
    function create(){
        $estado = new StdClass();
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
            $post = $this->input->post();
            
			$data= array(
					'cNombre'       => $post['cNombre'],
  	                'cCodigo'       => $post['cCodigo'],					
                    'dtModificacion' => date('Y-m-d'),
                    'dtalta'         => date('Y-m-d'),
			);
			if($id = $this->estado_m->insert($data)){
				
				$this->session->set_flashdata('success',lang('global:save_success'));
				
			}else{
				$this->session->set_flashdata('error',lang('global:save_error'));
				
			}
			redirect('admin/localidades/estados');
        }
        
  	    foreach ($this->rules as $rule)
		{
			$estado->{$rule['field']} = $this->input->post($rule['field']);
		}
         $this->template->title($this->module_details['name'])            
			->set('estado',$estado)
			->build('admin/estados/form');
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
				
				    
                   
                    $this->estado_m->delete($id);
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
        redirect('admin/localidades/estados');
    }
 }
 ?>