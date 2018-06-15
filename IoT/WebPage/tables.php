<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IoT</title>

    <!-- Bootstrap core CSS-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <!-- Bootstrap core JS-->
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Script -->
    <scrip src="js/Chart.main.js"></scrip>
    <script src="js/jquery.min.js"></script>

</head>

<body id="page-top" class="bg-dark">
<!-- Navigation-->
<div class="container-fluid">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">IoT - Internet of Things</a>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <span class="nav-link-text">Charts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <span class="nav-link-text">Tables</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="https://github.com/Christoph-Knoll/IoT">
                    <span class="nav-link-text">Github Page</span>
                </a>
            </li>
        </ul>
</nav>
</div>

<div class="bg-light" style=" margin-left: 1em; margin-right: 1em; margin-top: 3.5em; border-radius: 1em;">
    <div style=" padding-top: 1em; padding-left: 1em; padding-right: 1em; padding-bottom: 1em;">
        <table class="table table-bordered table-striped">

            <?php
            echo "<thead>";
            echo "<tr><th>Order ID</th><th>Prduct ID</th><th>Date</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            //database
            define('DB_HOST', '127.0.0.1');
            define('DB_USERNAME', 'root');
            define('DB_PASSWORD', '');
            define('DB_NAME', 'mydb');

            if ($db = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME)) {
                $sql = "SELECT * FROM Orders";
                if ($ergebnis = mysqli_query($db, $sql)) {
                    while ($zeile = mysqli_fetch_assoc($ergebnis)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($zeile["OrderId"]) . "</td>" .
                             "<td>" . htmlspecialchars($zeile["Nr"]) . "</td>" .
                             "<td>" . htmlspecialchars($zeile["Date"]) . "</td>" ;
                        echo "</tr>";
                    }
                }
                mysqli_close($db);
            } else {
                for ($i = 0; i < 100; $i++) {
                    echo "Fehler!";
                }
            }
            echo "</tbody>";
            ?>
    </div>
</div>

<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<footer>
    <div class="container">
        <div class="text-center">
            <small>Copyright © Christoph Knoll, Georg Sengstbratl 2018</small>
        </div>
    </div>
</footer>
</body>

</html>
