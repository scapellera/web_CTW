<?php

include_once "conexion.php";

function verificar_login($user,$password,&$result) {
    $sql = "SELECT * FROM USUARIO WHERE user = '$user' and password = '$password'";
    $rec = mysql_query($sql);
    $count = 0;

    while($row = mysql_fetch_object($rec))
    {
        $count++;
        $result = $row;
    }

    if($count == 1)
    {
        return 1;
    }

    else
    {
        return 0;
    }
}

if(!isset($_SESSION['userid']))
{
    if(isset($_POST['login']))
    {
        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)
        {
            /*$_SESSION['userid'] = $result->ID_USUARIO;*/
            $_SESSION["login_done"] = true;
            header("location:./web/index.php");

        }
        else
        {
            echo '<div class="error">Usuario o contraseña incorrectos</div>';
        }
    }
?>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./assets/css/login.css">
<script src="./assets/js/login.js"></script>


<div class="login-page">
  <div class="form">
    <form class="login-form" action="" method="post">
      <input type="text" name="user" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <button name="login" type="submit" value="login">login</button>
    </form>
  </div>
</div>
<!--
<style type="text/css">
*{
	font-size: 14px;
}
form.login {
    background: none repeat scroll 0 0 #F1F1F1;
    border: 1px solid #DDDDDD;
    font-family: sans-serif;
    margin: 0 auto;
    padding: 20px;
    width: 278px;
}
form.login div {
    margin-bottom: 15px;
    overflow: hidden;
}
form.login div label {
    display: block;
    float: left;
    line-height: 25px;
}
form.login div input[type="text"], form.login div input[type="password"] {
    border: 1px solid #DCDCDC;
    float: right;
    padding: 4px;
}
form.login div input[type="submit"] {
    background: none repeat scroll 0 0 #DEDEDE;
    border: 1px solid #C6C6C6;
    float: right;
    font-weight: bold;
    padding: 4px 20px;
}
.error{
    color: red;
    font-weight: bold;
    margin: 10px;
    text-align: center;
}
</style>

<form action="" method="post" class="login">
	<div><label>Username</label><input name="user" type="text" ></div>
	<div><label>Password</label><input name="password" type="password"></div>
	<div><input name="login" type="submit" value="login"></div>
</form>
-->
<?php
} else {
	echo 'Su usuario ingreso correctamente.';
	echo '<a href="logout.php">Logout</a>';
}
?>