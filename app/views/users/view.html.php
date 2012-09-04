<article>
	<div style="margin: 100px auto auto 20px;">
         <h2><span><a href="/users/">&lArr;</span></h2>
		<h2>Username: <?=$users['username']; ?></h2>
		      <h4>First Name: <?=$users['firstname'];?></h4>
		      <h4>Last Name: <?=$users['lastname']; ?></h4>
		      <h4>E-Mail: <?=$users['email']; ?></h4>
		     <?php if(!empty($users['gender'])){?>
		      <h4>Gender: <?=$users['gender']?></h4>
		      <?php }?>
		    
        </div>                                      
</article>