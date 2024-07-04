<?php

if (isset($_POST['id'])) {
     include __DIR__ . '/../../../func/connect.php';

     $db = new ConnectDataBase();
     $conn = $db->getConnection();

     $id = $_POST['id'];
     $name = $_POST['name'];
     $surname = $_POST['surname'];

     //sql command
     $sql = "UPDATE tbl_member SET name=:name,surname=:surname WHERE id=:id";

     //Execute
     $submitExecute = $conn->prepare($sql);
     $submitExecute->bindParam(':id', $id, PDO::PARAM_INT);
     $submitExecute->bindParam(':name', $name, PDO::PARAM_STR);
     $submitExecute->bindParam(':surname', $surname, PDO::PARAM_STR);
     $submitExecute->execute();

     echo '
          <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.1/dist/sweetalert2.all.min.js"></script>
          <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.1/dist/sweetalert2.min.css" rel="stylesheet">';

          if($submitExecute->rowCount() > 0){
               echo   '<script>
               setTimeout(function(){
                   Swal.fire({
                       title: "Edit Success",
                       icon: "success"
                   }).then(function(){
                       window.location = "../index.php";
                   })
                },1000)
              </script>';
          }
          else {
            echo   '<script>
                setTimeout(function(){
                   Swal.fire({
                       title: "Edit Error",
                       icon: "error"
                   }).then(function(){
                       window.location = "../index.php";
                   })
                },1000)
            </script>';
          }
          $conn = null;
}
?>
