
<?php
require_once("conexao.php");

//CRIAR O USUSARIO ADMINISTRADOR CASO NÃO EXISTA
$query = $pdo->query("SELECT * from usuarios where nivel = 'Administrador'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);


//CRIAR O NÍVEL ADMINISTRADOR CASO ELE NÃO EXISTA
$query2 = $pdo->query("SELECT * from niveis where nivel = 'Administrador' ");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$total_reg2 = @count($res2);


if($total_reg == 0){
    $pdo->query("INSERT INTO usuarios SET nome = '$nome_admin', email ='$email_adm', 
        senha = '123', nivel = 'Administrador'");  
}

if($total_reg2 == 0){
    $pdo->query("INSERT INTO niveis SET nivel = 'Administrador'");  
  }


?>

<!DOCTYPE html>
<html>
<head>

<link href="img/logo.ico" rel="shortcut icon" type="image/x-icon">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
crossorigin="anonymous">
<link href="css/estilo-login.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous"></script>

<title><?php echo $nome_sistema ?></title>

</head>
<body class="bg-light">



<div class="container">
    <div class="row">
        <div class="">
            
            <div class="account-wall">
                <img class="profile-img" src="img/logo.png"
                    alt="">
                <form class="form-signin" method="post" action="autenticar.php">
                <input type="email" name="email" class="form-control mb-2" placeholder="Email" 
                required autofocus>
                <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                
                <div class="d-grid gap-2 mt-2">
                <button class="btn btn-primary" type="submit">
                    Entrar</button> 
                </div>               
                
                </form>
            </div>            
        </div>
    </div>
</div>


</body>
</html>