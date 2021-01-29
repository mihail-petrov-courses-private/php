<?php include '../../src/database/Database.php';                    ?>
<?php include '../../src/controllers/admin/CategoryController.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST">
            <input  type="text" name="category_title">
            <input  type="submit" name="category_submit">
            <input  type="hidden" name="category_tokken" value="1">
        </form>
        <div>
            <?php if(isset($message)) echo $message; ?>
        </div>
    </body>
</html>
