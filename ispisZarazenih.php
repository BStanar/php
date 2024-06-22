<?php
if(isset($_REQUEST['drzava_id']))
    $drzava_id=$_REQUEST['drzava_id'];
else
    $drzava_id=0;

if($drzava_id>0)
{
    $upitBrZar="SELECT COUNT(*) FROM `patients`
    WHERE country_id='".$drzava_id."' AND infected=1";

    $upitBrNeZar="SELECT COUNT(*) FROM `patients`
    WHERE country_id='".$drzava_id."' AND infected=0";

    $upit="SELECT country_name FROM `countries`
    WHERE id='".$drzava_id."'";
}
else
{
    $upitBrZar="SELECT COUNT(*) FROM `patients` WHERE infected=1";

    $upitBrNeZar="SELECT COUNT(*) FROM `patients` WHERE  infected=0";
}

require "konekcija.php";
$rezultatBrZar=$con->query($upitBrZar);
$rezultatBrNeZar=$con->query($upitBrNeZar);

$rowBrZar=mysqli_fetch_assoc($rezultatBrZar);
$rowBrNeZar=mysqli_fetch_assoc($rezultatBrNeZar);

$BrZar=$rowBrZar['COUNT(*)'];
$BrNeZar=$rowBrNeZar['COUNT(*)'];

if($drzava_id>0)
{
    $rezultat=$con->query($upit);
    $row=mysqli_fetch_assoc($rezultat);
    ?>
    <table class="tabelaZarazenih" id="tabelaZarazenih">
        <tr>
            <td>All infected in <?=$row['country_name']?>:</td>
            <td><?=$BrZar?></td>
        </tr>
        <tr>
            <td>All uninfected in <?=$row['country_name']?>:</td>
            <td><?=$BrNeZar?></td>
        </tr>
        <tr>
            <td>All tested in <?=$row['country_name']?>:</td>
            <td><?=$BrZar + $BrNeZar?></td>
        </tr>
    </table>
<?php
}
else
{
    ?>
    <table class="tabelaZarazenih" id="tabelaZarazenih">
        <tr>
            <td>All infected:</td>
            <td><?=$BrZar?></td>
        </tr>
        <tr>
            <td>All uninfected:</td>
            <td><?=$BrNeZar?></td>
        </tr>
        <tr>
            <td>All tested:</td>
            <td><?=$BrZar + $BrNeZar?></td>
        </tr>
    </table>
    <?php
}
?>