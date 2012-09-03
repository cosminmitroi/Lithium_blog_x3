<h2>New User</h2>
<?php if(isset($success) && $success):?>
<?php else: ?>
<?=$this->form->create($user); ?>
	<?=$this->form->field('username', array('label'=>'Username')); ?>
	<?=$this->form->field('firstname', array('label' => 'FirstName')); ?>
	<?=$this->form->field('lastname', array('lable' => 'LastName'));?>
	<?=$this->form->field('email', array('lable' => 'Email')); ?>
	<?=$this->form->field('gender',array('lable' => 'Gender'));?>
	<?=$this->form->submit('Add User'); ?>
<?=$this->form->end(); ?>
<?php endif; ?> 

 