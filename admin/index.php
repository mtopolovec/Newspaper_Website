<?php 

session_start();

if(!isset($_SESSION['$username'])) {
    header('Location: ..\login.php');
}

?>
<?php 

include 'connect.php';
    
    // ucitavanje clanaka
    //$Novosti_result = mysqli_query($dbc, $Novosti_query) or die('Neuspiješno čitanje članka novosti iz baze!');

    // dohvat arraya iz baze
    //$Novosti_row=mysqli_fetch_array($Novosti_result);
    
    // kategorije
    $sport = "Sport";
    $kultura = "Kultura";
    $zanimljivo = "Zanimljivo";
    $novosti = "Novosti";
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
        <header>
            <h1><?php echo $sport; ?></h1>
        </header>
        <article>
            <section class='row'>
                <?php
                    $Sport_query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='sport' LIMIT 3";
                    $Sport_result = mysqli_query($dbc, $Sport_query) or die('Neuspiješno čitanje članka sporta iz baze!');
                    while($Sport_row=mysqli_fetch_array($Sport_result)) {
                        echo "
                        <aside class='col-sm-4'>
                            <a href ='clanak.php?id=".$Sport_row['id']."' id='homepageClanak'>
                                <picture>
                                    <img src='../images/".$Sport_row['slika']."' class='slika' alt='slika'>
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
             </section>
        </article>
        <header>
            <h1><?php echo $kultura; ?></h1>
        </header>
        <article>
            <section class="row">
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
                                    <img src='../images/".$Kultura_row['slika']."' class='slika' alt='slika'>
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
            </section>
        </article>
    </main>
    <footer class="row">
        <h1 class="col-sm-12">welt</h1>
    </footer>
</body>
</html>