<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SZO - Dodaj pacijenta</title>
    <link rel="stylesheet" href="stil.css"/>
    <script src="skripta.js"></script>
</head>
<body>
    <div class="divDodajPacijenta">
        <?php require "notifikacija.php" ?>
        <img class="logoDodajPacijenta" src="logo.png" alt="logo"/>
        <form action="validacijaPacijenta.php" method="post">
            <table class="tabelaDodajPacijenta">
                <tr>
                    <td><label for="ime">First name</label></td>
                    <td><input class="tekstInputi" type="text" name="ime" id="ime"/></td>
                </tr>
                <tr>
                    <td><label for="prezime">Last name</label></td>
                    <td><input class="tekstInputi" type="text" name="prezime" id="prezime"/></td>
                </tr>
                <tr>
                    <td><label for="datumRodjenja">Birth date</label></td>
                    <td><input class="dejtInput" type="date" name="datumRodjenja" id="datumRodjenja"/></td>
                </tr>
                <tr>
                    <td><label for="selektDrzava">Country</label></td>
                    <td><?php require "selektDrzava.php"?></td>
                </tr>
                <tr>
                    <td><label for="inficiran">Infected</label></td>
                    <td>
                        <input type="radio" name="inficiran" value="1" id="btnRadioYes" onchange="ObojiBtnAdd()"/>
                        <label for="btnRadioYes">Yes</label>
                        <input type="radio" name="inficiran" value="0" id="btnRadioNo" onchange="ObojiBtnAdd()"/>
                        <label for="btnRadioNo">No</label>
                    </td>
                    <tr>
                    <td></td>
                    <td>
                        <input class="dugmici" type="submit" value="Add" id="btnAdd"/>
                        <input class="dugmici" type="button" value="Reset form" onclick="ResetujFormu()"/>
                    </td>
                    </tr>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>

<?php

?>