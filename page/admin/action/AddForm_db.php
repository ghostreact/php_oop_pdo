<?php 
    include __DIR__ . '/../../../func/connect.php'; // ใช้พาธสัมพัทธ์เพื่ออ้างถึงไฟล์ connect.php

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        //รับค่าจากฟอร์ม

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        
        //create instance database
        $db = new ConnectDataBase();
        $conn = $db->getConnection();

        //sql command
        $sql = "INSERT INTO tbl_member(name,surname) VALUE (:name,:surname)";

        //รวบข้อมูลและ Execute 
        $submitExecute = $conn->prepare($sql);
        $submitExecute->bindParam(':name',$name);
        $submitExecute->bindParam(':surname',$surname);

        echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.1/dist/sweetalert2.all.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.1/dist/sweetalert2.min.css" rel="stylesheet">';

        if($submitExecute->execute()){
            echo   '<script>
            setTimeout(function(){
                Swal.fire({
                    title: "เพิ่มสำเร็จ",
                    icon: "success"
                }).then(function(){
                    window.location = "../FormAdd.php";
                })
            },1000)
           </script>';
        }
        $conn = null;
    }
?>

