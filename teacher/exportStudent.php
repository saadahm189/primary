<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Student</title>
</head>

<body>
    <?php include "teacherPartial/teacHeaderNavbar.php" ?>
    <center class="m-5">
        <form method="post" action="teacherPartial/export.php">
            <input type="submit" name="export" class="btn btn-success" value="Export" />
        </form>
    </center>


</body>

</html>
