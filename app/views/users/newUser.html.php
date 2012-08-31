<h2>New User</h2>

<?=$this->form->create(); ?>
	<?=$this->form->field('username', array('label'=>'Username','placeholder' => 'username')); ?>
	<?=$this->form->field('password', array('type' => 'password', 'label'=>'Password', 'placeholder' => 'password')); ?>
	<?=$this->form->field('firstname', array('label' => 'FirstName','placeholder' => 'firstname')); ?>
	<?=$this->form->field('lastname', array('lable' => 'LastName' , 'placeholder' => 'lastname'));?>
	<?=$this->form->field('email', array('lable' => 'Email', 'placeholder' => 'email')); ?>
	<?=$this->form->submit('Add User'); ?>
<?=$this->form->end(); ?>