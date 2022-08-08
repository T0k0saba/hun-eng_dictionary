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
                <?php
                if (isset($_SESSION['keresettSzo'])) //checking whether the session is set or not
                {
                    echo $_SESSION['keresettSzo']; //display the session message if set
                    unset($_SESSION['keresettSzo']); //remove session message
                }
                ?>
                <h2>Magyar Fordítás</h2>
                <?php
                if (isset($_SESSION['keresesHun'])) //checking whether the session is set or not
                {
                    echo $_SESSION['keresesHun']; //display the session message if set
                    unset($_SESSION['keresesHun']); //remove session message
                }
                ?>
                <h2>Angol Fordítás</h2>
                <?php
                if (isset($_SESSION['keresesEn'])) //checking whether the session is set or not
                {
                    echo $_SESSION['keresesEn']; //display the session message if set
                    unset($_SESSION['keresesEn']); //remove session message
                }
                ?>
            </div>
            <?php
            if (isset($_SESSION['keresHiba'])) //checking whether the session is set or not
            {
                echo $_SESSION['keresHiba']; //display the session message if set
                unset($_SESSION['keresHiba']); //remove session message
            }

            if (isset($_SESSION['nincsTalalat'])) //checking whether the session is set or not
            {
                echo $_SESSION['nincsTalalat']; //display the session message if set
                unset($_SESSION['nincsTalalat']); //remove session message
            }
            ?>
            <form action="./partials/search.php" method="GET">
                <div class="input-group my-4 w-75 mx-auto col-12">
                    <input type="text" class="form-control rounded" placeholder="Keresett szó" name="kereses" required />
                    <input type="submit" class="btn btn-success" value="Keresés" />
                </div>
            </form>
            <?php
            // PROCESS SEARCH WHEN FORM SUBMITTED
            /*if (isset(filter_input(INPUT_GET, 'kereses', FILTER_SANITIZE_SPECIAL_CHARS))) {
                // SEARCH FOR WORDS
                require "./partials/search.php.";

                // DISPLAY RESULTS
                if (count($results) > 0) {
                    foreach ($results as $r) {
                        printf("<div>%s - %s</div>", $r["magyar"], $r["angol"]);
                    }
                } else {
                    echo "Nincs találat";
                }
            }*/
            ?>
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
                <?php
                if (isset($_SESSION['notAdd'])) //checking whether the session is set or not
                {
                    echo $_SESSION['notAdd']; //display the session message if set
                    unset($_SESSION['notAdd']); //remove session message
                }
                ?>
                <?php
                if (isset($_SESSION['alreadyExist'])) //checking whether the session is set or not
                {
                    echo $_SESSION['alreadyExist']; //display the session message if set
                    unset($_SESSION['alreadyExist']); //remove session message
                }
                ?>
                <form class="w-75 mx-auto" method="GET">
                    <div class="mb-3">
                        <label for="angol" class="form-label">Angol szó</label>
                        <input type="text" class="form-control" id="angolSzo" name="angol" required>
                    </div>
                    <div class="mb-3">
                        <label for="magyar" class="form-label">Magyar szó</label>
                        <input type="text" class="form-control" id="magyarSzo" name="magyar" required>
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

if (null !== filter_input(INPUT_GET, 'submit', FILTER_SANITIZE_SPECIAL_CHARS)) { // if(isset($_GET['submit])) replaced
    // Button Clicked
    // echo "Button Clicked";

    //1. Get the data from form
    $magyar = filter_input(INPUT_GET, 'magyar', FILTER_SANITIZE_SPECIAL_CHARS);
    $angol = filter_input(INPUT_GET, 'angol', FILTER_SANITIZE_SPECIAL_CHARS);


    //2. SQL query to save the data into database
    $sql = "INSERT INTO szotar SET
        magyar='$magyar',
        angol='$angol'
    ";

    $check = "SELECT * FROM szotar WHERE magyar = '$magyar'";
    $rs = mysqli_query($conn, $check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    if ($data[0] > 1) {
        $_SESSION['alreadyExist'] = "<div class='text-danger text-center'>A szó már létezik!</div>";
        //redirect page to home page
        header("location:" . SITEURL . 'index.php');
    } 
    else 
    {

        // 3. Executing query and saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
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
        $_SESSION['notAdd'] = "<div class='text-danger'>A szó hozzáadása sikertelen!</div>";
        //redirect page to home page
        header("location:" . SITEURL . 'index.php');
    }
}
?>