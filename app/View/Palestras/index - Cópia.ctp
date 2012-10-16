<?//pr($listagem)?>
<div class="titulo">
		<h2>Palestras</h2>
	</div>
	<div class="data-hj">
		<?=$this->element('data', array('cache' => true))?>
	</div>
	<div class="lista-palestra">
		<ul>
			<?php foreach($listagem as $palestras) { ?>
				<li>
					<span style="font-size:18px; color:#000" class="negrito"><?=$palestras['Palestra']['nome']?></span>
					<br />
					<span class="fonte12 laranja"><?='"'.$palestras['Palestra']['descricao'].'"'?></span>
					<br /><br />
					<span class="fonte11">Dia:</span><br />
					<span class="fonte14 negrito">
						<?php
							$data = $palestras['Palestra']['data'];
							setlocale(LC_ALL, "pt_BR", "ptb");
							echo strftime("%d/%m/%Y", strtotime($data));
						?>
					</span>
					<br /><br />
					<span class="fonte11">Horário:</span><br />
					<span class="fonte11">Das </span><span class="fonte14 negrito"><?=$palestras['Palestra']['inicio']?></span><span class="fonte11"> ás </span><span class="fonte14 negrito"><?=$palestras['Palestra']['fim']?></span>
					<br />
					<span class="fonte11">Palestrante:</span>
					<span style="color:#000" class="fonte14 negrito">
					<?php
							$nome = $palestras['Palestrante']['nome'];
							$slug = Inflector::slug($palestras['Palestrante']['nome'], '-');
							$slug = strtolower($slug);
							$id = $palestras['Palestrante']['id'];
							echo $this->Html->link($nome, "/palestrantes/$slug/$id", array('title'=>'Clique para ver informações sobre o palestrante'));
						?>
					</span>
					<br />
				</li>			
			<?php } ?>
		</ul>
	</div>