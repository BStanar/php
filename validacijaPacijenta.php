<?php
$ime=$_REQUEST['ime'];
$prezime=$_REQUEST['prezime'];
$datum=$_REQUEST['datumRodjenja'];
$drzava=$_REQUEST['selektDrzava'];
$inficiran=$_REQUEST['inficiran'];
$godina=date("Y", strtotime($datum));

if($ime!="" && $prezime!="" && $datum!="" && $drzava!=0 && $inficiran!="")
{
    require "konekcija.php";
    $upit="INSERT INTO `patients` (`country_id`,`first_name`, `last_name`, `birth_year`, `infected`)
    VALUES ('".$drzava."', '".$ime."', '".$prezime."', '".$godina."', '".$inficiran."')";

    $rezultat=$con->query($upit);
    if($rezultat)
    {
        setcookie("success_notifikacija", "Pacijent uspješno dodat!!!", time() + (60*60*24), "/");
        header("Location: dodajPacijenta.php");
    }
}
else
{
    setcookie("error_notifikacija","Sva polja moraju biti popunjena!!! Pokušajte ponovo", time() + (60*60*24), "/");
    header("Location: dodajPacijenta.php");
}
?>