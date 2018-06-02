<section>
  <form method="post" action="index.php?controller=TypeOeuvre&action=added">
    <fieldset>
      <legend>Ajouter une oeuvre :</legend>
      <p>
        <label for="nomtype">Libele du type</label> :
        <input type="text" placeholder="Ex : céramique" name="typeLibele" id="nomtype" required/>
      </p>
      <p>
        <label for="descrType">Description du type</label> :
        <input type="text" placeholder="" name="typeDescription" id="descrType" required/>
      </p>
      <p>
        <input type="submit" value="Envoyer" />
      </p>
    </fieldset> 
  </form>
</section>