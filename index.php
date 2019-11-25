<!DOCTYPE html>
<html>
<header>
<style>
  a{
    color:black;
  }
</style>
</header>


<body>

<?php
require_once('funcoes.php');
ini_set('max_execution_time', 300);
$nomeErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["palavra"])) {
    $nomeErr = "valor requirido";
  } else {
    $nome = test_entrada($_POST["palavra"]);
  
    if (!preg_match("/^[a-zA-Z ]*$/",$nome)) {
      $nomeErr = "CARACTERES INVÁLIDOS";
    }
  }
}
$arq = file_get_contents('dicionario.txt');
$texto = "";
$texto = strtoupper($_POST['palavra']);
$entrada = explode(" ",$texto);

gerandoAnagramas($entrada);
//
?>


<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <input name="palavra" type="text" placeholder="Digite" />
  <span class="error">* <?php echo $nomeErr;?></span>
  <br><br>

  <input type="submit" value="GERAR ANAGRAMAS" />

</form>
<hr><br>
<a href="http://localhost/desafio/palavrasValidas.php"><h4>>> Palavras Validas Da Leitura Do Arquivo</h4></a>
<br>

<a href="http://localhost/desafio/combinandoPalavras.php"><h4>>> Gerador De Combinações Do Arquivo</h4></a>
<hr><br>

</body>
</html>