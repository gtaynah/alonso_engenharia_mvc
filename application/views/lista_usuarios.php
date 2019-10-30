<style>
.icone { width: 30px; height: 30px; }
.icone_modal { margin-right: 15px; }
h1 { text-align: center; padding-top: 30px; }
table { background-color: #FFFFF0; }
#btn-confirm{ border: none; background-color: transparent; }
.cadastro p a { margin-right: 10px; text-decoration: none; color: #000; }
.cadastro img { margin-right: 10px; }
</style>

<div class="conteudo">
	<h1>Usuários</h1>
	<div class="col-md-8 offset-md-2 cadastro">
		<p><a href="<?php echo base_url(); ?>index.php/usuario/cadastro"><img class="icone" src="<?php echo base_url(); ?>assets/images/novo.png">Cadastrar novo usuário</a></p>
	</div>

	<div class="table-responsive lista_usuarios ">
		<table class="table col-md-8 offset-md-2">
		  <thead>
		    <tr>
		      <th scope="col">Nome</th>
		      <th scope="col">Email</th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  	if(isset($usuarios)){
		  	foreach ($usuarios as $usuario) {
		  	?>
		    <tr>
		      <td><?php echo $usuario->nm_usuario ?></td>
		      <td><?php echo $usuario->ds_email ?></td>
		      <td><a href="<?php echo base_url(); ?>index.php/usuario/edicao/<?php echo $usuario->cd_usuario ?>"><img class="icone" src="<?php echo base_url(); ?>assets/images/editar.png"></a></td>
		      <td class="delete-item" for="<?php echo $usuario->cd_usuario ?>">
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
		url: "usuario/delete/"+id,
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

</script>