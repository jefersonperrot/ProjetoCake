	<div class="titulo">
		<h2>Contato</h2>
	</div>
	<div class="data-hj">
		<?=$this->element('data', array('cache' => true))?>
	</div>
	<div class="conteudo-formulario">
		<div class="cont-esq">
			<form action="" method="post"/>
				<div class="label-form">
					<label>Nome</label>
					<input type="text" name="nome" />
				</div>
				<div class="label-form">
					<label>E-mail</label>
					<input type="text" name="email" />
				</div>
				<div class="label-form">
				<label>Assunto</label>
					<select name="assunto">
						<option value="0">Dúvidas</option>
						<option value="1">Reclamações</option>
						<option value="2">Sugestões</option>
					</select>
				</div>
				<div class="label-form">
					<label>Mensagem</label>
					<textarea name="mensagem"></textarea>
				</div>
				<div class="label-form">
					<input type="submit" value="Enviar" />
				</div>
			</form>
		</div>
		<div class="cont-dir">
			<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?f=q&amp;source=embed&amp;hl=pt-BR&amp;geocode=&amp;q=Avenida+Tiradentes+-+Zona+01+Maring%C3%A1+-+PR+87013-260%E2%80%8E&amp;aq=&amp;sll=-14.408749,-54.042208&amp;sspn=67.199869,135.263672&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=Av.+Tiradentes+-+Zona+01,+Maring%C3%A1+-+Paran%C3%A1,+87013-260&amp;ll=-23.413477,-51.939068&amp;spn=0.027567,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.br/maps?f=q&amp;source=embed&amp;hl=pt-BR&amp;geocode=&amp;q=Avenida+Tiradentes+-+Zona+01+Maring%C3%A1+-+PR+87013-260%E2%80%8E&amp;aq=&amp;sll=-14.408749,-54.042208&amp;sspn=67.199869,135.263672&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=Av.+Tiradentes+-+Zona+01,+Maring%C3%A1+-+Paran%C3%A1,+87013-260&amp;ll=-23.413477,-51.939068&amp;spn=0.027567,0.036478&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left; display:none;">Exibir mapa ampliado</a></small>
		</div>
	</div>