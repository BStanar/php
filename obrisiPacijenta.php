<?php
if(isset($_REQUEST['id']))
{
    $pacijent_id=$_REQUEST['id'];
    require "konekcija.php";
    $upit="DELETE FROM `patients` WHERE id=".$pacijent_id;
    $rezultat=$con->query($upit);

    if($rezultat)
    {
        header("Location: index.php");
    }

}
?>