<?//pr($palestrante)?>
	<div class="titulo">
		<h2>Palestrantes</h2>
	</div>
	<div class="data-hj">
		<?=$this->element('data', array('cache' => true))?>
	</div>
	<div class="lista-palestra">
		<ul>
				<li>
					<span class="fonte11">Nome:</span><br />
					<span style="font-size:18px; color:#000" class="negrito"><?=$palestrante['Palestrante']['nome']?></span>
					<br /><br /><br />
					<span class="fonte12 laranja"><?='"'.$palestrante['Palestrante']['descricao'].'"'?></span>
					<br /><br /><br />
					<span class="fonte11">
					<?php
						echo $this->Html->link($palestrante['Palestrante']['endereco_site'], '/palestrantes/listar');
						// $palestras['Palestrante']['endereco_site']
					?>
					</span>
				</li>			
		</ul>
	</div>