<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<?php include '../../layouts/SideBar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>รายชื่อทั้งหมด <a href="FormAdd.php" class="btn btn-info">+ เพิ่มข้อมูล</a></a></h3>
                <table class="table table-striped table-hover table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">ลำดับ</th>
                            <th width="40%">ชื่อ</th>
                            <th width="45%">นามสกุล</th>
                            <th width="5%">แก้ไข</th>
                            <th width="5%">ลบ</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            include __DIR__ . '/../../func/connect.php'; // ใช้พาธสัมพัทธ์เพื่ออ้างถึงไฟล์ connect.php

                            $db = new ConnectDataBase();
                            $conn = $db->getConnection();

                            //sql command
                            $sql = "SELECT * fROM tbl_member";

                            //Execute
                            $submitExecute = $conn->prepare($sql);
                            $submitExecute->execute();
                            $result = $submitExecute->fetchAll();

                            foreach($result as $totalresult){
                        ?>
                            <tr>
                                <td><?=$totalresult['id'];?></td>
                                <td><?=$totalresult['name'];?></td>
                                <td><?=$totalresult['surname'];?></td>
                                <td><a href="FormEdit.php?id=<?=$totalresult['id'];?>" class="btn btn-warning btn-sm">Edit</a></td>
                                <td><a href="action/DelForm.php?id=<?=$totalresult['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You sure delete this data !!');">Del</a></td>
                            </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>