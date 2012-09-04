<?//pr($palestrante)?>
<div class="titulo">
		<h2>Cadastrar Palestra</h2>
	</div>
	<div class="data-hj">
		<?=$this->element('data', array('cache' => true))?>
	</div>
	<div class="conteudo-formulario">
		<div class="cont-esq">
			<?=$this->Form->create('CadastroPalestra', array('controller'=>'PalestrasController', 'action' => 'CadastrarPalestra')) ?>
			<div class="label-form">
			<?=$this->Form->input('palestrante_id', array('options'=>array($palestrante), 'label'=>'Palestrante'))?>
			</div>
			<div class="label-form">
			<?=$this->Form->input('nome', array('label'=>'Nome'))?>
			</div>
			<div class="label-form">
			<?=$this->Form->input('descricao', array('label'=>'Descrição', 'type'=>'textarea'))?>
			</div>
			<div class="label-form">
			<?=$this->Form->input('inicio', array('label'=>'Início'))?>
			</div>
			<div class="label-form">
			<?=$this->Form->input('Fim', array('label'=>'Fim'))?>
			</div>
			<div class="label-form">
			<?=$this->Form->submit('Cadastrar') ?>
			</div>
			<?=$this->Form->end()?>
		</div>
		<div class="cont-dir">
			<?//=$this->Html->image('projeto/ads.png', array('alt' => 'MaringáWeb'));?>
		</div>
	</div>