<?php
    session_start();
    include 'connect.php';

    $user = $_POST['user'];
    $lozinka = $_POST['lozinka'];

    $query = "SELECT ime,prezime,username,lozinka,razina FROM korisnik WHERE username=?";
    $stmt=mysqli_stmt_init($dbc);
    if(mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt,'s',$user);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    mysqli_stmt_bind_result($stmt,$ime,$prezime,$us,$loz,$raz);
    mysqli_stmt_fetch($stmt);

    if(password_verify($_POST['lozinka'],$loz) && mysqli_stmt_num_rows($stmt) > 0) {
        $uspjesnaPrijava= true;
        if($raz == 1) {
            $admin = true;
        } else {
            $admin = false;
        }
        $_SESSION['$username'] = $us;
        $_SESSION['$ime'] = $ime;
        $_SESSION['$prezime'] = $prezime;
        $_SESSION['$level'] = $raz;
        if($admin== true) {
            // forma za administraciju
            //header('Location: admin\index.php'); Puno preglednije i jednostavnije preko ovoga ali onda nema poruke!

                // kategorije
                $sport = "Sport";
                $kultura = "Kultura";
                $zanimljivo = "Zanimljivo";
                $novosti = "Novosti";
            ?>
            <?php echo'
            <!DOCTYPE html>
            <html>
            <head>
              <title>Welt</title>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
              <link rel="stylesheet" href="style.css">
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            </head>
            <body>
                <header class="row">
                    <h1 class="col-sm-2">welt</h1>
                    <div class ="col-sm-10"></div>
                </header>
                <nav class="row nav navbar-expand-md">
                    <ul class="col-sm-10 navbar-nav">
                        <li class="nav-item navigacija"><a class="nav-link" href="admin/index.php">Home</a></li>
                        <li class="nav-item navigacija"><a class="nav-link" href="admin/kategorija.php?id=sport">Sport</a></li>
                        <li class="nav-item navigacija"><a class="nav-link" href="admin/kategorija.php?id=kultura">Kultura</a></li>
                        <li class="nav-item navigacija"><a class="nav-link" href="admin/unos.php">Unos</a></li>
                        <li class="nav-item navigacija"><a class="nav-link" href="admin/Administracija.php">Administracija</a></li>'; ?>
                        <?php 
                        
                            if(!isset($_SESSION['$username'])) {
                                echo '<li class="nav-item navigacija"><a class="nav-link" href="login.php">Login</a></li>';
                            } else {
                                echo '<li class="nav-item navigacija"><a class="nav-link" href="logout.php">Logout</a></li>';
                            }
                            
                        ?>
                    <?php echo'
                    </ul>
                    <div class="col-sm-2"></div>
                </nav>';
                echo "<p class='prijava'>Uspješan login</p>";
                echo "<p class='prijava'>Dobrodošao ".$ime." ".$prezime."!</p>";
                echo "<p class='prijava'>Imate pravo pristupa na Administratorskoj stranici!</p>";
                echo'
                <main class="row">
                    <header>
                        <h1>';?><?php echo $sport; ?><?php echo"</h1>
                    </header>
                    <article>
                        <section class='row'>";?>
                            <?php
                                $Sport_query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='sport' LIMIT 3";
                                $Sport_result = mysqli_query($dbc, $Sport_query) or die('Neuspiješno čitanje članka sporta iz baze!');
                                while($Sport_row=mysqli_fetch_array($Sport_result)) {
                                    echo "
                                    <aside class='col-sm-4'>
                                        <a href ='admin/clanak.php?id=".$Sport_row['id']."' id='homepageClanak'>
                                            <picture>
                                                <img src='images/".$Sport_row['slika']."' class='slika' alt='slika'>
                                            </picture>
                                            <h3>".$Sport_row['naslov']."</h3>
                                            <p>".$Sport_row['sazetak']."</p>
                                            <p class='datum'>".$Sport_row['datum']."</p>
                                            <hr />
                                        </a>
                                    </aside>";
                                }
                                mysqli_close($dbc);
                            ?>
                            <?php echo'
                         </section>
                    </article>
                    <header>
                        <h1><?php echo $kultura; ?></h1>
                    </header>
                    <article>
                        <section class="row">';?>
                            <?php
                                $dbc = mysqli_connect($servername,$username,$password,$basename) or 
                                die('Error connecting to MYSQL server.'.mysqli_connect_error());
                                mysqli_set_charset($dbc, "utf8");
                                $Kultura_query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='kultura' LIMIT 3";
                                $Kultura_result = mysqli_query($dbc, $Kultura_query) or die('Neuspiješno čitanje članka kulture iz baze!');
                                while($Kultura_row=mysqli_fetch_array($Kultura_result)) {
                                    echo "
                                    <aside class='col-sm-4'>
                                        <a href ='admin/clanak.php?id=".$Kultura_row['id']."' id='homepageClanak'>
                                            <picture>
                                                <img src='images/".$Kultura_row['slika']."' class='slika' alt='slika'>
                                            </picture>
                                            <h3>".$Kultura_row['naslov']."</h3>
                                            <p>".$Kultura_row['sazetak']."</p>
                                            <p class='datum'>".$Kultura_row['datum']."</p>
                                            <hr />
                                        </a>
                                    </aside>";
                                }
                                mysqli_close($dbc);
                            ?>
                        <?php echo'</section>
                    </article>
                </main>
                <footer class="row">
                    <h1 class="col-sm-12">welt</h1>
                </footer>
            </body>
            </html>';
        } else {
            //header('Location: index.php');
            $sport = "Sport";
            $kultura = "Kultura";
            $zanimljivo = "Zanimljivo";
            $novosti = "Novosti";
        ?>
        <?php echo'
        <!DOCTYPE html>
        <html>
        <head>
        <title>Welt</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
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
                    <li class="nav-item navigacija"><a class="nav-link" href="kategorija.php?id=kultura">Kultura</a></li>';?>
                    <?php 
                    
                        if(!isset($_SESSION['$username'])) {
                            echo '<li class="nav-item navigacija"><a class="nav-link" href="login.php">Login</a></li>';
                        } else {
                            echo '<li class="nav-item navigacija"><a class="nav-link" href="logout.php">Logout</a></li>';
                        }
                        
                    ?>
                <?php echo'</ul>
                <div class="col-sm-2"></div>
            </nav>';
            echo "<p class='prijava'>Uspješan login</p>";
            echo "<p class='prijava'>Dobrodošao ".$ime." ".$prezime."!</p>";
            echo'
            <main class="row">
                <header>
                    <h1>';?><?php echo $sport; ?><?php echo'</h1>';?>
                    <?php 
                        if(isset($_SESSION['$username'])) {
                            if($_SESSION['$level'] == 1) {
                                echo "<p>Dobrodošao ".$_SESSION['$ime']." ".$_SESSION['$prezime']."!</p>";
                                echo "<p>Imate pravo pristupa na Administratorskoj stranici!</p>"; 
                            } else if($_SESSION['$level'] == 0) {
                                echo "<p>Dobrodošao ".$_SESSION['$ime']." ".$_SESSION['$prezime']."!</p>";
                            } else {
                                echo "<p>Molimo da se registrirate!</p>";
                            }
                        }  
                    ?>
                    <?php echo"
                </header>
                <article>
                    <section class='row'>"; ?>
                        <?php
                            $Sport_query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='sport' LIMIT 3";
                            $Sport_result = mysqli_query($dbc, $Sport_query) or die('Neuspiješno čitanje članka sporta iz baze!');
                            while($Sport_row=mysqli_fetch_array($Sport_result)) {
                                echo "
                                <aside class='col-sm-4'>
                                    <a href ='clanak.php?id=".$Sport_row['id']."' id='homepageClanak'>
                                        <picture>
                                            <img src='images/".$Sport_row['slika']."' class='slika' alt='slika'>
                                        </picture>
                                        <h3>".$Sport_row['naslov']."</h3>
                                        <p>".$Sport_row['sazetak']."</p>
                                        <p class='datum'>".$Sport_row['datum']."</p>
                                        <hr />
                                    </a>
                                </aside>";
                            }
                            mysqli_close($dbc);
                        ?>
                        <?php echo'
                    </section>
                </article>
                <header>
                    <h1><?php echo $kultura; ?></h1>
                </header>
                <article>
                    <section class="row">';?>
                        <?php
                            $dbc = mysqli_connect($servername,$username,$password,$basename) or 
                            die('Error connecting to MYSQL server.'.mysqli_connect_error());
                            mysqli_set_charset($dbc, "utf8");
                            $Kultura_query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='kultura' LIMIT 3";
                            $Kultura_result = mysqli_query($dbc, $Kultura_query) or die('Neuspiješno čitanje članka kulture iz baze!');
                            while($Kultura_row=mysqli_fetch_array($Kultura_result)) {
                                echo "
                                <aside class='col-sm-4'>
                                    <a href ='clanak.php?id=".$Kultura_row['id']."' id='homepageClanak'>
                                        <picture>
                                            <img src='images/".$Kultura_row['slika']."' class='slika' alt='slika'>
                                        </picture>
                                        <h3>".$Kultura_row['naslov']."</h3>
                                        <p>".$Kultura_row['sazetak']."</p>
                                        <p class='datum'>".$Kultura_row['datum']."</p>
                                        <hr />
                                    </a>
                                </aside>";
                            }
                            mysqli_close($dbc);
                            ?>
                            <?php echo'
                    </section>
                </article>
            </main>
            <footer class="row">
                <h1 class="col-sm-12">welt</h1>
            </footer>
        </body>
        </html>';
        } 
    }
    else {
        $uspjesnaPrijava = false;
        //header('Location: registracija.php');
        echo '<!DOCTYPE html>
        <html>
        <head>
          <title>Welt</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
          <link rel="stylesheet" href="style.css">
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
                    <li class="nav-item navigacija"><a class="nav-link" href="login.php">Login</a></li>
                </ul>
                <div class="col-sm-2"></div>
            </nav>';
            echo "<p class='prijava'>Molimo da se registrirate!</p>";
            echo'
            <main class="row">
                <h1>Registracija</h1>
                <article class="col-sm-12">
                    <form class="form-style-9" enctype="multipart/form-data" action="registracija1.php" method="POST">
                        <ul class="col-sm-12">
                            <li>
                                <span id="porukaIme" class="bojaPoruke"></span>
                                <label class="field-full align-left" for="ime">Ime</label>
                                <input type="text" name="ime" class="field-style field-full align-left" id="ime"/>
                            </li>
                            <li></li>
                            <li>
                                <span id="porukaPrezime" class="bojaPoruke"></span>
                                <label class="field-full align-left" for="prezime">Prezime</label>
                                <input type="text" name="prezime" class="field-style field-full align-left" id="prezime"/>
                            </li>
                            <li></li>
                            <li>
                                <span id="porukaUser" class="bojaPoruke"></span>
                                <label class="field-full align-left" for="user">Username</label>
                                <input type="text" name="user" class="field-style field-split align-left" id="user"/>
                            </li>  
                            <li></li>
                            <li>
                                <span id="porukaLozinka" class="bojaPoruke"></span>
                                <label class="field-full align-left" for="lozinka">Lozinka</label>
                                <input type="password" name="lozinka" class="field-style field-split align-left" id="lozinka"/>
                            </li>
                            <li></li>
                            <li>
                                <span id="porukaPonLozinka" class="bojaPoruke"></span>
                                <label class="field-full align-left" for="ponLozinka">Ponovite lozinku</label>
                                <input type="password" name="ponLozinka" class="field-style field-split align-left" id="ponLozinka"/>
                            </li>
                            <li></li>
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
                            // Ime (2-40 znakova)
                            var poljeIme = document.getElementById("ime");
                            var ime = document.getElementById("ime").value;
                            if(ime.length < 2 || ime.length > 40) {
                                slanjeForme = false;
                                poljeIme.style.border="1px dashed red";
                                document.getElementById("porukaIme").innerHTML=("Ime mora imati između 2 i 40 znakova!<br>");
                            } else {
                                poljeIme.style.border = "1px solid green";
                                document.getElementById("porukaIme").innerHTML="";
                            }
                            // Prezime (2-40 znakova)
                            var poljePrezime = document.getElementById("prezime");
                            var prezime = document.getElementById("prezime").value;
                            if(prezime.length < 2 || prezime.length > 40) {
                                slanjeForme = false;
                                poljePrezime.style.border="1px dashed red";
                                document.getElementById("porukaPrezime").innerHTML=("Prezime mora imati između 2 i 40 znakova!<br>");
                            } else {
                                poljePrezime.style.border = "1px solid green";
                                document.getElementById("porukaPrezime").innerHTML="";
                            }
                            // Username mora biti unesen
                            var poljeUser = document.getElementById("user");
                            var user = document.getElementById("user").value;
                            if(user.length == 0) {
                                slanjeForme = false;
                                poljeUser.style.border="1px dashed red";
                                document.getElementById("porukaUser").innerHTML=("Username mora biti unesen!<br>");
                            } else {
                                poljeUser.style.border="1px solid green";
                                document.getElementById("porukaUser").innerHTML="";
                            }
                            // Password mora biti unesen
                            var poljeLozinka = document.getElementById("lozinka");
                            var lozinka = document.getElementById("lozinka").value;
                            if(lozinka.length == 0) {
                                slanjeForme = false;
                                poljeLozinka.style.border="1px dashed red";
                                document.getElementById("porukaLozinka").innerHTML=("Lozinka mora biti unesena!<br>");
        
                            } else {
                                poljeLozinka.style.border="1px solid green";
                                document.getElementById("porukaLozinka").innerHTML="";
                            }
                            // Ponavljanje Passworda mora biti uneseno
                            var poljePonLozinka = document.getElementById("ponLozinka");
                            var ponLozinka = document.getElementById("ponLozinka").value;
                            if(ponLozinka.length == 0) {
                                slanjeForme = false;
                                poljePonLozinka.style.border="1px dashed red";
                                document.getElementById("porukaPonLozinka").innerHTML=("Ponovljena lozinka mora biti unesena!<br>");
        
                            } else {
                                poljePonLozinka.style.border="1px solid green";
                                document.getElementById("porukaPonLozinka").innerHTML="";
                            }
        
                            //Provjera passworda
                            if(lozinka != ponLozinka) {
                                slanjeForme = false;
                                poljePonLozinka.style.border="1px dashed red";
                                document.getElementById("porukaLozinka").innerHTML=("Lozinke nisu jednake!<br>");
                                poljePonLozinka.style.border="1px dashed red";
                                document.getElementById("porukaPonLozinka").innerHTML="";
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
        </html>';
    }
?>