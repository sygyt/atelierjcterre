<div class="container">
  <section>
    <form method="post" action="index.php?controller=oeuvre&action=added" enctype="multipart/form-data">
      <fieldset>
        <legend>Ajouter une oeuvre :</legend>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="log">Name</label>
            <input type="text" class="form-control" id="log" name="oeuvreName" placeholder="">
          </div>
          <div class="form-group col-md-6">
            <label for="date">Date de création de l'oeuvre</label>
            <input type="date" class="form-control" id="date" name="oeuvreDateCreation" placeholder="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="type">Type de l'oeuvre </label>
            <select multiple name="idType" class="form-control" >
                <?php foreach ($typeOeuvre as $typeOeuvre):?>
                    <option class="text-dark" name="idType" value="<?php echo $typeOeuvre->getIdType() ;?>" ><?php echo $typeOeuvre->getTypeLibele();?>
                    </option>
                <?php endforeach;?>
              </select>
          </div>
        </div>

        <div class="form-group ">
          <label for="dscr">Quelques mot sur votre oeuvre ?</label>
          <textarea class="form-control" id="dscr" name="artisteDescription" rows="3" aria-describedby="testHelpBlock"> </textarea>
          <small id="testHelpBlock" class="form-text text-muted">
            Cette description permet au visiteur de comprendre votre oeuvre.
          </small>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="ph1">Première photo de l'oeuvre : </label>
            <input type="file" class="form-control-file" name="oeuvrePhoto1" id="ph1" aria-describedby="pictureHelpBlock">
            <small id="testHelpBlock" class="form-text text-muted">
              Ces photos seront visibles sur le profil de l'oeuvre.
            </small>
          </div>
          <div class="form-group col-md-6">
            <label for="ph2">Deuxième photo de l'oeuvre : </label>
            <input type="file" class="form-control-file" name="oeuvrePhoto2" id="ph2">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="ph3">Troisième photo de l'oeuvre : </label>
            <input type="file" class="form-control-file" name="oeuvrePhoto3" id="ph3">
          </div>
          <div class="form-group col-md-6">
            <label for="ph4">Quatrième photo de l'oeuvre : </label>
            <input type="file" class="form-control-file" name="oeuvrePhoto4" id="ph4">
          </div>
        </div>
        <input type="submit" value="Envoyer" name="submit">
      </fieldset> 
    </form>
  </section>
</div>




