<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title><?php if(!isset($y)){ echo $pageTitle;}else{echo "Gestionnaire";} ?></title>
      <link href="resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php?controller=oeuvre&action=readAll">La Poterie</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php?controller=Artiste&action=readAll">Artiste <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php?controller=oeuvre&action=readAll">Oeuvre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=exposition&action=readAll">Exposition</a>
                    </li>
                    <li>
                      <?php if($isConnect) {?>
                      <a href="index.php?controller=Artiste&action=myProfile" class="btn btn-outline-secondary btn-sm mt-1 ml-2 mr-2 " role="button" aria-pressed="true">Mon profile</a>
                      <?php }
                      else{?>
                      <a href="index.php?controller=Artiste&action=create" class="btn btn-outline-secondary btn-sm mt-1 ml-2 mr-2 " role="button" aria-pressed="true">Créer un compte</a>
                      <?php } ?>
                    </li>
                    <li>
                      <?php if($isConnect) {?>
                      <a href="index.php?controller=Artiste&action=disConnect" class="btn btn-outline-secondary btn-sm mt-1 ml-2 mr-2 " role="button" aria-pressed="true">Se déconnecter</a>
                      <?php }
                      else{?>
                      <a href="index.php?controller=Artiste&action=connect" class="btn btn-outline-secondary btn-sm mt-1 ml-2 mr-2 " role="button" aria-pressed="true">Se connecter</a>
                      <?php } ?>
                    </li>
                </ul>
            </div>
        </nav>