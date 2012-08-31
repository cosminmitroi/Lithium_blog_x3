<?php if(isset($success) && $success): ?>
<?php else: ?>

<?=$this->form->create($post, array('method' => 'post')); ?>
     <?=$this->form->hidden('id'); ?>
     <?=$this->form->field('title'); ?>
     <?=$this->form->field('body',array('type' => 'textarea','rows' => 10)); ?>
     <?=$this->form->submit('Add Post'); ?>
<?=$this->form->end(); ?>
<?php endif; ?> 
 
