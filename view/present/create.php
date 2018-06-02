<div class="container mx-auto">
  <section>
    <form method="post" action="index.php?controller=present&action=added">
      <fieldset>
        <div class="form-row">
          <div class="form-group">
            <legend>Signaler sa présence :</legend>
            <p>
              <label for="ida">Votre Identifiant </label> :
              <input type="text" placeholder="" name="idArtiste" id="ida" required/>
            </p>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group ">
            <p>
              <label for="mdp">id exposition</label> :
              <input type="text" placeholder="" name="idExposition" id="mdp" required/>
            </p>
          </div>
        </div>
        <input type="submit" value="Envoyer" />
      </p>
    </fieldset> 
  </form>
</section>
</div>