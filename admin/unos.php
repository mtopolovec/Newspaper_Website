<?php 

session_start();

if(!isset($_SESSION['$username'])) {
    header('Location: ..\login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Welt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <header class="row">
        <h1 class="col-sm-2">welt</h1>
        <div class ="col-sm-10"></div>
    </header>
    <nav class="row nav navbar-expand-md">
        <ul class="col-sm-10 navbar-nav">
            <li class="nav-item navigacija"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item navigacija"><a class="nav-link" href="kategorija.php?id=sport">Sport</a></li>
            <li class="nav-item navigacija"><a class="nav-link" href="kategorija.php?id=kultura">Kultura</a></li>
            <li class="nav-item navigacija"><a class="nav-link" href="unos.php">Unos</a></li>
            <li class="nav-item navigacija"><a class="nav-link" href="Administracija.php">Administracija</a></li>
            <?php 
            
                if(!isset($_SESSION['$username'])) {
                    echo '<li class="nav-item navigacija"><a class="nav-link" href="..\login.php">Login</a></li>';
                } else {
                    echo '<li class="nav-item navigacija"><a class="nav-link" href="..\logout.php">Logout</a></li>';
                }
            ?>
        </ul>
        <div class="col-sm-2"></div>
    </nav>
    <main class="row">
        <article class="col-sm-12">
            <form class="form-style-9" enctype="multipart/form-data" action="skripta.php" method="POST">
                <ul class="col-sm-12">
                    <li>
                        <span id="porukaTitle" class="bojaPoruke"></span>
                        <label class="field-full align-left" for="title">Naslov vijesti</label>
                        <input type="text" name="title" class="field-style field-full align-left" id="title"/>
                    </li>
                    <li>
                        <span id="porukaAbout" class="bojaPoruke"></span>
                        <label class="field-full align-left" for="about">Kratki sadržaj vijesti (do 50 znakova)</label>
                        <textarea name="about" class="field-style field-full align-left" id="about"></textarea>
                    </li>
                    <li>
                        <span id="porukaContent" class="bojaPoruke"></span>
                        <label class="field-full align-left" for="content">Sadržaj vjesti</label>
                        <textarea name="content" class="field-style field-full align-left" id="content"></textarea>
                    </li>  
                    <li>
                        <span id="porukaSlika" class="bojaPoruke"></span>
                        <label class="field-full align-left" for="photo">Slika: </label>
                        <input type="file" name="photo" accept="image/jpg,image/gif" id="photo"/>
                    </li>
                    <li>
                        <span id="porukaKategorija" class="bojaPoruke"></span>
                        <label class="field-full align-left" for="category">Kategorija vijesti </label>
                        <select name="category" class="field-style field-split align-left" id="category">
                            <option value="" disabled selected>Odabir kategorije</option>
                            <option value="sport">Sport</option>
                            <option value="kultura">Kultura</option>
                            <option value="zanimljivo">Zanimljivo</option>
                            <option value="novosti">Novosti</option>
                        </select>
                    </li>
                    <li>
                        <label class="field-full align-left">Spremiti u arhivu: 
                            <input type="checkbox" name="archive">
                        </label>
                    </li>
                    <li>
                        <button class="gumb" type="reset">Poništi</button>
                        <button id="slanje" class="gumb" type="submit">Prihvati</button>
                    </li>
                </ul>
            </form>
            <script type="text/javascript">
                //Provjera forme prije slanja
                document.getElementById("slanje").onclick = function(event) {
                    var slanjeForme = true;

                    // Naslov vijesti (5-30 znakova)
                    var poljeTitle = document.getElementById("title");
                    var title = document.getElementById("title").value;
                    if(title.length < 5 || title.length > 30 || title.length == 0) {
                        slanjeForme = false;
                        poljeTitle.style.border="1px dashed red";
                        document.getElementById("porukaTitle").innerHTML=("Naslov vijesti mora imati između 5 i 30 znakova!<br>");
                    } else {
                        poljeTitle.style.border = "1px solid green";
                        document.getElementById("porukaTitle").innerHTML="";
                    }
                    // Kratki sadrzaj (10-100 znakova)
                    var poljeAbout = document.getElementById("about");
                    var about = document.getElementById("about").value;
                    if(about.length < 10 || about.length > 100 || title.length == 0) {
                        slanjeForme = false;
                        poljeAbout.style.border="1px dashed red";
                        document.getElementById("porukaAbout").innerHTML=("Kratki sadržaj mora imati između 10 i 100 znakova!<br>");
                    } else {
                        poljeAbout.style.border = "1px solid green";
                        document.getElementById("porukaAbout").innerHTML="";
                    }
                    // Sadržaj mora biti unesen
                    var poljeContent = document.getElementById("content");
                    var content = document.getElementById("content").value;
                    if(content.length == 0) {
                        slanjeForme = false;
                        poljeContent.style.border="1px dashed red";
                        document.getElementById("porukaContent").innerHTML=("Sadržaj mora biti unesen!<br>");
                    } else {
                        poljeContent.style.border="1px solid green";
                        document.getElementById("porukaContent").innerHTML="";
                    }
                    // Slika mora biti unesena
                    var poljeSlika = document.getElementById("photo");
                    var photo = document.getElementById("photo").value;
                    if(photo.length == 0) {
                        slanjeForme = false;
                        poljeSlika.style.border="1px dashed red";
                        document.getElementById("porukaSlika").innerHTML=("Slika mora biti unesena!<br>");

                    } else {
                        poljeSlika.style.border="1px solid green";
                        document.getElementById("porukaSlika").innerHTML="";
                    }
                    // Kategorija mora biti odabrana
                    var poljeCategory = document.getElementById("category");
                    if(document.getElementById("category").selectedIndex == 0) {
                        slanjeForme = false;
                        poljeCategory.style.border="1px dashed red";
                        document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
                    } else {
                        poljeCategory.style.border="1px solid green";
                        document.getElementById("porukaKategorija").innerHTML="";
                    }
                    if(slanjeForme != true) {
                        event.preventDefault();
                    }
                }
            </script>
        </article>
    </main>
    <footer class="row">
        <h1 class="col-sm-12">welt</h1>
    </footer>
</body>
</html>