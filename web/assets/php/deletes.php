<?php

function myFunction() {
                                       
   $conn = connect();
    $sql = "DELETE FROM CONTACTO WHERE ID_CONTACTO = 11";
   $stmt = $conn->prepare($sql);
  $stmt->execute();
  close($conn);

}

?>