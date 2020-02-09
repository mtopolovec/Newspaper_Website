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
            <li class="nav-item navigacija"><a class="nav-link" href="kategorija.php?id=kultura">Kultura</a></li>
            <li class="nav-item navigacija"><a class="nav-link" href="login.php">Login</a></li>
            <li class="nav-item navigacija"><a class="nav-link" href="registracija.php">Registracija</a></li>
        </ul>
        <div class="col-sm-2"></div>
    </nav>
    <main class="row">
        <h1>Login</h1>
        <article class="col-sm-12">
            <form class="form-style-9" enctype="multipart/form-data" action="provjeraLogina.php" method="POST">
                <ul class="col-sm-12">
                    <li>
                        <span id="porukaUser" class="bojaPoruke"></span>
                        <label class="field-full align-left" for="user">Username:</label>
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
                        <button class="gumb" type="reset">Poništi</button>
                        <button id="slanje" class="gumb" type="submit">Prihvati</button>
                    </li>
                </ul>
            </form>
            <script type="text/javascript">
                //Provjera forme prije slanja
                document.getElementById("slanje").onclick = function(event) {
                    var slanjeForme = true;

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