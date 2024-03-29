<?php
include('./partials/header.php');
?>

<div class="form-area">
  <div class="container">
    <div class="row single-form g-0">
      <div class="col-sm-12 col-lg-6">
        <div class="left">
          <h2><span>Az üzenet elküldve</span><br>Köszönöm!</h2>
        </div>
      </div>
      <div class="col-sm-12 col-lg-6">
        <div class="right">
          <i class="fa fa-caret-left"></i>
          <form action="./partials/send-email.php" method="POST" id="form">

            <div class="mb-3">
              <input type="text" class="form-control formBorder" id="name" name="name" aria-describedby="emailHelp" placeholder="Hogyan szólíthatlak?" required>
            </div>

            <div class="mb-3">
              <input type="email" class="form-control formBorder" id="email" name="email" aria-describedby="emailHelp" placeholder="Ide írd az email címed!" required>
            </div>

            <div class="mb-3">
              <input type="subject" class="form-control formBorder" id="subject" name="subject" aria-describedby="emailHelp" placeholder="Mi az üzenet tárgya?" required>
            </div>

            <div class="mb-3">
              <textarea name="message" class="form-control formBorder" id="message" placeholder="Mit üzensz nekem?" required></textarea>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="checkbox" required>
              <label class="form-check-label" for="checkbox">Elolvastam és elfogadom az <a href="./gdpr.php" target="_blank">Adatkezelési tájékoztatóban</a> foglaltakat.</label>
            </div>

            <label for="nickname" aria-hidden="true" class="user-cannot-see"> Nickname
              <input type="text" name="nickname" id="nickname" class="user-cannot-see" tabindex="-1" autocomplete="off">
            </label>

            <button type="submit" class="btn btn-primary">Küldés</button>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('./partials/footer.php');
?>