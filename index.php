<?php
include('./partials/header.php');
?>



<main class="d-flex align-items-center justify-content-center">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h2 class="text-center">Szó keresése</h2>
                <?php
                if (isset($_SESSION['nincsTalalat'])) //checking whether the session is set or not
                {
                    echo $_SESSION['nincsTalalat']; //display the session message if set
                    unset($_SESSION['nincsTalalat']); //remove session message
                }
                ?>
                <form action="./partials/search.php" method="GET">
                    <div class="input-group my-4 w-100 mx-auto col-12">
                        <input type="text" class="form-control rounded-left text-lowercase" placeholder="Keresett szó" name="kereses" required />
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


                <?php
                if (isset($_SESSION['hozzaAdCim'])) {
                    echo $_SESSION['hozzaAdCim'];
                    unset($_SESSION['hozzaAdCim']);
                }
                ?>
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
                <?php
                if (isset($_SESSION['hozzaAdForm'])) {
                    echo $_SESSION['hozzaAdForm'];
                    unset($_SESSION['hozzaAdForm']);
                }
                ?>
            </div>
        </div>
    </div>
</main>
<?php
include('./partials/footer.php');
?>