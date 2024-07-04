<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document Add</title>
</head>

<body>
<?php include '../../layouts/SideBar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <br>
                <h4>Form Add Data</h4>

                <form action="action/AddForm_db.php" method="post">
                    <div class="mb-1">
                        <label for="name" class="col-sm-2 col-form-label">
                            ชื่อ :
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" require minlength="3" placeholder="ชื่อ">
                        </div>
                    </div>

                    <div class="mb-1">
                        <label for="name" class="col-sm-2 col-form-label">
                            นามสกุล :
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="surname" class="form-control" require minlength="3" placeholder="นามสกุล">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>