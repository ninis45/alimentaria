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
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/signin/">

    <title><?php echo $this->settings->site_name; ?> - <?php echo lang('login_title');?></title>

    <!-- Bootstrap core CSS -->
    

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    

    <!-- Custom styles for this template -->
    

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php Asset::css('bootstrap.min.css'); ?>
	<?php Asset::css('signin.css'); ?>
	
	<?php //Asset::js('jquery/jquery.js'); ?>
	<?php //Asset::js('admin/login.js'); ?>

	<?php echo Asset::render() ?>
  </head>

  <body>

    <div class="container">

      <?php echo form_open('admin/login','class="form-signin"'); ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember" id="remember-check" checked />
								<?php echo lang('user:remember'); ?>
          </label>
        </div>
        
        
        <button id="login-submit" class="btn btn-lg btn-primary btn-block" ontouchstart="" type="submit" name="submit" value="<?php echo lang('login_label'); ?>">
								<span><?php echo lang('login_label'); ?></span>
							</button>
      	<?php echo form_close(); ?>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>