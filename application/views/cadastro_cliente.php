<style>
h1 { text-align: center; padding-top: 30px; }
.cadastro_cliente { background-color: #FFFFF0; padding-top: 15px; padding-bottom: 15px; -moz-border-radius:7px;-webkit-border-radius:7px; border-radius:7px; }
.btn-cadastra { margin-top: 15px; }
</style>

<div class="conteudo">
	<h1>Cadastro de Cliente</h1>
	<div class="cadastro_cliente col-md-8 offset-md-2">
		<?php if(isset($mensagens)) echo 
		'<div class="alert alert-danger" role="alert">
			  '.$mensagens.'
		</div>'?>
		<form method="post" action="<?php echo base_url(); ?>index.php/cliente/cadastrar">
			<div class="form-group">
		    	<label for="razao_social">Razão Social</label>
		    	<input type="text" class="form-control" id="razao_social" name="razao_social" placeholder="Razão social">		  
			</div>
			<div class="form-group">
		    	<label for="nome_fantasia">Nome Fantasia</label>
		    	<input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" placeholder="Nome fantasia">		
			</div>
			<div class="form-group">
		    	<label for="cnpj">CNPJ</label>
		    	<input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ">		
			</div>
			<div class="form-group">
		    	<label for="endereco">Endereço</label>
		    	<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">	
			</div>
			<div class="form-row">
				<div class="col">
					<label for="email">Email</label>
		    		<input type="text" class="form-control" id="email" name="email" placeholder="Email">
				</div>
				<div class="col">
					<label for="telefone">Telefone</label>
		    		<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
				</div>	
			</div>
			<div class="form-group">
		    	<label for="responsavel">Nome do Responsável</label>
		    	<input type="text" class="form-control" id="responsavel" name="responsavel" placeholder="Nome do Responsável">	
			</div>	
			<div class="form-row">
				<div class="col">
					<label for="cpf">CPF</label>
		    		<input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
				</div>
				<div class="col">
					<label for="celular">Celular</label>
		    		<input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
				</div>	
			</div>	  
		  
		  <button type="submit" class="btn-cadastra btn btn-dark">Cadastrar</button>
		</form>
	</div>
</div>

<?php
include('footer.php');
?>