<?php
ini_set('max_execution_time', 300);
// função para validar entrada de palavras 
function test_entrada($dados) {
    $dados = trim($dados);
    $dados = stripslashes($dados);
    $dados = htmlspecialchars($dados);
    return $dados;
}
// funçõa para gerar todas as combinações possiveis com uma palvara
function geradorCombinacoes(&$set, &$results) {
   for($i=0; $i<count($set); $i++) {
       $results[] = $set[$i];
       $tempset = $set;
       array_splice($tempset, $i, 1);
       $tempresults = array();
       geradorCombinacoes($tempset, $tempresults);
       foreach($tempresults as $res) {
           $results[] = $set[$i] . $res;
       }
   }
}
// função para validar combinações do mesmo tamanho que palavra chave
function validaCombinacoes(&$matriz, $tam){
   $matAux = $matriz; 
   $matriz = array(); 

   for($i=0; $i < count($matAux); $i++ ){
       $qnt = strlen ($matAux[$i]);
       if($qnt == $tam){
           array_push($matriz,$matAux[$i] );           
       }
   }
   
}
// função para validar palavras que existam no dicionario 
function validaAnagramas($arquivo, &$matriz){
    
    $matAux = $matriz; 
    $matriz = array(); 
    for($i=0; $i<count($matAux); $i++){
       //$var =  strripos($arquivo, $matAux[$i]);

       $t = "\n/\b".$matAux[$i]."\n\b/";
       if(preg_match($t, $arquivo)){
           array_push($matriz,$matAux[$i]); 
       }else{
       }
    }
}
// funcao para gerar anagramas com entrada do usuário
function gerandoAnagramas($entrada){
    $arq = file_get_contents('dicionario.txt');
    $resultCombinacoes = array();
    $resultado = array();
    echo "<pre>";
    for ($i=0; $i < count($entrada) ; $i++) { 
      error_reporting(0);
      $desfragArray = array();
      $desfragArray = str_split($entrada[$i]);
      $tam = count($desfragArray);
      geradorCombinacoes($desfragArray, $resultCombinacoes);
      validaCombinacoes($resultCombinacoes, $tam);
      validaAnagramas($arq, $resultCombinacoes);
      $resultado = $resultCombinacoes;
      //var_dump($resultCombinacoes);
    } 
    if (empty($resultado) == TRUE){
        echo 'Nenhum Anagrama Gerado <br>';
      }else {
        foreach($resultado as $x => $x_value) {
          echo "$x_value";
          echo "<br>";
        }
      }
      echo "</pre>";
}
// função para gerar todos os anagramas do arquivo de palavras e retornar 
function gerandoAnagramasPalavras(&$entrada){
    $resultCombinacoes = array();
    $resultado = array();
    echo "<pre>";
    for ($i=0; $i < count($entrada) ; $i++) { 
      error_reporting(0);
      $desfragArray = array();
      $desfragArray = str_split($entrada[$i]);
      $tam = count($desfragArray);
      geradorCombinacoes($desfragArray, $resultCombinacoes);
      validaCombinacoes($resultCombinacoes, $tam);
      $linResult = implode(" ", $resultCombinacoes);
      echo "<p>".print_r($linResult)."</p> <br>";
    } 
}
?>