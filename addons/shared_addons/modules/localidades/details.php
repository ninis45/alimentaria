<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Groups module
 *
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\Groups
 */
 class Module_Localidades extends Module
{

	public $version = '1.0';

	public function info()
	{
		$info= array(
			'name' => array(
				'en' => 'NA',
				
				'es' => 'Localidades',
				
			),
			'description' => array(
				'en' => 'N/A',
				
				'es' => 'N/A',
				
			),
			'frontend' => false,
			'backend' => true,
			'menu' => 'catalog',
            'skip_xss' => false,
            'roles' => array(
				'edit', 'create', 'delete'
			),
            'sections'=>array(
                'localidades'=>array(
                    'name'=>'localidades:title',
                    'uri' => 'admin/localidades',
        			'shortcuts' => array(
        				array(
        					'name' => 'localidades:create_title',
        					'uri' => 'admin/localidades/create',
        					'class' => 'btn btn-primary'
        				),
        			)
                ),
                'municipios'=>array(
                    'name'=>'municipios:title',
                    'uri' => 'admin/localidades/municipios',
        			'shortcuts' => array(
        				array(
        					'name' => 'municipios:create_title',
        					'uri' => 'admin/localidades/municipios/create',
        					'class' => 'btn btn-primary'
        				),
        			)
                ),
                'estados'=>array(
                    'name'=>'estados:title',
                    'uri' => 'admin/localidades/estados',
        			'shortcuts' => array(
        				array(
        					'name' => 'estados:create_title',
        					'uri' => 'admin/localidades/estados/create',
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