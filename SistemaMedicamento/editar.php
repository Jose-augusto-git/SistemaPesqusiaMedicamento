<?php

include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$stmt = $conn->prepare("SELECT * FROM sistema WHERE id = ?");
$stmt->execute([$id]);
$row_usuario = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<?php require_once'validador_acesso.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/telaPrincipal.css">


  <!-- JavaScript Bundle with Popper -->

  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


  <title> NewMedic | Cadastro</title>
  <link rel="icon" href="imagem/prescricao-medica.svg" />
</head>

<body id="data-bs-no-jquery">
  <!-- Vertical navbar -->
  <?php require_once 'navBar.php'; ?>
  <!-- End vertical navbar -->

  <script src="js/telaPrincipal.js"></script>
  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>

    <!-- Demo content -->
    <h2 class="display-4 text-white">Sistema de Busca de Medicamentos</h2>
    <br>
    <div>
      <header class="page-header">
        <div class="header-content">

          <?php
          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
          ?>

      </header>
      
      <!-- Formulario -->
      <form class="form" action="proc_edit_usuario.php" method="POST"id="create-class" >
      <legend class="text-center text-success"> Editar Medicamentos <i class="fas fa-edit"></i></legend>
        <br>

        <input type="hidden" name="id"value="<?php echo $row_usuario['id'];?>" required>   

        <div class="form-group">
        <label class="text-center" for="medicamentos"> Medicamento </label>
          <input type="text" class="form-control" name="medicamentos" id="medicamentos" 
          value="<?php echo $row_usuario['medicamentos']; ?>" required>    
        </div>

        <div class="form-group">
        <label class="text-center" for="abreviacao"> Abreviação </label>
          <input type="text" class="form-control" name="abreviacao" id="abreviacao" 
          value="<?php echo $row_usuario['abreviacao'];?>" required>  
        </div>

        <div class="form-group">
        <label class="text-center" for="latim"> Latim </label>
          <input type="text" class="form-control" name="latim" id="latim" 
          value="<?php echo $row_usuario['latim'];?>" required>  
        </div>

        <div class="form-group">
        <label class="text-center" for="fonte"> Fonte </label>
          <input  type="text" class="form-control" name="fonte" 
            value="<?php echo $row_usuario['fonte'];?>"required>
        </div>

        <div class="form-group">
        <label class="text-center" for="principal"> Principais </label>
          <textarea  class="form-control" id="principal" name="principal" required ><?php echo $row_usuario['principal'];?></textarea>
        </div>



      
          <br>
                <p class="text-center">
                    <img src='imagem/atencao.svg' alt='Aviso importante' width='50em'>    

                   <strong class="text-danger"> Importante! </strong>
                    Preencha todos os dados
                </p>
                
                <br>
                <div class="d-grid gap-2 col-6 mx-auto">

        <button type="submit" form="create-class" value="Editar" class="btn btn-success btn-lg">Salvar Edição</button>
        <!-- form="create-class" envia o formulario sem precisar estar dento da tag form-->
                </div>
      </form>
      <!-- Fim Formulario -->
    </div>
    <!-- End demo content -->

</body>

</html>