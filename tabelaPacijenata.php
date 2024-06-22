<table class="PatientTable" id="PatientTable">
    <tr>
        <th>First and last name</th>
        <th>Birth year</th>
        <th>Country</th>
        <th>Infected</th>
        <th></th>
    </tr>
    <?php
    if(isset($_REQUEST['country_id']))
        $drzava_id=$_REQUEST['drzava_id'];
    else
        $drzava_id=0;

    if(isset($_REQUEST['starosnaDob_id']))
        $starosnaDob_id=$_REQUEST['starosnaDob_id'];
    else
        $starosnaDob_id=0;

    if($drzava_id>0)
    {
        $upit="SELECT patients.*, countries.country_name FROM `patients`
        JOIN countries ON patients.country_id=countries.id
        WHERE patients.country_id='".$drzava_id."'";

        if($starosnaDob_id==1)
        {
            $upit.=" AND (2023 - patients.birth_year)<25";
        }
        else if($starosnaDob_id==2)
        {
            $upit.=" AND (2023 - patients.birth_year)>=25 AND (2023 - patients.birth_year)<=39";
        }
        else if($starosnaDob_id==3)
        {
            $upit.=" AND (2023 - patients.birth_year)>=40 AND (2023 - patients.birth_year)<=60";
        }
        else if($starosnaDob_id==4)
        {
            $upit.=" AND (2023 - patients.birth_year)>60";
        }

        $upit.=" ORDER BY patients.id DESC LIMIT 5";

    }
    else
    {
        $upit="SELECT patients.*, countries.country_name FROM `patients`
        JOIN countries ON patients.country_id=countries.id";

        if($starosnaDob_id==1)
        {
            $upit.=" WHERE (2023 - patients.birth_year)<25";
        }
        else if($starosnaDob_id==2)
        {
            $upit.=" WHERE (2023 - patients.birth_year)>=25 AND (2023 - patients.birth_year)<=39";
        }
        else if($starosnaDob_id==3)
        {
            $upit.=" WHERE (2023 - patients.birth_year)>=40 AND (2023 - patients.birth_year)<=60";
        }
        else if($starosnaDob_id==4)
        {
            $upit.=" WHERE (2023 - patients.birth_year)>60";
        }

        $upit.=" ORDER BY patients.id DESC LIMIT 5";
    }


    require "konekcija.php";
    $rezultat=$con->query($upit);
    if($rezultat->num_rows>0)
    {
        while($row=mysqli_fetch_assoc($rezultat))
        {
            ?>
            <tr>
                <td><?=$row['first_name']?> <?=$row['last_name']?></td>
                <td><?=$row['birth_year']?></td>
                <td><?=$row['country_name']?></td>

                <?php
                if($row['infected']==1)
                    $inficiran="Yes";
                else
                    $inficiran="No";
                ?>
                <td><?=$inficiran?></td>
                <td><a href="obrisiPacijenta.php?id=<?=$row['id']?>" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</a></td>
            </tr>
            <?php
        }
    }
    ?>
</table>