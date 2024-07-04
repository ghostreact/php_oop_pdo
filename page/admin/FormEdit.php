<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>EDit</title>
</head>

<?php
    if(isset($_GET['id'])){
        include __DIR__ . '/../../func/connect.php';

        $db = new ConnectDataBase();
        $conn = $db->getConnection();

        //sql command
        $sql = "SELECT * FROM tbl_member WHERE id=?";

        //Execute Command
        $submitExecute = $conn->prepare($sql);
        $submitExecute->execute([$_GET['id']]);
        $row = $submitExecute->fetch(PDO::FETCH_ASSOC);

        //IF QUERY ERROR
        if ($submitExecute->rowCount() < 1) {
            header('Location : index.php');
            exit();
        }
    }
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Edit Form</h4>
                <form action="action/EditForm.php" method="post">
                    <div class="mb-1">
                        <label for="name" class="col-sm-2 col-form-label">
                            Name :
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" required value="<?= $row['name']; ?>" >
                        </div>
                    </div>

                    <div class="mb-1">
                        <label for="name" class="col-sm-2 col-form-label"> Surname : </label>
                        <div class="col-sm-10">
                            <input type="text" name="surname" class="form-control" required value="<?= $row['surname']; ?>">
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?= $row['id'];?>">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>