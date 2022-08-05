<?php

include('./config/constants.php');

?>


<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magyar - Angol szótár</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <header>
        <div class="bg-success py-3 mb-3">
            <h1 class="text-white text-center">Szótár</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="text-center">
                <h2>Magyar Fordítás</h2>
                <h2>Angol Fordítás</h2>
            </div>
            <?php
                if (isset($_SESSION['keres'])) //checking whether the session is set or not
                {
                    echo $_SESSION['keres']; //display the session message if set
                    unset($_SESSION['keres']); //remove session message
                }
                ?>
            <form action="./partials/search.php" method="GET">
                <div class="input-group my-4 w-75 mx-auto col-12">
                    <input type="search" class="form-control rounded" placeholder="Keresett szó" name="kereses"/>
                    <button type="submit" class="btn btn-success" name="kereses">Keresés</button>
                </div>
            </form>
            <div class="text-center">
                <h2>Úticélok</h2>
                <div class="row">
                    <div class="col-sm-12 col-xl-4">
                        <img src="./images/big-ben.jpg" alt="Big Ben" class="img-fluid">
                        <p class="fst-italic">Big Ben, London</p>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <img src="./images/manhattan-bridge.jpg" alt="Manhattan bridge" class="img-fluid">
                        <p class="fst-italic">Manhattan Bridge, New York</p>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <img src="./images/budapest.jpg" alt="Budapest országház" class="img-fluid">
                        <p class="fst-italic">Országház, Budapest</p>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <h2>Szópár felvitele</h2>
                <?php
                if (isset($_SESSION['add'])) //checking whether the session is set or not
                {
                    echo $_SESSION['add']; //display the session message if set
                    unset($_SESSION['add']); //remove session message
                }
                ?>
                <form class="w-75 mx-auto" method="GET">
                    <div class="mb-3">
                        <label for="angol" class="form-label">Angol szó</label>
                        <input type="text" class="form-control" id="angolSzo" name="angol">
                    </div>
                    <div class="mb-3">
                        <label for="magyar" class="form-label">Magyar szó</label>
                        <input type="text" class="form-control" id="magyarSzo" name="magyar">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Hozzáad</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <div class="bg-success py-4 mt-3">
            <h2 class="text-white text-center">Toókos Aba</h2>
        </div>
    </footer>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>

<?php
//Process the value from Form and save it in database

//Check whether the submit button is clicked or not

if (isset($_GET['submit'])) {
    // Button Clicked
    // echo "Button Clicked";

    //1. Get the data from form
    $magyar = $_GET['magyar'];
    $angol = $_GET['angol'];

    //2. SQL query to save the data into database
    $sql = "INSERT INTO szotar SET
        magyar='$magyar',
        angol='$angol'
    ";


    // 3. Executing query and saving data into database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //4. check wether the (query is executed) data is inserted or not and display appropriate message

    if ($res == TRUE) {
        //Data inserted
        //echo "Data inserted";
        //create a session variable to display message
        $_SESSION['add'] = "<div class='text-success'>A szó sikeresen hozzáadva!</div>";
        //redirect page to home page
        header("location:" . SITEURL . 'index.php');
    } else {
        //Failed to insert data
        //echo "Failed to insert data";
        //create a session variable to display message
        $_SESSION['add'] = "<div class='text-danger'>A szó hozzáadása sikertelen!</div>";
        //redirect page to home page
        header("location:" . SITEURL . 'index.php');
    }
}
?>