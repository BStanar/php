<?php
if(isset($_COOKIE['error_notifikacija']))
{
    ?>
    <div class="errorNotice"><?=$_COOKIE['error_notifikacija']?></div>
    <?php
    setcookie("error_notifikacija", "", time()-10, "/", null);
}
?>

<?php
if(isset($_COOKIE['success_notifikacija']))
{
    ?>
    <div class="successNotice"><?=$_COOKIE['success_notifikacija']?></div>
    <?php
    setcookie("success_notifikacija", "", time()-10, "/", null);
}
?>