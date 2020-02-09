<?php 

session_start();

if(!isset($_SESSION['$username'])) {
    header('Location: ..\login.php');
}

?>
<?php
include 'connect.php';

$query = "SELECT * FROM clanci";
$result = mysqli_query($dbc, $query) or die('Neuspiješno čitanje članka sporta iz baze!');
    $sport = "sport";
    $kultura = "kultura";
    $zanimljivo = "zanimljivo";
    $novosti = "novosti";
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
            <?php
                while($row=mysqli_fetch_array($result)) {
                    
                    echo "<form class='form-style-9' enctype='multipart/form-data' action='' method='POST'>
                        <ul class='col-sm-12'>
                            <li>
                                <label class='field-full align-left' for='title'>Naslov vijesti</label>
                                <input type='text' name='title' class='field-style field-full align-left' value='".$row['naslov']."'/>
                            </li>
                            <li>
                                <label class='field-full align-left' for='about'>Kratki sadržaj vijesti (do 50 znakova)</label>
                                <textarea name='about' class='field-style field-full align-left'>".$row['sazetak']."</textarea>
                            </li>
                            <li>
                                <label class='field-full align-left' for='content'>Sadržaj vjesti</label>
                                <textarea name='content' class='field-style field-full align-left'>".$row['tekst']."</textarea>
                            </li>  
                            <li>
                                <label class='field-full align-left' for='photo'>Slika: </label>
                                <input type='file' name='photo' accept='image/jpg,image/gif' value='".$row['slika']."'/><br>
                                <img src='../images/".$row['slika']."' width='100px'>
                            </li>
                            <li>
                                <label class='field-full align-left' for='category'>Kategorija vijesti </label>
                                <select name='category' class='field-style field-split align-left'>";
                                if(strcmp($row['kategorija'],$sport)==0) {
                                    echo"
                                    <option value='' disabled selected>Odabir kategorije</option>
                                    <option value='sport' selected>Sport</option>
                                    <option value='kultura'>Kultura</option>
                                    <option value='zanimljivo'>Zanimljivo</option>
                                    <option value='novosti'>Novosti</option>";
                                }
                                else if (strcmp($row['kategorija'],$kultura)==0) {
                                    echo"<option value='sport'>Sport</option>
                                    <option value='kultura' selected>Kultura</option>
                                    <option value='zanimljivo'>Zanimljivo</option>
                                    <option value='novosti'>Novosti</option>";
                                }
                                else if (strcmp($row['kategorija'],$zanimljivo)==0) {
                                    echo"<option value='sport'>Sport</option>
                                    <option value='kultura'>Kultura</option>
                                    <option value='zanimljivo' selected>Zanimljivo</option>
                                    <option value='novosti'>Novosti</option>";
                                }
                                else if (strcmp($row['kategorija'],$novosti)==0) {
                                    echo"<option value='sport'>Sport</option>
                                    <option value='kultura'>Kultura</option>
                                    <option value='zanimljivo'>Zanimljivo</option>
                                    <option value='novosti' selected>Novosti</option>";
                                }
                                echo  "</select>
                            </li>
                            <li>
                                <label class='field-full align-left'>Spremiti u arhivu: ";
                                    if($row['arhiva'] == 0) {
                                        echo "<input type='checkbox' name='archive' />";
                                    }
                                    else {
                                        echo "<input type='checkbox' name='archive' checked />";
                                    }
                    echo "</label>
                            </li>
                            <li>
                                <input type='hidden' name='id' class='field-style field-split align-left' value='".$row['id']."'>
                            </li>
                            <li>
                                <input type='reset' value='Poništi' />
                                <input type='submit' name='update' value='Prihvati' />
                                <input type='submit' name='delete' value='Izbriši' />
                            </li>
                        </ul>
                    </form>";
                }
            // brisanje clanka
            if(isset($_POST['delete'])) {
                $id=$_POST['id'];
                $query = "DELETE from clanci WHERE id=$id ";
                $result = mysqli_query($dbc,$query);
            }
            // Update clanka
            if(isset($_POST['update'])) {
                $picture = $_FILES['photo']['name'];
                $title = $_POST['title'];
                $about = $_POST['about'];
                $content = $_POST['content'];
                $category = $_POST['category'];
                if(isset($_POST['archive'])) {
                    $archive = 1;
                } else {
                    $archive = 0;
                }
                if($picture == NULL) {
                    $id=$_POST['id'];
                    $query="UPDATE clanci SET naslov='$title', sazetak='$about', tekst='$content', kategorija='$category', arhiva='$archive' WHERE id=$id";
                    $result = mysqli_query($dbc,$query);
                } else {
                    $target = '../images/'.$picture;
                    move_uploaded_file($_FILES['photo']['tmp_name'],$target);

                    $id=$_POST['id'];
                    $query="UPDATE clanci SET naslov='$title', sazetak='$about', tekst='$content', slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id";
                    $result = mysqli_query($dbc,$query);
                }
                
            }
            ?>
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