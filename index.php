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
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="#">Szótár</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container d-flex align-items-center justify-content-center">
            <div class="card border-0 shadow my-5">
                <div class="card-body p-5">
                    <?php
                    if (isset($_SESSION['nincsTalalat'])) //checking whether the session is set or not
                    {
                        echo $_SESSION['nincsTalalat']; //display the session message if set
                        unset($_SESSION['nincsTalalat']); //remove session message
                    }
                    ?>
                    <form action="./partials/search.php" method="GET">
                        <div class="input-group my-4 w-100 mx-auto col-12">
                            <input type="text" class="form-control rounded-left" placeholder="Keresett szó" name="kereses" required />
                            <input type="submit" class="btn btn-success" value="Keresés" />
                        </div>
                    </form>
                    <div class="text-center" id="eredmeny">

                        <?php
                        if (isset($_SESSION['keresettSzo'])) //checking whether the session is set or not
                        {
                            echo $_SESSION['keresettSzo']; //display the session message if set
                            unset($_SESSION['keresettSzo']); //remove session message
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['magyarul'])) //checking whether the session is set or not
                        {
                            echo $_SESSION['magyarul']; //display the session message if set
                            unset($_SESSION['magyarul']); //remove session message
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['keresesHun'])) //checking whether the session is set or not
                        {
                            echo $_SESSION['keresesHun']; //display the session message if set
                            unset($_SESSION['keresesHun']); //remove session message
                        }
                        if (isset($_SESSION['nincsTalalatEn'])) //checking whether the session is set or not
                        {
                            echo $_SESSION['nincsTalalatEn']; //display the session message if set
                            unset($_SESSION['nincsTalalatEn']); //remove session message
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['angolul'])) //checking whether the session is set or not
                        {
                            echo $_SESSION['angolul']; //display the session message if set
                            unset($_SESSION['angolul']); //remove session message
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['keresesEn'])) //checking whether the session is set or not
                        {
                            echo $_SESSION['keresesEn']; //display the session message if set
                            unset($_SESSION['keresesEn']); //remove session message
                        }
                        if (isset($_SESSION['nincsTalalatHu'])) //checking whether the session is set or not
                        {
                            echo $_SESSION['nincsTalalatHu']; //display the session message if set
                            unset($_SESSION['nincsTalalatHu']); //remove session message
                        }
                        ?>
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
                <form class="w-100 mx-auto" method="GET">
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
            </div>
        </div>
    </main>
    <footer>
        <div class="sticky-bottom py-4 mt-3" id="footer">
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


    //3. Check whether the word is already exist in database or not

    $check = "SELECT * FROM szotar WHERE magyar = '$magyar' AND angol = '$angol'";
    $rs = mysqli_query($conn, $check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    if ($data[0] > 1) {
        $_SESSION['alreadyExist'] = "<div class='text-danger text-center'>A szó már létezik!</div>";
        //redirect page to home page
        header("location:" . SITEURL . 'index.php');
    } else {

        // 4. Executing query and saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }


    //5. check wether the (query is executed) data is inserted or not and display appropriate message

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