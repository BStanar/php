function PrebaciNaDodajPacijenta()
{
    window.location.href="dodajPacijenta.php";
}

function PrilagodiTabeleSelektima(drzava_id, starosnaDob_id)
{
    var xhr1=new XMLHttpRequest();
    xhr1.onreadystatechange=function()
    {
        if(this.readyState==4 && this.status==200)
        {
            var tabelaPacijenata=document.getElementById('tabelaPacijenata');
            tabelaPacijenata.innerHTML=xhr1.responseText;
        }
    }
    xhr1.open("post", "tabelaPacijenata.php");
    xhr1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr1.send("drzava_id=" + drzava_id + "&starosnaDob_id=" + starosnaDob_id);



    var xhr2=new XMLHttpRequest();
    xhr2.onreadystatechange=function()
    {
        if(this.readyState==4 && this.status==200)
        {
            var tabelaZarazenih=document.getElementById('tabelaZarazenih');
            tabelaZarazenih.innerHTML=xhr2.responseText;
        }
    }
    xhr2.open("post", "ispisZarazenih.php");
    xhr2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr2.send("drzava_id=" + drzava_id);
}

function DohvatiSelektDrzavu()
{
    return document.getElementById('selektDrzava');
}

function DohvatiSelektStarosnuDob()
{
    return document.getElementById('selektStarosnaDob');
}

function ResetujFormu()
{
    document.getElementById('ime').value="";
    document.getElementById('prezime').value="";
    document.getElementById('datumRodjenja').value="";
    document.getElementById('selektDrzava').value=0;

 //   document.getElementById('btnRadioYes').checked=false;
 //   document.getElementById('btnRadioNo').checked=false;
 //   document.getElementById('btnAdd').style.backgroundColor="darkgrey";
}

function ObojiBtnAdd()
{
    if(document.getElementById('btnRadioYes').checked)
        document.getElementById('btnAdd').style.backgroundColor="red";
    else
        document.getElementById('btnAdd').style.backgroundColor="darkgrey";
}

