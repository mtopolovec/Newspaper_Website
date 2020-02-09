<?php 

session_start();

if(!isset($_SESSION['$username'])) {
    header('Location: ..\login.php');
}

?>
<?php
    include 'connect.php';
    $id=$_GET['id'];

    $query = "SELECT * FROM clanci WHERE id=$id ";
    $result = mysqli_query($dbc, $query) or die('Neuspiješno čitanje članka sporta iz baze!');
    $row=mysqli_fetch_array($result);
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
            <h1><?php echo $row['naslov']; ?></h1>
            <hr />
        </header>
        <article>
                <div class="row">
                        <div class="col-sm-2"></div>
                            <h5 class="col-sm-8"><?php echo $row['sazetak']; ?></h5>
                        <div class="col-sm-2"></div>
                    <div class="col-sm-2"></div>
                        <p class="col-sm-8"><?php echo $row['datum']; ?></p>
                    <div class="col-sm-2"></div>
                </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <picture class="col-sm-10">
                    <?php echo "<img src='../images/".$row['slika']."' class='slika' alt='slika'"; ?>
                </picture>
                <div class="col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                    <p class="col-sm-8">
                        <?php echo $row['tekst']; ?>
                    </p>
                <div class="col-sm-2"></div>
            </div>
        </article>
    </main>
    <footer class="row">
        <h1 class="col-sm-12">welt</h1>
    </footer>
</body>
</html>
<?php
    mysqli_close($dbc);
?>