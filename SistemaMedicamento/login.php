<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel='icon' href='imagem/entrar.svg'/>
    <link rel="stylesheet" href="css/telaPrincipal.css">
    <link rel="stylesheet" href="css/partials/centralizar.css">


    <title>Login</title>
</head>
<body>
<div class="container center">
                
<div class="row justify-content-between  pt-50 ">

<div class="row">
    <!--Inicio coluna da esquerda-->
    <div class="col-md col-6 coluna-esquerda pt-5 m-50 d-none d-sm-block d-sm-none d-md-block"><!--margin-right: 1rem; width: 20%;-->
       <!-- <p class="text-center mt-2"  id="p-login"> Olá, Seja Bem Vindo! </p> -->
        <img class="img-fluid pt-5" src='imagem/login.svg' alt='Agendamento'> 

    </div>
    <!--Fim coluna da esquerda-->

    <!--Inicio coluna da direita-->
    <div class="col-md coluna-direita col-12 col-md-8 p-5">
        <h2 class="text-center mt-5 p-2"  id="titulo" >Entrar no Sistema</h2>

        <form method="POST" action="acoes/login.php">
            <!-- E-MAIL -->
            <div class="form-group ">
            <label class=" m-3 texto-form  d-md-none d-lg-none d-xl-none">E-mail</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group m-2"><img class="d-none d-sm-block d-sm-none d-md-block" src='imagem/o-email.svg' alt='Agendamento' style='width:3rem;'></div>
                </div>
                
                <input class="p-lg-2 form-control" placeholder="Digite o Email" type="email" name="email" required>
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
                    <input class="p-lg-2 form-control" placeholder="Digite a senha" type="password" name="senha" required>
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