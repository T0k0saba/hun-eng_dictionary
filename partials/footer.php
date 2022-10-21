<footer class="mt-auto">
        <div class="py-4 mt-3" id="footer">
            <p class="text-white text-center">Minden jog fenntartva &copy; <?php echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : ''); ?></p>
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
        $_SESSION['add'] = "<div class='text-success text-center'>A szó sikeresen hozzáadva!</div>";
        //redirect page to home page
        header("location:" . SITEURL . 'index.php');
    } else {
        //Failed to insert data
        //echo "Failed to insert data";
        //create a session variable to display message
        $_SESSION['notAdd'] = "<div class='text-danger text-center'>A szó hozzáadása sikertelen!</div>";
        //redirect page to home page
        header("location:" . SITEURL . 'index.php');
    }
}
?>