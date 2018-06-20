<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Agenda</title>
    <link rel="stylesheet" href="CSS/estilo.css">
    <script language="javascript" src="JS/funcoes.js"></script>
  </head>
  <body>
    <div id="container">
      <header id="cabecalho">
        <h1>Agenda UTD</h1>
        <h2>Organize os seus contatos para não ficar perdido!</h2>
        <img id="image" src="IMG/icon.png" alt="Imagem de uma agenda" title="Agenda">
        <img id="logo" src="IMG/logoUTD.png" alt="Logomarca da UTD" title="Universidade do Trabalho Digital">
        <nav id="menu">
          <ul>
            <li onmouseover="mudaFoto('IMG/home.png')" onmouseout="mudaFoto('IMG/icon.png')"><a href="index.html">Home</a></li>
            <li onmouseover="mudaFoto('IMG/contato.png')" onmouseout="mudaFoto('IMG/icon.png')"><a href="cadastro.html">Cadastrar Contato</a></li>
            <li onmouseover="mudaFoto('IMG/pagina de contato.jpeg')" onmouseout="mudaFoto('IMG/icon.png')"><a href="listaContato.php">Contatos</a></li>
          </ul>
        </nav>
      </header>
      <?php
      //Dados para conexão com o banco de Dados
      $servidor = 'localhost';
      $usuario = 'root';
      $senha = '1406Ol1v31r4';
      $banco = 'agenda';
      // RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
      $nome	= $_POST ["tNome"];
      $apelido	= $_POST ["tUser"];
      $email	= $_POST ["tMail"];
      $telefone = $_POST ["tFone"];
      $sexo = $_POST["tSexo"];
      $dataNascimento = $_POST ["tDate"];
      $logradouro = $_POST["tRua"];
      $numero = $_POST["tNum"];
      $estado = $_POST["tEst"];
      $cidade = $_POST["tCid"];

      //executa a conexão com o MySQL
      $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
      if(!$conexao) {
        die ('Não foi possível conectar: '.mysqli_error());
      }
      //Seleciona o banco de dados que deseja utilizar
      $select = mysqli_select_db($conexao, $banco);
      if(!$select) {
        die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysqli_error());
      }

      $query1 = "INSERT INTO `contato`(`nome`, `apelido`, `email`,`telefone`, `sexo`, `dataNascimento`) VALUES ('$nome', '$apelido', '$email', '$telefone', '$sexo', '$dataNascimento')";
      $query2 = "INSERT INTO `endereco`(`logradouro`, `numero`, `estado`,`cidade`) VALUES ('$logradouro', '$numero', '$estado', '$cidade')";

      //Executa a expressão SQL no servidor, e armazena o resultado
        $result1 = mysqli_query($conexao, $query1);
        $result2 = mysqli_query($conexao, $query2);
        //Verifica o sucesso da operação
        if(!$result1 && $result2){
          die('Erro: '.mysqli_error());
        }else{
          echo "A Operação foi realizada com sucesso!";
        }
        echo "<br>";
        echo $sexo;

       ?>
       <br><a href="cadastro.html">Clique aqui para inserir um novo registro.</a>
       <footer id="rodape">
      <p>Developed 2018 - by Daniel Araújo <br> <a href="https://github.com/Pakato14/PROJETO_UTD" target="_blank">GitHub</a></p>
      </footer>
    </div>

  </body>
</html>
