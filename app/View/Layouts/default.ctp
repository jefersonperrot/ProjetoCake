<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt-br">
<head>
	<?php echo $this->Html->charset('utf-8'); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('estilo');
		echo $this->Html->css('style.home');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->meta('keywords', 'maringa, web, webdesign');
		echo $this->Html->meta('description', 'MaringaWeb - O maior encontro de Profissionais Web do Parana');
	?>
</head>
<body class="projeto">
	<div class="limitador">
		<div id="topo">
			<div id="bts-topo">
				<a href="#" class="bt-fav"></a>
				<?=$this->Html->link('', '/contato', array('class'=>'bt-contato'))?>
				<a href="#" class="bt-rss"></a>
				<a href="#" class="bt-ajuda"></a>
			</div>
			<?=$this->element('login-topo', array('nomeVisitante'=>'Visitante', 'cache' => true))?>
		</div>
		<div id="dobra-topo"></div>
		<?=$this->element('topo-logo', array('nomeVisitante'=>'Visitante', 'cache' => true))?>
		<div id="banner-full">
			<div id="banner-imagem"><?=$this->Html->image('projeto/banner.png', array('title'=>'Imagem Banner', 'title'=>'MaringáWeb'))?></div>
		</div>
		<div id="dobra-banner"></div>
		<div id="conteudo">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="dobra-rodape"></div>
		<div id="rodape">
			<div id="logo-rodape"><?=$this->Html->link('', '/')?></div>
			<div id="rodape-texto">MaringáWeb - Todos os direitos reservados</div>
		</div>
	</div>
	<?=$this->Html->script(array('jquery','jquery.maskedinput', 'script'));?>
</body>	
</html>
