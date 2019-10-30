<style>
h1 { text-align: center; padding-top: 30px; }
.cadastro_proposta { background-color: #FFFFF0; padding-top: 15px; padding-bottom: 15px; -moz-border-radius:7px;-webkit-border-radius:7px; border-radius:7px; }
.btn-cadastra { margin-top: 15px; }
</style>

<div class="conteudo">
	<h1>Cadastro de Proposta</h1>
	<div class="cadastro_proposta col-md-8 offset-md-2">
		<?php if(isset($mensagens)) echo 
		'<div class="alert alert-danger" role="alert">
			  '.$mensagens.'
		</div>'?>
		<form enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>index.php/proposta/cadastrar">
			<div class="form-group">
		    	<label for="cliente">Cliente</label>
			    <select class="form-control" id="cliente" name="cliente">
			    	<?php
			    	foreach ($clientes as $cliente) {
		  			?>
			      	<option value="<?php echo $cliente->cd_cliente ?>"><?php echo $cliente->nm_razao_social ?></option>
			      	<?php } ?>
			    </select>		  
			</div>
			<div class="form-group">
		    	<label for="endereco_obra">Endereço da Obra</label>
		    	<input type="text" class="form-control" id="endereco_obra" name="endereco_obra" placeholder="Endereço da Obra">		  
			</div>
			<div class="form-row form-group">
				<div class="col">
					<label for="valor_total">Valor Total</label>
		    		<input type="text" class="form-control" id="valor_total" name="valor_total" placeholder="Valor Total">
				</div>
				<div class="col">
					<label for="sinal">Sinal</label>
		    		<input type="text" class="form-control" id="sinal" name="sinal" placeholder="Sinal">
				</div>	
			</div>	
			<div class="form-row form-group">
				<div class="col">
					<label for="qtde_parcelas">Qtde de Parcelas</label>
		    		<input type="text" class="form-control" id="qtde_parcelas" name="qtde_parcelas" placeholder="Qtde de Parcelas">
				</div>
				<div class="col">
					<label for="valor_parcelas">Valor das Parcelas</label>
		    		<input type="text" class="form-control" id="valor_parcelas" name="valor_parcelas" placeholder="Valor das Parcelas">
				</div>	
			</div>	 
			<div class="form-row form-group">
				<div class="col">
					<label for="dt_inicio_pag">Data de Início do Pagamento</label>
		    		<input type="date" class="form-control" id="dt_inicio_pag" name="dt_inicio_pag" placeholder="Data de Início do Pagamento">
				</div>
				<div class="col">
					<label for="dt_parcelas">Data das Parcelas</label>
		    		<input type="text" class="form-control" id="dt_parcelas" name="dt_parcelas" placeholder="Data das Parcelas">
				</div>	
			</div>
			<div class="form-row form-group">
				<div class="col">
					<label for="status">Status</label>
			    	<select class="form-control" id="status" name="status">
			      		<option value="1">Aberta</option>
			      		<option value="0">Fechada</option>
			    	</select>
				</div>
				<div class="col custom-file" style="margin-top: 32px;">
					<label class="custom-file-label" for="anexo">Anexar Arquivo (.doc ou .pdf)</label>
			    	<input type="file" class="custom-file-input" id="anexo" name="anexo">
				</div>	
			</div>	  
		  
		  <button type="submit" class="btn-cadastra btn btn-dark">Cadastrar</button>
		</form>
	</div>
</div>
