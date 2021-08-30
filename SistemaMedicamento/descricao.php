<?php
include_once("conexao.php");
?>
<?php require_once'validador_acesso.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/telaPrincipal.css">
	<script src="js/bootstrap.min.js"></script>

	<!-- JavaScript Bundle with Popper -->

	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


	<title> New Life | Busca de principal </title>
	<link rel='icon' href='imagem/busca.svg'/>

</head>

<body id="busca">
	<!-- Vertical navbar -->
	<?php require_once 'navBar.php'; ?>
	<!-- End vertical navbar -->

	<script src="js/telaPrincipal.js"></script>
	<div class="page-content p-5" id="content">
		<header class="text-center page-header">
			<div class="header-content">

				<?php
				if (isset($_SESSION['msg'])) {
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				?>

		</header>
		<!-- Toggle button -->
		<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>
   
		<!-- Demo content -->
		<h2 class="display-4 text-white text-center">Sistema de Busca de Medicamentos</h2>
		<div class="separator"></div>
		<div class="row text-white ">
		<form class="pb-5" id="busca-cliente" method="POST" action="">
		<h1 class="text-center text-dark"><img class="px-2"  style="width: 5rem;" src='imagem/lista-medicamento.svg' alt='remedios'> Busca de Medicamentos Cadastrados</h1>
		<div class="separator"></div>
			<nav class=" navbar navbar-light bg-light">
			
			<div class="input-group px-3">
			<input class="form-control" id="subject" type="text" name="principal" placeholder="Digite o sintoma">
				<div class="input-group-append">
				<button name="SendPesqUser" type="submit" value="Pesquisar" class="btn btn-outline-secondary">Pesquisar</button>
					
				</div>
			
			</div>

			</nav>
			</form>
			

			<?php

			$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
			if ($SendPesqUser) {
				$principal = filter_input(INPUT_POST, 'principal', FILTER_SANITIZE_STRING);
				$result_usuario = "SELECT * FROM  sistema WHERE principal LIKE '%$principal%'";
				$resultado_usuario = mysqli_query($conn, $result_usuario);
				while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
					echo '<h1 class="d-none"> ID:<br>' . $row_usuario['id'] . "</h1>";

					echo '<div class="row text-white">';
					/*echo '<div class="col-lg-7">'; */
					echo '<h3 class="text-dark"> Medicamento<br></h3> <p class="lead">' . $row_usuario['medicamentos'] . "</p> <br><hr>";

					echo '<h3 class="text-dark"> Abreviação<br></h3> <p class="lead">' . $row_usuario['abreviacao'] . "</p> <br><hr>";

					echo '<h3 class="text-dark"> Latim<br></h3> <p class="lead">' . $row_usuario['latim'] . "</p><br><hr>";

					echo '<h3 class="text-dark"> Fonte</h3> <p class="lead">' . $row_usuario['fonte'] . '</p><br><hr>';

					echo '<h3 class="text-dark"> Principais</h3> <p class="lead">"' . $row_usuario['principal'] . '<br><hr>';

					/*<!-- End demo content -->*/
					echo '<div class="btn-group btn-group-lg" role="group" aria-label="...">';
					echo "<a class='nav-link text-light font-italic btn btn-success' href='editar.php?id=" . $row_usuario['id'] . "'>Editar Dados </a>";

					echo '<button type="button" class="nav-link text-light font-italic btn btn-danger" data-toggle="modal" data-target="#modalExemplo">
					Apagar Dados
				  </button>';

					/*<!-- Modal -->*/
					echo '<div class="modal fade text-dark" id="modalExemplo" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">';
					echo  '<div class="modal-dialog" role="document">';
					echo '<div class="modal-content">';
					echo '<div class="modal-header">';
					echo '<h5 class="modal-title" id="exampleModalLabel">Apagar Dados</h5>';
					echo '
						  </div>';
					echo '<div class="modal-body text-dark">
						 Tem certeza de que deseja excluir o item selecionado?
						  </div>';
					echo ' <div class="modal-footer">';
					echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>';
					echo "<a class=' nav-link text-light font-italic btn btn-danger' 
							href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "' ='Tem certeza de que deseja excluir o item selecionado?'> Apagar</a><br><hr>'";
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}
			}

			?>

		</div>
	</div>

	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	<!-- Botão para acionar modal -->

</body>

</html>