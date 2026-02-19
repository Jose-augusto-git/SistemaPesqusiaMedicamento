<?php require_once'validador_acesso.php'; ?>
<?php
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/telaPrincipal.css">
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


	<title> New Medic | Busca de principal </title>
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
		<h1 class="text-center text-dark"><img class="px-2"  style="width: 5rem;" src='imagem/livro.svg' alt='remedios'> Busca de Medicamentos Cadastrados</h1>
		<div class="separator"></div>
			<nav class=" navbar navbar-light bg-light">
			
			<div class="input-group px-3">
            <input class="form-control" id="subject" type="text" name="medicamentos" placeholder="Digite o medicamentos">
				<div class="input-group-append">
				<button name="SendPesqUser" type="submit" value="Pesquisar" class="btn btn-outline-secondary">Pesquisar</button>
					
				</div>
			
			</div>

			</nav>
			</form>
            <?php
                            
                            $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_DEFAULT);
                            if($SendPesqUser){
                                $medicamentos = filter_input(INPUT_POST, 'medicamentos', FILTER_DEFAULT);
                                $stmt = $conn->prepare("SELECT * FROM sistema WHERE medicamentos LIKE ?");
                                $stmt->execute(["%$medicamentos%"]);
                                
                                echo '<div class="table-responsive">';
                                echo '<table class="table table-hover table-light table-striped shadow-sm">';
                                echo '<thead class="table-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Medicamento</th>
                                            <th scope="col">Abreviação</th>
                                            <th scope="col">Latim</th>
                                            <th scope="col">Fonte</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                      </thead>';
                                echo '<tbody>';

                                while($row_usuario = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    echo '<tr>';
                                    echo '<td>' . $row_usuario['id'] . '</td>';
                                    echo '<td>' . $row_usuario['medicamentos'] . '</td>';
                                    echo '<td>' . $row_usuario['abreviacao'] . '</td>';
                                    echo '<td>' . $row_usuario['latim'] . '</td>';
                                    echo '<td>' . $row_usuario['fonte'] . '</td>';
                                    echo '<td>';
                                    echo '<div class="btn-group btn-group-sm" role="group">';
                                    echo "<a class='btn btn-success' title='Editar' href='editar.php?id=" . $row_usuario['id'] . "'><i class='fas fa-edit'></i></a>";
                                    echo '<button type="button" class="btn btn-danger" title="Apagar" data-bs-toggle="modal" data-bs-target="#modalExcluir' . $row_usuario['id'] . '"><i class="fas fa-trash"></i></button>';
                                    echo '</div>';

                                    /*<!-- Modal individual -->*/
                                    echo '<div class="modal fade text-dark" id="modalExcluir' . $row_usuario['id'] . '" tabindex="-1" aria-labelledby="label' . $row_usuario['id'] . '" aria-hidden="true">';
                                    echo  '<div class="modal-dialog">';
                                    echo '<div class="modal-content">';
                                    echo '<div class="modal-header">';
                                    echo '<h5 class="modal-title" id="label' . $row_usuario['id'] . '">Confirmar Exclusão</h5>';
                                    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                                    echo '</div>';
                                    echo '<div class="modal-body text-dark">';
                                    echo 'Tem certeza de que deseja excluir o medicamento <strong>' . $row_usuario['medicamentos'] . '</strong>?';
                                    echo '</div>';
                                    echo '<div class="modal-footer">';
                                    echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>';
                                    echo "<a class='btn btn-danger' href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a>";
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';

                                    echo '</td>';
                                    echo '</tr>';
                                }
                                echo '</tbody>';
                                echo '</table>';
                                echo '</div>';
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