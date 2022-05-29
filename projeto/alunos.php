<?php
    include_once 'inc/header.php';
    require_once('controllers./Conexao.php');
    require_once('controllers./Crud.php');
    require_once('controllers./config.php');
    include_once 'inc/header.php';
    $Crud = new Crud(HOST, USER2, PASS2, BD);
    $mysqli = $Crud->conectar();

 

?>



<link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">

<header style="margin-top: 60px">
    <div class="row">

        <div class="col-sm-6">
            <h2>Alunos</h2>
        </div>

        



        <div class="col-sm-5 text-right h2">

            <a class="btn btn-primary "href="">
            <i class="fas fa-refresh"></i> Atualizar
            </a>
        </div>  

    </div>
    <hr>
</header>




<table class="table table-hover">

    <thead>
        <tr>
            <th>ID</th>
            <th>Aluno</th>
            <th>Faltas</th>
            <th class="text-center">Opções</th>
        </tr>
    </thead>
    <tbody>
<?php

$exe=$Crud->listaAluno($_GET['nome']);
if($exe->num_rows>0){
    while($dados=$exe->fetch_object()){



?>
        <tr>
        <td>
            <?php echo $dados->id_aluno;?>
        </td>
        <td>
            <?php echo $dados->nome;?>         
        </td>
        <td>
            <?php echo $dados->frequencia;?>        
        </td>
                  

            <td class="text-center">

                <a class="btn btn-sm btn-warning" href="gerenciamento.php?nome_aluno=<?php echo $dados->nome;?>&nome_materia=<?php echo $_GET['nome'];?>">
                <i class="fas fa-edit"></i> Editar
                </a>


            </td>            
        </tr>
        
    </tbody>


<?php
    }
}
?>
</table>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="./assets/bootstrap.min.js"></script>

<?php

include_once 'inc/footer.php';

?>