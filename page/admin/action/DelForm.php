<?php
    include __DIR__ . '/../../../func/connect.php';

if (isset($_GET['id'])) {
    //create instance db
    $db = new ConnectDataBase();
    $conn = $db->getConnection();

    $getid = $_GET['id'];

    //sql command
    $sql = "DELETE FROM tbl_member WHERE id=:id";

    //รวบข้อมูลและ Execute 
    $submitExecute =  $conn->prepare($sql);
    $submitExecute->bindParam(':id', $getid, PDO::PARAM_INT);
    $submitExecute->execute();

    //SWEET ALERT
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($submitExecute->rowCount() == 1) {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "ลบข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "../index.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    } else {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "../index.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null;
}
?>