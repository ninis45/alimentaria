<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	protected $section='productos';
	
	public function __construct()
	{
		parent::__construct();
        $this->lang->load('producto');
        $this->load->model('producto_m');
        $this->rules = array(
			
			array(
				'field' => 'nombre',
				'label' => 'Nombre',
				'rules' => 'trim|required'
				),
   	        array(
				'field' => 'peso',
				'label' => 'Peso',
				'rules' => 'trim|required'
				),
   	        array(
				'field' => 'precio',
				'label' => 'Nombre',
				'rules' => 'trim|required'
				),
        );
    }
    function index(){
        $items = $this->producto_m->get_all();
        $this->template->title($this->module_details['name'])
			->set('items',$items)
            //->set('pagination',$pagination)
			//->append_js('module::banner.js')
			->build('admin/index');
    }
    function edit($id=0)
    {
        if(!$producto_tmp= $this->producto_m->get_by('iIdProducto',$id))
		{
			$this->session->set_flashdata('error', lang('global:not_found_item'));
			redirect('admin/boletines');
		}
         $producto = array(
             'nombre' => $producto_tmp->cNombre,
             'peso' => $producto_tmp->dPeso,
             'precio' => $producto_tmp->dPrecioCompra,
             'created_on' => $producto_tmp->dtModificacion
         );
        
        
        
        $this->form_validation->set_rules($this->rules);
		
				
		if($this->form_validation->run())
		{
		    $post = $this->input->post();
            
			$data= array(
					'cNombre'       => $post['nombre'],
					'dPeso'         => $post['peso'],
					'dPrecioCompra' => $post['precio'],					
                    'dtModificacion' => date('Y-m-d'),
                    
			);
			if($id = $this->producto_m->update($id,$data)){
				
				$this->session->set_flashdata('success',lang('global:save_success'));
				
			}else{
				$this->session->set_flashdata('error',lang('global:save_error'));
				
			}
			redirect('admin/productos/edit/'.$id);
		}
        elseif($_POST){
            $producto = (Object)$_POST;
        }
         
         $this->template->title($this->module_details['name'])
			->set('producto',(Object)$producto)
			->build('admin/form');
    }
    function create(){
        $producto = new StdClass();
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
			$producto->{$rule['field']} = $this->input->post($rule['field']);
		}
         $this->template->title($this->module_details['name'])
			->set('producto',$producto)
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
				
				    
                   
                    $this->producto_m->delete($id);
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
        redirect('admin/productos');
    }
  }
  ?>