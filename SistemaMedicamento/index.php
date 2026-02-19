<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel='icon' href='imagem/entrar.svg'/>
    <link rel="stylesheet" href="css/telaPrincipal.css">
    <script src="js/bootstrap.bundle.min.js"></script>



    <title>Login</title>
   
</head>

<body>
    
    <div class="container">
        
        <div class="row justify-content-between  pt-50 ">

        <div class="row">
            <!--Inicio coluna da esquerda-->
            <div  class="col-md col-6 coluna-esquerda pt-5 m-50 d-none d-sm-block d-sm-none d-md-block"><!--margin-right: 1rem; width: 20%;-->
               <p class="text-center text-success mt-2"  id="p-login"> New<span class="text-danger">Medic</span> </p>
                <img class="img-fluid pt-5" src='imagem/login.svg' alt='Agendamento'> 
                

            </div>
            <!--Fim coluna da esquerda-->

            <!--Inicio coluna da direita-->
            <div class="col-md coluna-direita col-12 col-md-8 p-5">
                <h2 class="text-center mt-5"  id="titulo" >Entrar no Sistema</h2>

                <?php
                if (isset($_GET['login'])) {
                    if ($_GET['login'] == 'erro_dados') {
                        echo '<div class="alert alert-danger text-center">Usuário ou senha inválidos.</div>';
                    } elseif ($_GET['login'] == 'erro_conexao') {
                        echo '<div class="alert alert-warning text-center">Erro na conexão com o banco.</div>';
                    } elseif ($_GET['login'] == 'erro') {
                        echo '<div class="alert alert-info text-center">Você precisa estar logado.</div>';
                    }
                }
                ?>

                <form method="POST" action="acoes/login.php">

                    <!-- E-MAIL -->
                    <div class="form-group ">
                    <label class=" m-3 texto-form  d-md-none d-lg-none d-xl-none">E-mail</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group m-2"><img class="d-none d-sm-block d-sm-none d-md-block" src='imagem/o-email.svg' alt='Agendamento' style='width:3rem;'></div>
                        </div>
                        
                        <input class="p-lg-2 form-control" placeholder="Digite o Email" type="email" name="email" autocomplete="email" required>
                    </div>
                      </div>
                    <!-- --------------------------------------- -->
                    
                    <!-- SENHA -->
                    <div class="form-group">
                        <label class="m-3 form-group texto-form  d-md-none d-lg-none d-xl-none"> Senha </label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group m-2"><img class="d-none d-sm-block d-sm-none d-md-block" src='imagem/senha.svg' alt='Agendamento' style='width:3rem;'></div>
                            </div>
                            <input class="p-lg-2 form-control" placeholder="Digite a senha" type="password" name="senha" autocomplete="current-password" required>
                        </div>
                    </div>                    

                    <!-- --------------------------------------- -->
                    
                    <button type="submit" class="btn btn-second">Entrar</button>
                  </form>
            </div>
            <!--Fim coluna da direita-->

        </div>
        </div>
    </div>
</body>

</html>