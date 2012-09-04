<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2012, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */
 use lithium\security\Auth;
 use lithium\storage\Session;
?>
<!doctype html>
<html>
<head>
	<?php echo $this->html->charset();?>
	<title>Blog Application X3 &gt; <?php echo $this->title(); ?></title>
	<?php echo $this->html->style(array('debug', 'lithium')); ?> 

	<?php echo $this->scripts(); ?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
	
 <STYLE type="text/css">

.mc_blog ul li{
			float: left;
			padding-right: 5px;
			margin-bottom: 25px;
			text-align:center;
}
 ul {
			margin:0;
			padding:0;
			list-style-type:none;
			min-width:100px;
		}
 
ul#navigation {
			float:right;
			cursor: pointer;
		}
 
ul#navigation li{
			float:left;
			border:1px black solid;
			min-width:80px;
			text-decoration: none;
			margin-right: 5px;
			box-shadow: 1px 1px 2px rgba(0,0,0,.5);
			-moz-border-radius: 8px; 
			-moz-box-shadow: 1px 1px 2px rgba(0,0,0,.5);
			background: -moz-linear-gradient(center top, #a4ccec, #72a6d4 25%, #3282c2 45%, #357cbd 85%, #72a6d4); 
			-webkit-border-radius: 8px; 
			-webkit-box-shadow: 3px 3px 4px rgba(0,0,0,.5); 
			background: -webkit-gradient(linear, center top, center bottom, from(#a4ccec), color-stop(25%, #72a6d4), color-stop(45%, #3282c2), color-stop(85%, #357cbd), to(#72a6d4));
			
		}
ul#navigation li a{
	color: white;
} 
ul.sub_navigation {
			position:absolute;
			display:none;
			
		
		}
ul#navigation li:hover{
	-webkit-border-radius: 10px 4px 10px / 0.5px 2px;
	box-shadow: 1px 3px 4px rgba(0,1,0,.5);
}
ul#navigation .sub_navigation li{
			clear:both;
			border: 1px black solid;
			box-shadow: 1px 3px 4px rgba(0,1,0,.5);
			-webkit-border-radius: 4px 10px 4px / 0.5px 1.5px;
			-webkit-box-shadow: 1px 3px 4px rgba(0,1,0,.5);  	
		}

a:active,
a:visited {
			display:block;
			padding:5px;
		
		}

 </STYLE>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('.dropdown').hover(function() {
				$(this).find('.sub_navigation').slideToggle(); 
			});	
	
});
</script>
</head>

<body class="app">
	<div id="container">
		<div id="header">
			<h1>Application</h1>
			<h2>
				Powered by <?php echo $this->html->link('X3', 'http://wearex3.com/'); ?>
			</h2>
			
			<?php
			
		///	if($this->_request->url != '/users/login'):
			?>
		    <?php if(Auth::check('member')){?>
		    <h3>User login:  	
		    <a href="/users/view/<?=Session::read('member.id')?>"><?=$this->html->image('edituser.png')?> <?= ucfirst(Session::read('member.username'));?></a>
		    </h3>
		    <?php }?>
	       <div class="mc_blog">
			<ul id="navigation">
				<li class="dropdown"><a href="/posts/">Posts</a>
					<?php if(Auth::check('member')){?>
					 <ul class="sub_navigation">
			            <li><a href="/posts/add">Add Posts</a></li>
			        </ul> 
			        <?php }?>
				</li>
				<li class="dropdown"><a href="/users/newUser">New User</a>
				</li>
				
				<?php  if(Auth::check('member')) {?>
						<li class="dropdown"><a href="/users/logout">Logout</a></li>
				<?php }else{?>
					    <li class="dropdown"><a href="/users/login">Login</a></li>
				<?php }?>
				
				<li class="dropdown"><a href="/users/">Users</a>
				</li>
			</ul>
		</div>
			<?php
		//	endif;
			?>		
				
		</div>
		<div id="content">
			<?php echo $this->content(); ?>
		</div>
	</div>
</body>
</html>