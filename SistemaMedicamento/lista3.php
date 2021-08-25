<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_br" style="
    background: white;">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#8257E5">

	<title> New Life | Lista de Medicamentos </title>
	<?php
	echo "<link rel='icon' href='imagem/arquivo-medico.svg'/>";
	?>

	<link rel="icon" href="/public/imagem/busca.svg" />
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/partials/header.css">
	<link rel="stylesheet" href="css/partials/forms.css">
	<link rel="stylesheet" href="css/partials/busca.css">
	<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<style>
		element.style {


			font-size: 2rem;
		}

		#busca article {
			background-color: var(--color-box-base);
			border: 1px solid var(--color-line-in-white);
			border-radius: .8rem;
			margin-top: 2.4rem;
			border-top: 1px solid black;
			border-right: 8px solid black;
			border-left: 1px solid black;
			border-bottom: .4rem solid black;
			border-spacing: 0px;
			margin-left: auto;
			margin-right: auto;
			box-shadow: 5px 5px rgba(0, 0, 0, .6);
			border-radius: .8rem;


		}

		.btn-danger {
			color: #fff;
			background-color: #009c37;
			border-color: #009c37;
			width: 40%;

			font-size: 12pt;
		}


		.btn-danger {
			background: #009c37;
			margin-right: 32rem;
		}

		.btn-danger:hover {
			background: #00d64b;
			color: white;
			border-color: #00d64b;
		}

		/*----------------Cancelar-------------------- */
		.btn-success {
			color: #fff;
			background-color: red;
			border-color: red;
			width: 40%;
			position: absolute;

			font-size: 12pt;
		}

		.btn-success {
			background: #ca1919;
			margin-right: 0;
		}

		.btn-success:hover {
			background: red;
			color: white;
			border-color: #fb3737;
		}
	</style>
</head>

<body id="busca" style='font-size: 2rem;'>

	<div id="container" style="background:white">
		<header class="page-header" style="background-color: #fb3737; box-shadow: 5px 5px  .6px">
			<div class="top-bar-container">
				<a href="index.php">
					<?php
					echo "<img src='imagem/voltar.svg' alt='voltar'>";
					?>
				</a>


			</div>
			<div class="header-content">
				<div id="imagem">
					<?php
					echo "<img src='imagem/manual-medico.svg' alt='lista'>";
					?>

				</div>
				<strong> Lista de medicamentos </strong>
				<!--strong vem com a fonte em negrito-->
				<p style='color:#171520; font-size:2.5rem ;'> Todos os medicamentos cadastrados estão disponiveis aqui</p>
				<?php
				if (isset($_SESSION['msg'])) {
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				?>
				


		</header>
		<main>
			<!-- <h1>{{title}}</h1> aqui faz o uso do objeto -->




			<article class="item-cliente" style='font-size: 2rem;'>
				<header>
					<!-- <img 
                            src="{{paciente.avatar}}" 
                            alt="{{paciente.name}}"> -->
					<div>
						<h1 style='margin: 1.2rem 0 1.2rem 0'> Dados dos Medicamentos</h1>
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
							echo '<h1> ID:<br></h1>' . $row_usuario['id'] . "<br><hr>";
							echo '<h1> Medicamento:<br></h1>' . $row_usuario['medicamentos'] . " <br><hr>";
							echo '<h1> Abreviação:<br></h1>' . $row_usuario['abreviacao'] . "<br><hr>";
							echo '<h1> Latim:<br></h1>' . $row_usuario['latim'] . "<br><hr>";

							echo "<h1> Fonte:</h1>" . $row_usuario['fonte'] . "<br><hr>";
							echo "<h1> Principais:</h1>" . $row_usuario['principal'] . "<br><hr>";


							echo "<a style='background: none;
                                    border: 0;
                                    
                                    text-decoration:none;
                                    color:   #009c37;
                                    font: 700 2rem Archivo;
                                    cursor: pointer;'
                                    href='editar.php?id=" . $row_usuario['id'] . "'>Editar Dados </a>";

							echo "<a
                                    style='background: none;
                                    border: 0;
                                    
                                    text-decoration:none;
                                    color:   red;
                                    font: 700 2rem Archivo;
                                    cursor: pointer;'
                                    
                                    href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'> | Apagar Dados</a><br><hr>";
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
						echo "<a href='lista.php?pagina=1'

					
					
					style='background: none;
					
						border: 0;                                    
						color: black;
						font: 700 2rem Archivo;
						cursor: pointer;
						text-decoration:none'
					
					
					> Inicio </a>";
						for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
							if ($pag_ant >= 1) {
								echo "<a href='lista.php?pagina=$pag_ant'
							
							style='background: none;
							margin: 2rem;
							border: 0;                                    
							color: black;
							font: 700 2rem Archivo;
							cursor: pointer;
							text-decoration:none'

							
							> $pag_ant </a>";
							}
						}
						
						for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
							if ($pag_dep <= $quantidade_pg) {
								echo "<a href='lista.php?pagina=$pag_dep'
							
							style='background: none;
							margin: 2rem;
							border: 0;                                    
							color: black;
							font: 700 2rem Archivo;
							cursor: pointer;
							text-decoration:none'
							
							
							
							> $pag_dep </a>";
							}
						}
						echo "<a href='lista.php?pagina=$quantidade_pg'
					
					style='background: none;
						margin: 2rem;
						border: 0;                                    
						color: black;
						font: 700 2rem Archivo;
						cursor: pointer;
						text-decoration:none'
					
					
					   
					> Ultima </a>";
						?>








						<!--  <span>{{paciente.subject}}</span>-->
					</div>
				</header>


				<!-- <footer>
			<p>Preço/hora<strong>R$ {{paciente.cost}}</strong>
			</p>
			<a href="https://api.whatsapp.com/send?1=pt_BR&phone=55{{paciente.whatsapp}}&text=Tenho interesse na sua aula de {{paciente.subject}} {{paciente.name}}"
			class="button" target="_blank">
				<img src="/images/icons/whatsapp.svg" alt="Whatsapp">Entrar em contato
			</a>
		</footer>-->
			</article>



		</main>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src="js/personalizado.js"></script>
</body>

</html>