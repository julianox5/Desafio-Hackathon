<!DOCTYPE html>
<html>
<body>

<div id="d1"> 
  <h1> PALAVRAS VÁLIDAS DO ARQUIVO (palavras.txt)</h1>
  <?php 
    require_once 'funcoes.php';
    $palavrasValidas = explode("\n",file_get_contents('Palavras-Validadas.txt'));

    foreach($palavrasValidas as $x => $x_value) {
        echo "$x_value";
        echo "<br>";
      }
  ?>
</body>
</html>
