<?php

    require_once('controllers./Conexao.php');
    require_once('controllers./Crud.php');
    require_once('controllers./config.php');
    include_once 'inc/header.php';
    $Crud = new Crud(HOST, USER2, PASS2, BD);
    $mysqli = $Crud->conectar();
    if (isset($_POST["id"]) || isset($_post["mat"]) || isset($_post["freq"])){

        if(strlen($_POST["id"]) == 0){
            echo  "<script>alert('Preencha o E-mail!');</script>";
        
        }elseif(strlen($_POST["mat"]) == 0){
            echo  "<script>alert('Preencha a senha!');</script>";
        } 
        elseif(strlen($_POST["freq"]) == 0){
            echo  "<script>alert('Preencha a senha!');</script>";
        } else{
            $usuarioid=$_POST['id'];
            $materiaid=$_POST['mat'];
            $descricao=$_POST['freq'];
    
            //começa
            $dados=array("id_aluno"=>$usuarioid,"codigo_materia"=>$materiaid,"frequencia"=>$descricao);
            $sql_query = $Crud->upluno($dados,$usuarioid,$materiaid);
            // termina
        }
            
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>



<form action="" method="POST">
    <header style="margin-top: 60px;">
    
        <div class="row">
            <div class="col-sm-6">
                <h2>Lançamento de falta</h2>
            </div>

            <div class="col-sm-6 text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Salvar


                </button>
                <a href="painel_professor.php" class="btn btn-danger"> <i class="fas fa-times-circle"></i> Cancelar</a>
            </div>

        </div>
    </header>

    <hr>
    <div class="row">
<?php

$exe=$Crud->listexe($_GET['nome_aluno']);
$exe2=$Crud->listaAlunoecod($_GET['nome_materia'],$_GET['nome_aluno']);
$dados=$exe->fetch_object();
$dados2=$exe2->fetch_object();

?>

        <div class="form-group col-md-12">
            <label for="">ID Aluno</label>
            <input type="text" name="id" id="id" class="form-control" placeholder="ID Usuário" value="<?php echo $dados->id;?>">
        </div>

        <div class="form-group col-md-12">
            <label for="">Código materia</label>
            <input type="text" name="mat" id="mat" class="form-control" placeholder="materia" value="<?php echo $dados2->codigo_materia;?>">

        </div>


        <div class="form-group col-md-12">
            <label for="">Faltas</label>
            <input type="number" name="freq" id="freq" class="form-control" placeholder="Faltas">

        </div>





    </div>


</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="./assets/bootstrap/bootstrap.min.js"></script>
<div style="margin-top:60px">
<?php

include_once 'inc/footer.php';
?>
</div>