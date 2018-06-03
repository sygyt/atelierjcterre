<div class="container">
	<div class="row">
		<?php $idExposition = $exposition->getIdExposition();
		$expositionName = $exposition->getExpositionName();
		$expositionDescription = $exposition->getExpositionDescription();
		$expositionDate = date_create($exposition->getExpositionDate());
		$expositionLieux = $exposition->getExpositionLieux();
		$idArtiste = $exposition->getIdArtiste(); ?>
		<div class="card" style="width: 100%;">
			<div class="card-body text-center">
				<h5 class="card-title"><?php echo htmlspecialchars($expositionName)?> </h5>
				<h6 class="card-subtitle mb-2 text-muted">Date : <?php echo date_format($expositionDate,'d/m/y') ?> </h6>
				<h6 class="card-subtitle mb-2 text-muted">Lieux : <?php echo htmlspecialchars($expositionLieux) ?> </h6>
				<h6 class="card-subtitle mb-2 text-muted">Cette exposition est proposé par <?php echo htmlspecialchars($idArtiste) ?></h6>
				<p class="card-text"> <?php echo htmlspecialchars($expositionDescription)  ?> </p>
			</div>
			<?php if($isConnect) { 
				if($idArtiste==$idArtisteOnPage) { ?>


					<a class="btn btn-light" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
						modifier l'exposition
					</a>
					<div class="collapse" id="collapseExample">
						<div class="card card-body">
							<form method="post" action="index.php?controller=exposition&action=update&exposition=<?php echo $idExposition?>" enctype="multipart/form-data">
								<fieldset>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="lieux">Lieux de l'exposition</label>
											<input type="text" class="form-control" id="lieux" name="expositionLieux" placeholder="">
										</div>
										<div class="form-group col-md-6">
											<label for="dt">Date de l'exposition</label>
											<input type="date" class="form-control" id="dt" name="expositionDate" placeholder="">
										</div>
									</div>
									<input type="submit" value="Envoyer" name="submit">
								</fieldset>
							</form>
						</div>
					</div>

					<a href="index.php?controller=exposition&action=delete&exposition=<?php echo $idExposition?>" class="btn btn-light">Supprimer l'exposition</a>

				<?php } ?>
			<?php } ?>
			<div class="table-responsive" style="width: 100%;">
				<table class="table">
					<caption>Liste des artistes présent à l'exposition</caption>
					<thead>
						<tr>
							<th scope="col"></th>
							<th scope="col">Nom</th>
							<th scope="col">Prenom</th>
							<th scope="col">Pseudo</th>
						</tr>
					</thead>
					<tbody>

						<?php $participe=false;
						foreach ($tab_a as $i =>$v){
							$idArtiste = $v->getIdArtiste();
							$artisteNom = $v->getArtisteNom();
							$artistePrenom = $v->getArtistePrenom();?>
							<tr>
								<th scope="row"> <?php echo  ($i+1) ?> </th>
								<td> <?php echo $artisteNom ?> </td>
								<td> <?php echo $artistePrenom ?> </td>
								<td>
									<a href="index.php?controller=artiste&action=read&artiste=<?php echo $idArtiste?>" > <?php echo ("@".$idArtiste) ?> </a>
								</td>
							</tr>
							<?php if ($idArtiste==$idArtisteOnPage){
								$participe=true;
							}
						} ?>
					</tbody>
				</table>		
			</div>
			<?php if($isConnect) { 
				if($participe) { ?>
					<a href="index.php?controller=present&action=delete&exposition=<?php echo $idExposition ?>" class="btn btn-light text-danger">Ne plus participer</a>	
				<?php } else { ?>
					<a href="index.php?controller=present&action=add&exposition=<?php echo $idExposition?>" class="btn btn-light">participer à l'exposition</a>	
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>
