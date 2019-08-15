<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/starter-template/">

    <title><?php echo $template['title'].' - '.lang('cp:admin_title') ?></title>

    <!-- Bootstrap core CSS -->
    
    <?php echo Asset::css('bootstrap.min.css'); ?>

    <!-- Custom styles for this template -->
    <?php echo Asset::css('dashboard.css'); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- metadata needs to load before some stuff -->
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
   
	<?php file_partial('metadata'); ?>
  </head>

  <body>

    
   <?php file_partial('header') ?>

   <div class="container-fluid">
      <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
          <?php file_partial('navigation'); ?>
              
          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
              <div class="subbar-inner">
                <h2><?php echo $module_details['name'] ? anchor('admin/'.$module_details['slug'], $module_details['name']) : lang('global:dashboard') ?></h2>
		
    			<small>
    				<?php if ( $this->uri->segment(2) ) { echo '<span class="divider">&nbsp; | &nbsp;</span>'; } ?>
    				<?php echo $module_details['description'] ? $module_details['description'] : '' ?>
    				<?php if ( $this->uri->segment(2) ) { echo '<span class="divider">&nbsp; | &nbsp;</span>'; } ?>
    				<?php if($module_details['slug']): ?>
    				<?php echo anchor('admin/help/'.$module_details['slug'], lang('help_label'), array('title' => $module_details['name'].'&nbsp;'.lang('help_label'), 'class' => 'modal')); ?>
    				<?php endif; ?>
    			</small>
                <?php file_partial('shortcuts') ?>
              </div>
                <?php file_partial('notices'); ?>
				<?php echo $template['body']; ?>
          </div>
      </div>
   </div>
    


   
  </body>
</html>