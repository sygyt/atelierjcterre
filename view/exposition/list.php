<?php if($isConnect) { ?>
<div class="row">
	<div class="col-lg-12 col-md-12 mt-2 text-center">
		<a href="index?controller=exposition&action=add" class="btn btn-outline-secondary btn-lg mt-1 ml-2 mr-2 " role="button" aria-pressed="true">Ajouter une exposition</a>
	</div>
</div>
<?php } ?>
<div class="container">
	<div class="row">
		<?php foreach ($tab_e as $i =>$v){
			$idExposition = $v->getIdExposition();
			$expositionName = $v->getExpositionName();
			$expositionDescription = $v->getExpositionDescription();
			$expositionDate = date_create($v->getExpositionDate());
			$expositionLieux = $v->getExpositionLieux();
			$idArtiste = $v->getIdArtiste(); ?>
			<div class="col-lg-6 col-md-6 mt-2">
				<div class="card" style="width: 100%; height: 100%;">
					<div class="card-body text-center">
						<h5 class="card-title"><?php echo htmlspecialchars($expositionName)?> </h5>
						<h6 class="card-subtitle mb-2 text-muted">Le <?php echo date_format($expositionDate,'d/m/y') ?> à <?php echo htmlspecialchars($expositionLieux) ?> </h6>
						<p class="card-text"> <?php echo htmlspecialchars($expositionDescription)  ?> </p>
					</div>
					<?php if($isConnect) { 
						if($idArtiste==$idArtisteOnPage) { ?>
							<a href="index?controller=exposition&action=delete&exposition=<?php echo $idExposition?>" class="btn btn-light">Supprimer l'exposition</a>	
						<?php } else { ?>
							<a href="index?controller=present&action=add&exposition=<?php echo $idExposition?>" class="btn btn-light">participer à l'exposition</a>	
						<?php } ?>
					<?php } ?>
					<a href="index?controller=exposition&action=read&exposition=<?php echo $idExposition?>" class="btn btn-light">Plus d'info</a> 
				</div>
			</div>
		<?php }	?>
	</div>
</div>