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


	<title> NewLife | Lista</title>
	<link rel='icon' href='imagem/arquivo-medico.svg' />

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
		<div class="row text-white">
		<h1 class=" text-center text-dark bol"> <img class="px-2 "  style="width: 5rem;" src='imagem/manual-medico.svg' alt='lista'> Lista de Medicamentos Cadastrados</h1>
		<div class="separator"></div>
			<?php

			//recebe o numero da pagina

			$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
			$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

			//Setar a quantidade de itens por pagina
			$qnt_result_pg = 1;

			//calcular o inicio visualização
			$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
			$result_usuarios = "SELECT *FROM sistema LIMIT $inicio,$qnt_result_pg";
			$resultado_usuarios = mysqli_query($conn, $result_usuarios);
			while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {
				echo '<h1 class="d-none"> ID:<br>' . $row_usuario['id'] . "</h1>";

				echo '<div class="row text-white">';
				/*echo '<div class="col-lg-7">'; */
				echo '<h3 class="text-dark"> Medicamento<br></h3> <p class="lead">' . $row_usuario['medicamentos'] . "</p> <br><hr>";

				echo '<h3 class="text-dark"> Abreviação<br></h3> <p class="lead">' . $row_usuario['abreviacao'] . "</p> <br><hr>";

				echo '<h3 class="text-dark"> Latim<br></h3> <p class="lead">' . $row_usuario['latim'] . "</p><br><hr>";

				echo '<h3 class="text-dark"> Fonte</h3> <p class="lead">' . $row_usuario['fonte'] . '</p><br><hr>';

				echo '<h3 class="text-dark"> Principais</h3> <p class="lead">"' . $row_usuario['principal'] . '<br><hr>';

				/*<!-- End demo content -->*/
	 			require_once 'modal.php';
				
			}

			//Paginação - somar a quantidade de usuarios de

			$result_pg = "SELECT COUNT(id) AS num_result FROM sistema";
			$resultado_pg = mysqli_query($conn, $result_pg);
			$row_pg = mysqli_fetch_assoc($resultado_pg);
			//echo $row_pg['num_result'];

			//quantidade de paginas
			$quantidade_pg =  ceil($row_pg['num_result'] / $qnt_result_pg);

			//limitar os link antes e depois
			$max_links = 4;

			echo '<nav class="p-5">';
			echo '<ul class="pagination justify-content-center pagination-lg">';
			echo " 
					<li class='page-item'><a class='page-link' href='lista.php?pagina=1'> Inicio </a> </li>";

			for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
				if ($pag_ant >= 1) {
					echo "
							<li class='page-item'><a class='page-link' href='lista.php?pagina=$pag_ant'> $pag_ant </a> </li>";
				}
			}

			echo " <h1 class='d-none'> " . $pagina . "</h1>";
			for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
				if ($pag_dep <= $quantidade_pg) {
					echo "
							<li class='page-item'><a class='page-link' href='lista.php?pagina=$pag_dep'> $pag_dep </a></li>";
				}
			}

			echo "
					<li class='page-item'><a class='page-link' href='lista.php?pagina=$quantidade_pg'> Ultima </a> </li>";


			echo '</ul>';
			echo '</nav>';
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