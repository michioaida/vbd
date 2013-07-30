<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('/js/jquery-1.10.2.min.js');
	?>
	<script type="text/javascript">
 
		$(document).ready(function(){
		 
		    $("#electionyearDiv").hide();
		    $(".show_hide").show();
		 
		    $('.show_hide').click(function(){
		   		 $("#electionyearDiv").slideToggle();
		    });
		    
		    $("#positionsDiv").hide();
		    $(".show_hide1").show();
		 
		    $('.show_hide1').click(function(){
		   		 $("#positionsDiv").slideToggle();
		    });
		 
		});
 
</script>

	
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="logo" style="float: left; width: 30%;">
				Tactical Voter Logo
			</div>
			<div id="userStatus" style="float: right; width: 70%;">
				<?php
					if($this->Session->read('Auth.User')) {
					   	// user is logged in, show logout..user menu etc
					   	?>
					   	<div class="light">
					   	<?php
					   	echo "Hello " ;
					   	echo $this->Html->link(__('Logout'), array('controller'=>'users', 'action'=>'logout'), array('class' => 'light')); 
					   	?>
					   	</div>
					   	<?php
					} else {
					   	// the user is not logged in
					   	echo $this->Html->link(__('Login'), array('controller'=>'users', 'action'=>'login'), array('class' => 'light')); 
					?>

					
					<?php }	?>	
			</div>
			<br style="clear: both;" />
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
			
			<?php
					if($this->Session->read('Auth.User')) {
					   	// user is logged in, show logout..user menu etc
					   	?>
					   	<div class="light">
					   	<?php
					   	echo "Hello " ;
					   	echo $this->Html->link(__('Logout'), array('controller'=>'users', 'action'=>'logout'), array('class' => 'light')); 
					   	?>
					   	</div>
					   	<?php
					} else {
					   	// the user is not logged in
					   	echo $this->Html->link(__('Login'), array('controller'=>'users', 'action'=>'login'), array('class' => 'light')); 
					}
				?>
			
		</div>
		<div id="footer">
		</div>

	</div>
	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
