<!DOCTYPE html>
<html>
<body>

<div id="d1"> 
  <h1> GERADOR DE COMBINAÇÕES (palavras.txt)</h1>
  <?php 
    require_once 'funcoes.php';
     $arq = file_get_contents('dicionario.txt');
    $palavrasValidas = explode("\n",file_get_contents('Palavras-Validadas.txt'));

    gerandoAnagramasPalavras($palavrasValidas);

  
  ?>
</body>
</html>