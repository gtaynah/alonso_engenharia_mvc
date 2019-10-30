<?php
//var_dump($cliente);
?>
<style>
h1 { text-align: center; padding-top: 30px; }
.edicao_cliente { background-color: #FFFFF0; padding-top: 15px; padding-bottom: 15px; -moz-border-radius:7px;-webkit-border-radius:7px; border-radius:7px; }
.btn-edita { margin-top: 15px; }
</style>

<div class="conteudo">
	<h1>Edição de Cliente</h1>
	<div class="edicao_cliente col-md-8 offset-md-2">
		<?php if(isset($mensagens)) echo 
		'<div class="alert alert-danger" role="alert">
			  '.$mensagens.'
		</div>'?>
		<form method="post" action="<?php echo base_url(); ?>index.php/cliente/editar/<?php echo $cliente[0]['cd_cliente'] ?>">
			<div class="form-group">
		    	<label for="razao_social">Razão Social</label>
		    	<input type="text" class="form-control" id="razao_social" name="razao_social" value="<?php echo $cliente[0]['nm_razao_social'] ?>">		  
			</div>
			<div class="form-group">
		    	<label for="nome_fantasia">Nome Fantasia</label>
		    	<input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" value="<?php echo $cliente[0]['nm_fantasia'] ?>">		
			</div>
			<div class="form-group">
		    	<label for="cnpj">CNPJ</label>
		    	<input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo $cliente[0]['cnpj'] ?>">		
			</div>
			<div class="form-group">
		    	<label for="endereco">Endereço</label>
		    	<input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $cliente[0]['endereco'] ?>">	
			</div>
			<div class="form-row">
				<div class="col">
					<label for="email">Email</label>
		    		<input type="text" class="form-control" id="email" name="email" value="<?php echo $cliente[0]['email'] ?>">
				</div>
				<div class="col">
					<label for="telefone">Telefone</label>
		    		<input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $cliente[0]['telefone'] ?>">
				</div>	
			</div>
			<div class="form-group">
		    	<label for="responsavel">Nome do Responsável</label>
		    	<input type="text" class="form-control" id="responsavel" name="responsavel" value="<?php echo $cliente[0]['nm_responsavel'] ?>">	
			</div>	
			<div class="form-row">
				<div class="col">
					<label for="cpf">CPF</label>
		    		<input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cliente[0]['cpf'] ?>">
				</div>
				<div class="col">
					<label for="celular">Celular</label>
		    		<input type="text" class="form-control" id="celular" name="celular" value="<?php echo $cliente[0]['celular'] ?>">
				</div>	
			</div>	  
		  
		  <button type="submit" class="btn-edita btn btn-dark">Editar</button>
		</form>
	</div>
</div>

<?php
include('footer.php');
?>