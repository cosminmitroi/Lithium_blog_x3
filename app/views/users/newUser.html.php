<h2>New User</h2>

<?=$this->form->create($user,array('id'=>'adduser')); ?>
	<?=$this->form->field('username', array('label'=>'Username','placeholder' => 'username')); ?>
	<?=$this->form->field('password', array('id'=>'userpassword','type' => 'password', 'label'=>'Password', 'placeholder' => 'password')); ?>
	<?=$this->form->field('password',array('id'=>'userpasswordrepeat','type' => 'password','label' => 'Repeat Password','placeholder' => 'password repeat'));?>
	<?=$this->form->field('firstname', array('label' => 'FirstName','placeholder' => 'firstname')); ?>
	<?=$this->form->field('lastname', array('lable' => 'LastName' , 'placeholder' => 'lastname'));?>
	<?=$this->form->field('email', array('lable' => 'Email', 'placeholder' => 'email')); ?>

	<button onclick="return false;" id="usersubmit">Add User</button>	
<?=$this->form->end(); ?>
<script type="text/javascript">
$('#usersubmit').bind('click',function(){
	if($('#userpassword').val() != $('#userpasswordrepeat').val()){
		alert('Password do not match');
		return false;
	}
	$('#adduser').submit();
})	
</script>