<?=$this->Form->create('Usuario');?>
		<?=$this->Form->hidden('id');?>
		<?=$this->Form->input('nome', array('label'=>array('class'=>'desc'), 'class'=>'field text  small'));?>
		<?=$this->Form->input('login', array('label'=>array('class'=>'desc'), 'class'=>'field text  small'));?>
		<?=$this->Form->input('senha', array('type'=>'password', 'label'=>array('class'=>'desc'), 'class'=>'field text  small'));?>
		<?=$this->Form->submit('Salvar', array('class'=>'submit')) ?>
<?=$this->Form->end();?>