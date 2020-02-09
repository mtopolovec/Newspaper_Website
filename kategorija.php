<?php 

session_start();
/*
if(!isset($_SESSION['$username'])) {
    header('Location: login.php');
}
*/
?>

<?php
    include 'connect.php';
    $kategorija=$_GET['id'];

?>
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
    <!-- Zaseban red -->
    <header class="row">
        <h1 class="col-sm-2">welt</h1>
        <div class ="col-sm-10"></div>
    </header>
    <!-- Navigacija -->
    <nav class="row nav navbar-expand-md">
        <ul class="col-sm-10 navbar-nav">
            <li class="nav-item navigacija"><a class="nav-link" href="index.php">Home</a></li>
            <!-- Testni clanak za predložak<li class="nav-item"><a class="nav-link" href="b&f.php">Beruf & Karriere</a></li>-->
            <li class="nav-item navigacija"><a class="nav-link" href="kategorija.php?id=sport">Sport</a></li>
            <li class="nav-item navigacija"><a class="nav-link" href="kategorija.php?id=kultura">Kultura</a></li>
            <?php 
            
                if(!isset($_SESSION['$username'])) {
                    echo '<li class="nav-item navigacija"><a class="nav-link" href="login.php">Login</a></li>';
                    echo '<li class="nav-item navigacija"><a class="nav-link" href="registracija.php">Registracija</a></li>';
                } else {
                    echo '<li class="nav-item navigacija"><a class="nav-link" href="logout.php">Logout</a></li>';
                }
                
            ?>
        </ul>
        <div class="col-sm-2"></div>
    </nav>
    <main class="row">
        <header>
            <h1><?php echo $kategorija; ?></h1>
        </header>
        <article>
            <section class='row'>
                <?php
                    $query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='$kategorija'";
                    $result = mysqli_query($dbc, $query) or die('Neuspiješno čitanje članka sporta iz baze!');
                    while($row=mysqli_fetch_array($result)) {
                        echo "
                        <aside class='col-sm-4'>
                            <a href ='clanak.php?id=".$row['id']."' id='homepageClanak'>
                                <picture>
                                    <img src='images/".$row['slika']."' class='slika' alt='slika'>
                                </picture>
                                <h3>".$row['naslov']."</h3>
                                <p>".$row['sazetak']."</p>
                                <p class='datum'>".$row['datum']."</p>
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