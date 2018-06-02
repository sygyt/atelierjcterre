<div class="container">
  <section>
    <form method="post" action="index.php?controller=exposition&action=added" enctype="multipart/form-data">
      <fieldset>
        <legend>Proposer une exposition :</legend>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nm">Nom de l'exposition</label>
            <input type="text" class="form-control" id="nm" name="expositionName" placeholder="">
          </div>
          <div class="form-group col-md-6">
            <label for="log">Lieux de l'exposition</label>
            <input type="text" class="form-control" id="log" name="expositionLieux" placeholder="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group ">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="expositionDate" placeholder="">
          </div>
        </div>
        <div class="form-group ">
          <label for="dscr">Decrivez l'évenement ?</label>
          <textarea class="form-control" id="dscr" name="expositionDescription" rows="3" a </textarea></textarea>
          </div>
          <input type="submit" value="Envoyer" name="submit">
        </fieldset> 
      </form>
    </section>
  </div>
