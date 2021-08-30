<?php
  session_start();
?>
<?php require_once'validador_acesso.php'; ?>
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
      <div class="media-body">
        <h4 class="m-0 text-success">New<span class="text-danger">Life</span></h4>
        <p class="font-weight-light text-muted mb-0">Sistema de Busca de Medicamentos</p>
      </div>
    </div>
  </div> 

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
        <a href="index.php" class="nav-link text-dark font-italic bg-light">
                  <i class=" mr-3 text-dark fa-fw fas fa-home"></i>
                  Home
              </a>
      </li>
  </ul>
  <br>
  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Cadastro</p>
  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
        <a href="cadastro.php" class="nav-link text-dark font-italic bg-light">
                  
                  <i class="mr-3 fas fa-notes-medical"></i>
                  Cadastrar Medicamentos
              </a>
      </li>
  </ul>
  <br>
  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Pesquisa</p>


  <ul class="nav flex-column bg-white mb-0">
    
    <li class="nav-item">
      <a href="pesquisar-medicamento.php" class="nav-link text-dark font-italic">
                <i class=" mr-3 text-dark fas fa-search"></i>
                Pesquisar Medicamentos
            </a>
    </li>
    <li class="nav-item">
        <a href="descricao.php" class="nav-link text-dark font-italic">
                  <i class=" mr-3 text-dark fas fa-search"></i>
                  Pesquisar Sintomas
              </a>
      </li>
    

  <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Lista</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="lista.php" class="nav-link text-dark font-italic">
                <i class=" mr-3 text-dark fas fa-pills"></i>
                Lista Medicamento
            </a>
    </li>
  </ul>
</div>