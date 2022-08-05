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
            <div class="input-group my-4 w-50">
                <input type="search" class="form-control rounded" placeholder="Keresett szó" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-success">Keresés</button>
            </div>
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
                <form class="w-50 mx-auto">
                    <div class="mb-3">
                        <label for="angol" class="form-label">Angol szó</label>
                        <input type="text" class="form-control" id="angolSzo">
                    </div>
                    <div class="mb-3">
                        <label for="magyar" class="form-label">Magyar szó</label>
                        <input type="text" class="form-control" id="magyarSzo">
                    </div>
                    <div>
                    <button type="submit" class="btn btn-success">Hozzáad</button>
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