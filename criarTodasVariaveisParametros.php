<?php
function criarVariaveisParametros() {
  // Verifica se os parâmetros foram recebidos por GET
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Itera sobre todos os parâmetros recebidos por GET
    foreach ($_GET as $nomeParametro => $valorParametro) {
      // Cria uma variável com o mesmo nome do parâmetro e atribui o valor correspondente
      $$nomeParametro = $valorParametro;
    }
  }
  
  // Verifica se os parâmetros foram recebidos por POST
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Itera sobre todos os parâmetros recebidos por POST
    foreach ($_POST as $nomeParametro => $valorParametro) {
      // Cria uma variável com o mesmo nome do parâmetro e atribui o valor correspondente
      $$nomeParametro = $valorParametro;
    }
  }
}

// Exemplo de uso da rotina
criarVariaveisParametros();
?>
