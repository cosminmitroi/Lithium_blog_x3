
<h2> Add new post </h2>
<?php
$this->form->config(array('templates' => array('error' => '<div class="error"{:options}>{:content}</div>')));
?>
<?=$this->form->create($post); ?>
     <?=$this->form->field('title');?>
     <?=$this->form->field('body', array('type' => 'textarea', 'rows' => 15)); ?>
     <?=$this->form->submit('Add post'); ?>
<?=$this->form->end(); ?>
