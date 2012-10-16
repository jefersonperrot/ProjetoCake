<div class="titulo">
		<h2>Inscrições</h2>
	</div>
	<div class="data-hj">
		<?=$this->element('data', array('cache' => true))?>
	</div>
	<div class="conteudo-formulario">
		<div class="cont-esq">
			<?=$this->Form->create('Inscricao', array('controller'=>'InscricoesController', 'action' => 'inscricao')) ?>
			<?=$this->Form->hidden('id')?>
			<?=$this->Form->input('nome', array('label'=>'Nome', 'div'=>array('class'=>'label-form')))?>
			<?=$this->Form->input('email', array('label'=>'E-mail', 'div'=>array('class'=>'label-form')))?>
			<?=$this->Form->input('telefone', array('label'=>'Telefone', 'div'=>array('class'=>'label-form')))?>
			<?=$this->Form->input('endereco', array('label'=>'Endereço', 'div'=>array('class'=>'label-form')))?>
			<?=$this->Form->input('estado_id', array('options'=>array($estados), 'id'=>'slt-estado', 'div'=>array('class'=>'label-form')))?>
			<?=$this->Form->input('cidade_id', array('id'=>'slt-cidade', 'div'=>array('class'=>'label-form')))?>
			<?=$this->Form->end('Enviar')?>
		</div>
		<div class="cont-dir">
			<?=$this->Html->image('projeto/ads.png', array('alt' => 'MaringáWeb'));?>
		</div>
	</div>