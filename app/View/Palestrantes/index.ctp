<?//pr($listagem)?>
<div class="titulo">
		<h2>Palestrantes</h2>
	</div>
	<div class="data-hj">
		<?=$this->element('data', array('cache' => true))?>
	</div>
	<div class="lista-palestra">
		<ul>
			<?php foreach($listagem as $palestras) { ?>
				<li>
					<span style="font-size:18px; color:#000" class="negrito">
						<?php
							$nome = $palestras['Palestrante']['nome'];
							$slug = Inflector::slug($palestras['Palestrante']['nome'], '-');
							$slug = strtolower($slug);
							// echo $slug;
							$id = $palestras['Palestrante']['id'];
							// echo $id;
							echo $this->Html->link($nome, "/palestrantes/$slug/$id", array('title'=>'Clique para ver informações sobre o palestrante'));
						?>
					</span>
					<br />
					<span class="fonte12 laranja"><?='"'.$palestras['Palestrante']['descricao'].'"'?></span>
				</li>			
			<?php } ?>
		</ul>
	</div>