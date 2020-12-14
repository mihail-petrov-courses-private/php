<?php include './src/application.php'; ?>
<?php include './src/templates/header.php'; ?>
                
<?php if(!is_user_loged_in()): ?>

<form id="form--welcome-user" method="POST">
    <input type="text" name="username" placeholder="Как се казваш. Машина">
    <input type="text" name="userage" placeholder="На колко си години ?">
    <input type="submit" value="Здрасти">
</form>

<?php endif; ?>

<?php include './src/templates/footer.php'; ?>