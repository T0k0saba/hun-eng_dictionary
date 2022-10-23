<div class="form-area">
    <div class="container">
        <div class="row single-form g-0">
            <div class="col-sm-12 col-lg-6">
                <div class="left">
                    <h2><span>Lépjünk kapcsolatba</span><br>Írj nekem</h2>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="right">
                    <i class="fa fa-caret-left"></i>
                    <form action="./contact.php" method="POST" id="form">
                        <div class="mb-3">
                            <label for="name" class="form-label text-danger fw-bold"><?= $errors['name'] ?? '' ?></label>
                            <input type="text" value="<?= $inputs['name'] ?? '' ?>" class="form-control formBorder" id="name" name="name" aria-describedby="emailHelp" placeholder="Hogyan szólíthatlak?" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-danger fw-bold"><?= $errors['email'] ?? '' ?></label>
                            <input type="email" class="form-control formBorder" id="email" name="email" value="<?= $inputs['email'] ?? '' ?>" aria-describedby="emailHelp" placeholder="Ide írd az email címed!" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label text-danger fw-bold"><?= $errors['message'] ?? '' ?></label>
                            <textarea name="message" class="form-control formBorder" id="message" placeholder="Mit üzensz nekem?" required><?= $inputs['message'] ?? '' ?></textarea>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkbox" required>
                            <label class="form-check-label" for="checkbox">Elolvastam és elfogadom az <a href="./gdpr.php" target="_blank">Adatkezelési tájékoztatóban</a> foglaltakat.</label>
                        </div>
                        <label for="nickname" aria-hidden="true" class="user-cannot-see"> Nickname
                            <input type="text" name="nickname" id="nickname" class="user-cannot-see" tabindex="-1" autocomplete="off">
                        </label>
                        <button type="submit" class="btn btn-primary">Küldés</button>
                        <?php if (isset($message)) : ?>
                            <div id="elkuldve">
                                <p><?= $message ?></p>
                            </div>
                        <?php endif ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>