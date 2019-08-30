<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Groups module
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\Groups
 */
 class Module_Programas extends Module
{

	public $version = '1.0';

	public function info()
	{
		$info= array(
			'name' => array(
				'en' => 'Programs',
				
				'es' => 'Programas',
				
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
                'programas'=>array(
                    'name'=>'programas:title',
                    'uri' => 'admin/programas',
        			'shortcuts' => array(
        				array(
        					'name' => 'programas:create_title',
        					'uri' => 'admin/programas/create',
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