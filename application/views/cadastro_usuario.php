<style>
h1 { text-align: center; padding-top: 30px; }
.cadastro_usuario { background-color: #FFFFF0; padding-top: 15px; padding-bottom: 15px; -moz-border-radius:7px;-webkit-border-radius:7px; border-radius:7px; }
.btn-cadastra { margin-top: 15px; }
</style>

<div class="conteudo">
	<h1>Cadastro de Usuário</h1>
	<div class="cadastro_usuario col-md-8 offset-md-2">
		<?php if(isset($mensagens)) echo 
		'<div class="alert alert-danger" role="alert">
			  '.$mensagens.'
		</div>'?>
		<form method="post" action="<?php echo base_url(); ?>index.php/usuario/cadastrar" >
			<div class="form-group">
		    	<label for="nome">Nome</label>
		    	<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">		  
			</div>
			<div class="form-group">
		    	<label for="email">Email</label>
		    	<input type="email" class="form-control" id="email" name="email" placeholder="Email">	
			</div>
			<div class="form-group">
		    	<label for="senha">Senha</label>
		    	<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
			</div>
			<div class="form-group">
		    	<label for="confirme_senha">Confirme a senha</label>
		    	<input type="password" class="form-control" id="confirme_senha" name="confirme_senha" placeholder="Confirme a senha">
			</div>  
		  
		  <button type="submit" class="btn-cadastra btn btn-dark">Cadastrar</button>
		</form>
	</div>
</div>

