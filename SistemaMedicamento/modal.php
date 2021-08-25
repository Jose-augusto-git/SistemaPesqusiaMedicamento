<?php
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
?>

