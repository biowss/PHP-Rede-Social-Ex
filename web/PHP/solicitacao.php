<?php
session_start();

// N"ao está logado?
if ($_SESSION["logado"] != "ok") {

  // Volta para o login
  header("Location: index.php");

}
error_reporting(1);

include_once "connect_db.php";

$friend = $_GET["user"];
if ($friend == NULL) {
  echo "O USER nao foi passado <br>";
}

$sqle = "SELECT id AS id_amigo
        FROM user_info
        WHERE user = '$friend'";

      $return = $conexao->query($sqle);

      if ($registry = $return->fetch_array()){
        $id_amigo = $registry["id_amigo"];
        $id_usuario = $_SESSION["id_usuario"];


        $sql = "INSERT INTO friendship (user_id, friend_id, confirm)
                VALUES ('$id_usuario', '$id_amigo', 0)";
         $retorno = $conexao->query($sql);

         if ($retorno == true) {

              echo "<script>
                   alert('Solicitacao enviada!');
                   location.href='feed.php?user=$friend';
                  </script>";

           } else {

               echo "<script>
                     alert('Erro ao Solicitar!');
                     </script>";

    // Exibe do erro que o banco retorna
           echo $conexao->error;

  }
      }

?>
