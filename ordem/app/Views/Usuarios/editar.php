<?php echo $this->extend('Layout/principal'); ?>


<?php echo $this->section('titulo') ?>  <?php echo $titulo; ?> <?php echo $this->endSection() ?>


<?php echo $this->section('estilos') ?>  

<!-- Aqui coloco os estilos da view-->

<?php echo $this->endSection() ?>



<?php echo $this->section('conteudo') ?>  

<!-- Aqui coloco o conteudo da view-->

<div class="row">

	<div class="col-lg-6">  

		<div class="block">
			<!-- Exibirá os retornos do backend -->
			<div id="response">

			 

			</div>

			<?php echo form_open('/', ['id' => 'form'], ['id' => "$usuario->id"]) ?>


			<?php echo $this->include('Usuarios/_form'); ?>
		
	<div class="block-body">

	<div class="form-group mt-5 mb-2">

	<input id= "btn-salvar" type="submit" value="Salvar" class="btn btn-danger btn-sm mr-2">
	<a href="<?php echo site_url("usuarios/exibir/$usuario->id") ?>" class="btn btn-secondary btn-sm ml-2">Voltar</a>

	</div>

	<?php echo form_close(); ?>
	</div>
	</div> <!-- ./ block -->

	</div>
</div>

<h1>Estendendo o layout principal atraves da view index de Home</h1

<?php echo $this->endSection() ?>




<?php echo $this->section('scripts') ?>  

<script>

$(document).ready(function(){ 

	$("#form").on('submit', function(e){

		e.preventDefault();

		$.ajax({

			type: 'POST',
			url: '<?php echo site_url('usuarios/atualizar'); ?>',
			data: new FormData(this),
			dataType: 'Json',
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function(){

				$("#response").html('');
				$("#btn-salvar").val('Por favor aguarde...');
			},
			sucess: function(response){

				$("#btn-salvar").val('Salvar');
				$("#btn-salvar").removeAttr('disabled');

				if(!response.erro){

					$('[name=csrf_ordem]').val(response.token);

					
					if(response.info){

				$("#response").html('<div class="alert alert-info">' + response.info +'</div>');

					}


				}else{
					// Existem erros de validação


				}

			},
			error: function(){
				
				alert('Nao foi possivel processar a solicitacão. Por favor entre em contato com o suporte tecnico.');
				$("#btn-salvar").val('Salvar');
				$("#btn-salvar").removeAttr('disabled');
			}

		});

	});



});


</script>

<?php echo $this->endSection() ?>
