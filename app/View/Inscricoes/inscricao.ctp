<div class="titulo">
		<h2>Inscrições</h2>
	</div>
	<div class="data-hj">
		<?=$this->element('data', array('cache' => true))?>
	</div>
	<div class="conteudo-formulario">
		<div class="cont-esq">
			<?=$this->Form->create('Inscricoes', array('controller'=>'InscricoesController', 'action' => 'inscricao')) ?>
			<div class="label-form">
			<?=$this->Form->input('nome', array('label'=>'Nome'))?>
			</div>
			<div class="label-form">
			<?=$this->Form->input('email', array('label'=>'E-mail'))?>
			</div>
			<div class="label-form">
			<?=$this->Form->input('telefone', array('label'=>'Telefone', 'class'=>'validatel'))?>
			</div>
			<div class="label-form">
			<?=$this->Form->input('endereco', array('label'=>'Endereço'))?>
			</div>
			<div class="label-form">
			<?=$this->Form->input('estado_id', array('options'=>array($estados), 'class'=>'fl size-200', 'id'=>'slt-estado', 'label'=>array('class'=>'fl size-120'), 'div'=>array('class'=>'form-field clear')))?>
			</div>
			<div class="label-form">
			<?=$this->Form->input('cidade_id', array('class'=>'required fl size-200', 'id'=>'slt-cidade','label'=>array('class'=>'fl size-120'), 'div'=>array('class'=>'form-field clear')))?>
			</div>
			<div class="label-form">
			<?=$this->Form->submit('Enviar') ?>
			</div>
			<?=$this->Form->end()?>
		</div>
		<div class="cont-dir">
			<?=$this->Html->image('projeto/ads.png', array('alt' => 'MaringáWeb'));?>
		</div>
	</div>