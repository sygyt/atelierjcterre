<div class="container">

  <div class="row">
    <div class="card border-info mt-2 mx-auto" style="width: 80%;">
      <div class="card-header text-center"><?php echo($oeuvreName) ?></div>
      <div class="card-body text-center">
        <h6 class="card-subtitle mb-2 text-muted">Réalisation de <?php echo($artiste->getArtisteNom()); echo" ".($artiste->getArtistePrenom()) ?></h6>
        <?php if (!empty($oeuvreDateCreation)) { ?>
          <h6 class="card-subtitle mb-2 text-muted">En : <?php echo $oeuvreDateCreation ?></h6>
        <?php } ?>
        <p class="card-text"> <?php echo($oeuvreDescription) ?> </p>
        <p>
          <a class="btn btn-light" data-toggle="collapse" href="#type" role="button" aria-expanded="false" aria-controls="collapseExample">
            <?php if ($type){ echo($type->getTypeLibele()); } ?>
          </a>
        </p>
        <div class="collapse" id="type">
          <div class="card card-body">
            <?php if ($type){ echo($type->getTypeDescription()); } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="mx-auto">


      <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg">
          <li class="page-item"><a class="btn btn-light btn-lg " data-toggle="collapse" href="#Photo1" role="button" aria-expanded="false" aria-controls="collapseExample">
            Photo1</a></li>
          <li class="page-item"><a class="btn btn-light btn-lg" data-toggle="collapse" href="#Photo2" role="button" aria-expanded="false" aria-controls="collapseExample">
            Photo2
          </a></li>
          <li class="page-item"><a class="btn btn-light btn-lg" data-toggle="collapse" href="#Photo3" role="button" aria-expanded="false" aria-controls="collapseExample">
            Photo3
          </a></li>
          <li class="page-item"><a class="btn btn-light btn-lg" data-toggle="collapse" href="Photo4" role="button" aria-expanded="false" aria-controls="collapseExample">
            Photo4
          </a></li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="mx-auto">
      <div class="collapse" id="Photo1">
        <div class="card card-body">
          <img src="<?php echo $oeuvrePhoto1?>" class="img-fluid" alt="Photo de la poterie">
        </div>
      </div>
      <div class="collapse" id="Photo2">
        <div class="card card-body">
          <img src="<?php echo $oeuvrePhoto2?>" class="img-fluid" alt="Photo de la poterie">
        </div>
      </div>
      <div class="collapse" id="Photo3">
        <div class="card card-body">
          <img src="<?php echo $oeuvrePhoto3?>" class="img-fluid" alt="Photo de la poterie">
        </div>
      </div>
      <div class="collapse" id="Photo4">
        <div class="card card-body">
          <img src="<?php echo $oeuvrePhoto4?>" class="img-fluid" alt="Photo de la poterie">
        </div>
      </div>
    </div>
  </div>
</div>
