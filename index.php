<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="stil.css"/>
    <script src="skripta.js"></script>
</head>
<body>
    <div class="divIndex">
        <div class="divLogoDugme">
            <img class="logoIndex" src="logo.png" alt="logo"/>
            <input class="btnAddIndex" type="button" value="Add" onclick="PrebaciNaDodajPacijenta()"/>
        </div>
        <div class="divSelektiTabele">
            <div class="divSelekti">
                <?php require "selektDrzava.php"?>
                <div class="razmakIzmedjuSelekta"></div>
                <select class="selekti" name="selektStarosnaDob" id="selektStarosnaDob" onchange="PrilagodiTabeleSelektima(DohvatiSelektDrzavu().value, this.value)">
                    <option value="0">---Izaberite Starosnu Dob---</option>
                    <option value="1">Mladji od 25 godina</option>
                    <option value="2">Od 25 do 39 godina</option>
                    <option value="3">Od 40 do 60</option>
                    <option value="4">Stariji od 60</option>
                </select>
            </div>
            <div class="divTabele">
                <?php require "tabelaPacijenata.php"?>
                <?php require "ispisZarazenih.php"?>
            </div>
        </div>
    </div>

</body>
</html>

<?php
?>