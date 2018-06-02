<div class="container">
  <section>
    <form method="post" action="index.php?controller=artiste&action=created" enctype="multipart/form-data">
      <fieldset>
        <legend>Creer un compte :</legend>
        <div class="form-row">
          <div class="form-group ">
            <label for="log">Login</label>
            <input type="text" class="form-control" id="log" name="idArtiste" placeholder="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="mp">Password</label>
            <input type="password" id="mp" class="form-control" name="artisteMdp" aria-describedby="passwordHelpBlock">
            <small id="passwordHelpBlock" class="form-text text-muted">
              Votre mot de passe doit faire entre 8-20 caractères, contenir des lettre et des chiffre et pas d'espace ou de caractère spéciaux.
            </small>
          </div>
          <div class="form-group col-md-6">
            <label for="mdp">Confirmation</label>
            <input type="password" id="mdp" class="form-control" name="artisteMdpBis" name="artisteMdp" >
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="artisteNom" placeholder="">
          </div>
          <div class="form-group col-md-6">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="artistePrenom" placeholder="">
          </div>
        </div>
        <div class="form-group ">
          <label for="dscr">Quelques mot sur vous ?</label>
          <textarea class="form-control" id="dscr" name="artisteDescription" rows="3" aria-describedby="testHelpBlock"> </textarea>
          <small id="testHelpBlock" class="form-text text-muted">
            Cette description permet au visiteur de mieux comprendre votre univers, elle est visible sur votre profil.
          </small>
        </div>
        <div class="form-group">
          <label for="artistePhoto1">Un photo de vous :</label>
          <input type="file" class="form-control-file" name="artistePhoto1" id="artistePhoto1" aria-describedby="pictureHelpBlock">
          <small id="testHelpBlock" class="form-text text-muted">
            Cette photo sera visible sur votre profil.
          </small>
        </div>
        <input type="submit" value="Envoyer" name="submit">
      </fieldset> 
    </form>
  </section>
</div>