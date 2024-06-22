<select class="selekti" name="selektDrzava" id="selektDrzava" onchange="PrilagodiTabeleSelektima(this.value, DohvatiSelektStarosnuDob().value)">
    <option value="0">---Izaberite državu---</option>
<?php
require "konekcija.php";
$upit="SELECT * FROM `countries`";
$rezultat=$con->query($upit);
if($rezultat->num_rows>0)
{
    while($row=mysqli_fetch_assoc($rezultat))
    {
        ?>
        <option value="<?=$row['id']?>"><?=$row['country_name']?></option>
    <?php
    }
}
?>
</select>