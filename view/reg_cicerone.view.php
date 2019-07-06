<?php 

include "../controller_users.php";

if(isset($_POST['username_cic'])){
  registraCicerone($_POST);
}

$metodiPagamento = getPayments();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registrazione Cicerone</title>
  <link rel="stylesheet" href="../majestic-master/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../majestic-master/vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="../majestic-master/css/style.css"/>
  <link rel="stylesheet" type="text/css" href="../css/my_style.css"/>
  <link rel="shortcut icon" href="../majestic-master/images/favicon.png"/>
</head>
<body>
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Registrati come <b>Cicerone</b>!</h4>
            <div class="col-sm-9">
              <div class="<?php echo 'row '.$already_exists; ?> text-center" id="utente_esistente">
                <label class="text-danger">Username gi&agrave; in uso. <a href="login.view.php"><i class="mdi mdi-login-variant"></i>Accedi per continuare</a></label>
              </div>
            </div>
            <form class="forms-sample" id="form_register_gt" name="form_register_cic" action="reg_cic.view.php" method="post">
              <div class="form-group row">
                <label for="username_cic" class="col-sm-3 col-form-label">Nome utente</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="username_cic" name="username_cic" placeholder="Username" required="">
                  <div class="row hidden" id="invalid_username_cic">
                  	<label class="text-warning">Nome utente mancante o non valido</label>
                  </div>
                </div>
              </div>              
              <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
                  <div class="row hidden" id="invalid_password">
                  	<label class="text-warning">Password mancante</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="conferma_password" class="col-sm-3 col-form-label">Conferma Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="conferma_password" name="conferma_password" placeholder="Conferma password" required="">
                  <div class="row hidden" id="invalid_conferma_password">
                  	<label class="text-warning">Password mancante o non corrispondenti</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                  <div class="row hidden" id="invalid_email">
                  	<label class="text-warning">Email non valida o mancante</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="nome" class="col-sm-3 col-form-label">Nome</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="">
                  <div class="row hidden" id="invalid_nome">
                  	<label class="text-warning">Nome mancante</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="cognome" class="col-sm-3 col-form-label">Cognome</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome" required="">
                  <div class="row hidden" id="invalid_cognome">
                  	<label class="text-warning">Cognome mancante</label>
                  </div>
                </div>
              </div>
              <div class="col-md-10">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Sesso</label>
                  <div class="col-sm-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="sesso" id="sex_male" value="m" checked>
                        Maschio
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="sesso" id="sex_female" value="f">
                        Femmina
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="sesso" id="sex_other" value="o">
                        Altro
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="data_nascita" class="col-sm-3 col-form-label">Data di Nascita</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="data_nascita" name="data_nascita" placeholder="dd/mm/yy" required="">
                  <div class="row hidden" id="invalid_username">
                  	<label class="text-warning">Data di nascita mancante</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Metodi Pagamento</label>
                    <div class="col-sm-9">
                      <select class="form-control">
                        <?php for ($i=0; $i < sizeof($metodiPagamento); $i++) { ?>

                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              <button type="button" class="btn btn-primary mr-2" onclick="onSubmit()" id="btn_reg_gt" name="btn_reg_gt">Registrati</button>
              <button class="btn btn-light">Cancella</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
 <script src="../majestic-master/vendors/base/vendor.bundle.base.js"></script>
  <script src="../majestic-master/js/off-canvas.js"></script>
  <script src="../majestic-master/js/hoverable-collapse.js"></script>
  <script src="../majestic-master/js/template.js"></script>
  <script src="../majestic-master/js/file-upload.js"></script>
  <script type="text/javascript" src="../js/reg_gt.js"></script>
</html>