<style>
h1 { text-align: center; padding-top: 30px; }
.edicao_usuario { background-color: #FFFFF0; padding-top: 15px; padding-bottom: 15px; -moz-border-radius:7px;-webkit-border-radius:7px; border-radius:7px; }
.btn-edita { margin-top: 15px; }
</style>

<div class="conteudo">
	<h1>Edição de Usuário</h1>
	<div class="edicao_usuario col-md-8 offset-md-2">
		<?php if(isset($mensagens)) echo 
		'<div class="alert alert-danger" role="alert">
			  '.$mensagens.'
		</div>'?>
		<form method="post" action="<?php echo base_url(); ?>index.php/usuario/editar/<?php echo $usuario[0]['cd_usuario'] ?>" >
			<div class="form-group">
		    	<label for="nome">Nome</label>
		    	<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuario[0]['nm_usuario'] ?>">		  
			</div>
			<div class="form-group">
		    	<label for="email">Email</label>
		    	<input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario[0]['ds_email'] ?>">	
			</div>
			<div class="form-group">
		    	<label for="senha">Senha</label>
		    	<input type="password" class="form-control" id="senha" name="senha" value="<?php echo $usuario[0]['senha'] ?>">
			</div>
			<div class="form-group">
		    	<label for="confirme_senha">Confirme a senha</label>
		    	<input type="password" class="form-control" id="confirme_senha" name="confirme_senha" value="<?php echo $usuario[0]['senha'] ?>">
			</div>
			<input type="hidden" id="senha_atual" name="senha_atual" value="<?php echo $usuario[0]['senha'] ?>">  
		  
		  <button type="submit" class="btn-edita btn btn-dark">Editar</button>
		</form>
	</div>
</div>

