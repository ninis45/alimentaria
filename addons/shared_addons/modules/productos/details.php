<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Groups module
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\Groups
 */
 class Module_Productos extends Module
{

	public $version = '1.0';

	public function info()
	{
		$info= array(
			'name' => array(
				'en' => 'Products',
				
				'es' => 'Productos',
				
			),
			'description' => array(
				'en' => 'N/A',
				
				'es' => 'N/A',
				
			),
			'frontend' => false,
			'backend' => true,
			'menu' => 'content',
            'skip_xss' => false,
            'roles' => array(
				'edit', 'create', 'delete'
			),
            'sections'=>array(
                'productos'=>array(
                    'name'=>'productos:title',
                    'uri' => 'admin/productos',
        			'shortcuts' => array(
        				array(
        					'name' => 'productos:create_title',
        					'uri' => 'admin/productos/create',
        					'class' => 'btn btn-primary'
        				),
        			)
                )
           )
		);
        
        /*if (function_exists('group_has_role'))
		{
			if(group_has_role('avisos', 'admin_avisos_fields'))
			{
			    
				$info['sections']['fields'] = array(
							'name' 	=> 'global:custom_fields',
							'uri' 	=> 'admin/avisos/fields',
							'shortcuts' => array(
									'create' => array(
										'name' 	=> 'streams:add_field',
										'uri' 	=> 'admin/avisos/fields/create',
										'class' => 'add'
										)
							)
				);
			}
		}*/
        
        
        return $info;
	}

	public function install()
	{
	   
        return true;
        
		

		
	}

	public function uninstall()
	{
	  
        
		return true;
	}

	public function upgrade($old_version)
	{
		return true;
	}

}
?>