<?php
//var_dump($propostas);
?>
<style>
.icone { width: 30px; height: 30px; }
.icone_modal { margin-right: 15px; }
h1 { text-align: center; padding-top: 30px; }
table { background-color: #FFFFF0; }
#btn-confirm{ border: none; background-color: transparent; }
.exportar { margin-left: 15px; }
.cadastro p a { margin-right: 10px; text-decoration: none; color: #000; }
.cadastro img { margin-right: 10px; }
</style>

<div class="conteudo">
	<h1>Propostas</h1>
	<div class="col-md-10 offset-md-1 cadastro">
		<p><a href="<?php echo base_url(); ?>index.php/proposta/cadastro"><img class="icone" src="<?php echo base_url(); ?>assets/images/novo.png">Cadastrar nova proposta</a></p>
	</div>
	
	<div class="table-responsive lista_propostas col-md-10 offset-md-1">
		<table class="table" id="tb_propostas">
		  <thead>
		    <tr>
		      <th scope="col">Cliente</th>
		      <th scope="col">Endereço</th>
		      <th scope="col">Valor Total R$</th>
		      <th scope="col">Qtde de Parcelas</th>
		      <th scope="col">Sinal R$</th>
		      <th scope="col">Início do Pagamento</th>
		      <th scope="col">Status</th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  	if(isset($propostas)){
		  	foreach ($propostas as $proposta) {
		  	?>
		    <tr>
		      <td><?php echo $proposta->nm_razao_social ?></td>
		      <td><?php echo $proposta->endereco_obra ?></td>
		      <td><?php echo $proposta->valor_total ?></td>
		      <td><?php echo $proposta->qtd_parcelas ?></td>
		      <td><?php echo $proposta->sinal ?></td>
		      <td><?php echo $proposta->dt_inicio_pag ?></td>
		      <td class="status" data-cod="<?php echo $proposta->cd_proposta ?>" data-status="<?php echo $proposta->status ?>"><?php if ($proposta->status==1)echo "Aberta"; else echo "Fechada"; ?></td>
		      <td><a href="<?php echo base_url(); ?>index.php/proposta/edicao/<?php echo $proposta->cd_proposta ?>"><img class="icone" src="<?php echo base_url(); ?>assets/images/editar.png"></a></td>
		      <td class="delete-item" for="<?php echo $proposta->cd_proposta ?>">
					<img class="icone" src="<?php echo base_url(); ?>assets/images/delete.png">
				</td>
		    </tr>
		    <?php
			}
			}
			?>
		  </tbody>
		</table>
	</div>
	<div class="exportar">
		<button type="button" class="btn btn-dark offset-md-1" id="btn_exportar">Exportar</button>
	</div>
	
</div>

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja excluir?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="modal-btn-si">Excluir</button>
        <button type="button" class="btn btn-primary" id="modal-btn-no">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="alert" role="alert" id="result"></div>

<?php
include('footer.php');
?>

<script>
var idDelete = 0;

$("#modal-btn-si").on("click", function(){
	$("#mi-modal").modal('hide');
	deleteItem(idDelete);
	
});

$("#modal-btn-no").on("click", function(){
	$("#mi-modal").modal('hide');
});

$(".delete-item").click(function(){
	modalConfirm($(this).attr('for'));
});

function modalConfirm(id) {
	$("#mi-modal").modal('show');

	idDelete = id;
}


function deleteItem(id) {
	$.ajax({
		method: "POST",
		dataType : "html",
		url: "proposta/delete/"+id,
		data: { 'codigo': id },
		success: function (msg){
			setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 0001);    
        }
	})
}

$('.status').click(function(){
	var cod = $(this).attr('data-cod');
	var status = $(this).attr('data-status');
	
	$.ajax({
		method: "POST",
		dataType : "html",
		url: "proposta/alterar_status/",
		data: { 'cod': cod, 'status': status },
		success: function (msg){
			setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 0001);    
        }
	})
});

$("#btn_exportar").click(function (e) {
    window.open('data:application/vnd.ms-excel,' + $('#tb_propostas').html());
    e.preventDefault();
});

</script>