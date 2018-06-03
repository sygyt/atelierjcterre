<div class="container">
	<div class="row">
		<?php 
			foreach ($tab_a as $i =>$v){
			$idArtiste = $v->getIdArtiste();
			$artisteNom = $v->getArtisteNom();
			$artistePrenom = $v->getArtistePrenom();
			$artisteDescription = $v->getArtisteDescription();
			$artistePhoto1 = $v->getArtistePhoto1();
			$nbOeuvre = $v->getNbOeuvre();

			?>
				<div class="col-lg-4 col-md-6 mt-2">
					<div class="card" style="width: 100%; height: 430px;">
						<img class="card-img-top mx-auto " style="height: 230px; width: 230px;" src="<?php echo $artistePhoto1 ?>" alt="Photo de l'artiste">
						<div class="card-body text-center">
							<h5 class="card-title"> <?php echo htmlspecialchars($idArtiste) ?></h5>
							<h6 class="card-subtitle mb-2 text-muted"> <?php echo(htmlspecialchars($artistePrenom)."  "); echo htmlspecialchars($artisteNom)?> </h6>
							<p class="card-text"> <?php echo htmlspecialchars($artisteDescription)  ?> </p>
						</div>	
						<a href="index.php?controller=oeuvre&action=readOneArtiste&artiste=<?php echo $idArtiste?>" class="btn btn-light">Voir les Oeuvres (<?php echo htmlspecialchars($nbOeuvre)?>)</a>
					</div>	
				</div>

			<?php } ?>
		</div>
	</div>