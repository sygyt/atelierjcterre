
<div class="container">
	<div class="row">
		<?php 
		$idArtiste = $artiste->getIdArtiste();
		$artisteNom = $artiste->getArtisteNom();
		$artistePrenom = $artiste->getArtistePrenom();
		$artisteDescription = $artiste->getArtisteDescription();
		$artistePhoto1 = $artiste->getArtistePhoto1();
		$nbOeuvre = $artiste->getNbOeuvre();
		?>
		<div class="card border-info mt-2 mx-auto">
			<div class="card" style="width: 100%; height: 430px;">
				<img class="card-img-top mx-auto" style="height: 230px; width: 230px;" src="<?php echo $artistePhoto1 ?>" alt="Photo de l'artiste">
				<div class="card-body text-center">
					<h5 class="card-title"> <?php echo htmlspecialchars($idArtiste) ?></h5>
					<h6 class="card-subtitle mb-2 text-muted"> <?php echo htmlspecialchars($artistePrenom); echo htmlspecialchars($artisteNom)?> </h6>
					<p class="card-text"> <?php echo htmlspecialchars($artisteDescription)  ?> </p>
				</div>	
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalA">
					Supprimer votre compte
				</button>
				<!-- Modal -->
				<div class="modal fade" id="exampleModalA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelA" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabelA">Supprimer votre profil</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								Voulez-vous vraiment supprimer votre profil, cette action entrainera la suppression de toute vos oeuvres ainsi votre participation aux expositions.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<a type="button" class="btn btn-danger" href="index?controller=artiste&action=delete&artiste=<?php echo $idArtiste?>">Supprimer</a>
							</div>
						</div>
					</div>
				</div>

			</div>	
		</div>
	</div>
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
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal<?php echo $i ?>">
						Supprimer l'oeuvre
					</button>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $i ?>" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel<?php echo $i ?>">Supprimer l'oeuvre</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Voulez-vous vraiment supprimer l'oeuvre <?php echo $oeuvreName ?>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<a type="button" class="btn btn-danger" href="index.php?controller=oeuvre&action=delete&oeuvre=<?php echo $idOeuvre?>">Supprimer</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }	?>
	</div>
</div>

