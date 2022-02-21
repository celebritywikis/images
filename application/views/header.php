<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $title?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo base_url(); ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script src='<?= base_url() ?>resources/tinymce/tinymce.min.js'></script>
	
	<script>
	
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/azzara.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo.css">
	
	<?php 
	$link = base_url();
	?>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
function confirmdelete(){
if (confirm("Are you sure you want to delete this AD ?")) {
	alert('ok');
	} else {
		alert('cancel');
	}
}
</script>
</head>
<body>
	<div class="wrapper">
		<div class="main-header" data-background-color="purple">
			<div class="logo-header">
				<div class="navbar-minimize">
					 <!-- <img src="<?php //echo base_url(); ?>assets/img/gaanalogo.jpg" height=57 width="250" alt="Gaana Lyrics"> -->
					<a href="<?= base_url();?>Dashboard/" Style="color:#fff;margin-left:10px;">108 Images</a>
				</div>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<?php if($this->session->flashdata('msg')): ?>
    <p style="color:#fff;margin-top: 12px;margin-left: 450px;font-size: 16px" class="alert_msg"><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						
						
						<li class="nav-item dropdown hidden-caret">
							<a href="<?= base_url();?>Snmy/logout" Style="color:#fff;margin-left:10px;">Logout</a>
						</li>
						
					</ul>
				</div>
			</nav>
		</div>