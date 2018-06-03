<?php if($isConnect) { ?>
<div class="row">
	<div class="col-lg-12 col-md-12 mt-2 text-center">
		<a href="index.php?controller=oeuvre&action=add" class="btn btn-outline-secondary btn-lg mt-1 ml-2 mr-2 " role="button" aria-pressed="true">Ajouter une oeuvre</a>
	</div>
</div>
<?php } ?>
<div class="container">
	<div class="row">
		<?php foreach ($tab_o as $i =>$v){
			$idOeuvre = $v->getIdOeuvre();
			$oeuvreName = $v->getOeuvreName();
			$oeuvreDescription = $v->getOeuvreDescription();
			$oeuvreDateCreation = $v->getOeuvreDateCreation();
			$oeuvrePhoto1 = $v->getOeuvrePhoto1();
			$oeuvrePhoto2 = $v->getOeuvrePhoto2();
			$oeuvrePhoto3 = $v->getOeuvrePhoto3();
			$oeuvrePhoto4 = $v->getOeuvrePhoto4();
			$idType = $v->getIdType();
			$idArtiste = $v->getIdArtiste(); ?>
			<div class="col-lg-4 col-md-6 mt-2">
				<div class="card" style="width: 100%; height: 430px;">
					<img class="card-img-top mx-auto" style="height: 230px; width: 230px;" src="<?php echo $oeuvrePhoto1 ?>" alt="Photo de l'oeuvre">
					<div class="card-body text-center">
						<h5 class="card-title"> <?php echo htmlspecialchars($oeuvreName) ?> réalisé par <?php echo htmlspecialchars($idArtiste) ?> </h5>
						<p class="card-text"> <?php echo htmlspecialchars($oeuvreDescription)  ?> </p>
					</div>
					<a href="index.php?controller=oeuvre&action=read&oeuvre=<?php echo $idOeuvre?>" class="btn btn-light">Voir l'oeuvre</a>
				</div>
			</div>
		<?php }	?>
	</div>
</div>

