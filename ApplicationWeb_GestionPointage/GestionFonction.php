<?php ob_start(); ?>
<?php include("includes/Header.php");
include ('Fonction.php');
include ('FonctionDAO.php');
include ('FonctionService.php');
$resultat= array();
$fonctSev = new FonctionService();

if(!empty($_POST["code"] and !empty($_POST["nom"]) and !empty($_POST["desc"]))){
    $fonctSev->addFonctionService($_POST["code"],$_POST["nom"],$_POST["desc"]);
}

$resultat = $fonctSev->getAllFonctionService();
if(!empty($_POST["filter"])){
    $resultat = $fonctSev->getSerchedFonctionService($_POST["filter"]);
}
if(!empty($_POST["nvNom"]) and !empty($_POST["nvDesc"])){
    $fonctSev->editCategoryService($_POST["nvCode"],$_POST["nvNom"],$_POST["nvDesc"]);
    header("location:GestionFonction.php");
}
if(!empty($_GET["code"]) AND !empty($_GET["action"])){
    if ($_GET["action"] == "remove") {
        $fonctSev->removeService($_GET["code"]);
        header("location:gestionfonction.php");
    }
}

?>
    <!--body-->
        <body style="font-size:16px">
        <!--start header-->
        <div class="section__content section__content--p30" style="padding: 2%">
            <center><h1>Gestion des fonctions</h1></center>
        </div>
        <!--end header-->
        <!--start form focntion-->
            <div class="card">
                <div class="card-header">
                    <strong>Ajouter Une Fonction </strong>
                </div>

                <div class="card-body card-block" style="margin: auto">
                    <form action="" method="post" id="fonction">
                        <table>
                            <tr>
                                <td>
                                    <div class="col col-sm-8">
                                        <label for="nf-email" class=" form-control-label">Code :</label>
                                        <input type="text" id="nf-email" name="code" placeholder="Entrez le Code" class="form-control" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="col col-sm-12">
                                        <label for="nf-Nom" class=" form-control-label">Nom :</label>
                                        <input type="text" id="nf-Nom" name="nom" placeholder="Entrez le Nom" class="form-control" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <br>
                                    <div class="col col-sm-10">
                                        <label for="nf-Details" class=" form-control-label">Détails :</label>
                                        <textarea style="width: 121%" type="text" id="nf-Details" name="desc" placeholder="Décrivez La Fonction" class="form-control" required" ></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" form="fonction">
                        <i class="fa fa-dot-circle-o"></i> Ajouter
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm" form="fonction">
                        <i class="fa fa-ban"></i> Annuler
                    </button>
                </div>
            </div>
            <!--end form focntion-->
        <div style="background-color: whitesmoke">
            <center><br><h4><u>Liste Des Fonctions</u></h4><br></center>
        </div>
        <!-- Start Form Modification-->
        <?php
        if(!empty($_GET["code"]) AND !empty($_GET["action"])){
        if ($_GET["action"] == "edit") {
            $f = $fonctSev->getFonctionByCodeService($_GET["code"]);
        ?>
            <center>
            <div class="card" style="width: 70%">
                <div class="card-header" >
                    Modifiez la fonction choisi :
                </div>
                <div class="card-body card-block" >
                    <form action="" method="post" id="modification" class="form-horizontal">
                        <div class="row form-group">
                            <input type="hidden" value="<?php echo $f->getCode();?>" name="nvCode">
                            <div class="col col-sm-5">
                                <label for="input-small" class=" form-control-label">Nouveau nom :</label>
                            </div>
                            <div class="col col-sm-6">
                                <input type="text" id="input-small" value="<?php echo $f->getNom();?>" name="nvNom"  class="input-sm form-control-sm form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-sm-5">
                                <label for="input-small"  class=" form-control-label">Nouveaux Détails  :</label>
                            </div>
                            <div class="col col-sm-6">
                                <textarea id='input-small'  name='nvDesc' class="input-sm form-control-sm form-control"><?php echo $f->getDescription();?></textarea>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" form="modification">
                        <i class="fa fa-dot-circle-o"></i> Modifier
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm" form="modification">
                        <i class="fa fa-ban"></i> Annuler
                    </button>
                </div>
            </div>
            </center>
        <?php
                }
            }
        ?>

        <!-- end Form Modification-->

        <!-- Start Form Recherche-->
        <div class="col-lg-6" style="margin-left: 12%">
                <div class="card-body card-block">
                    <form action="" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-9">
                                <div class="input-group">
                                    <input type="text" id="input1-group2" name="filter" placeholder="" class="form-control">&nbsp;
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Rechercher</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
            <!-- END Form Recherche-->
            <!--Start table des focntions-->
            <div class="table-responsive table-responsive-data2">
                <center>
                    <table class="table table-data2" style="font-size:16px;width: 70%">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nom</th>
                                <th>Détails</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($resultat as $res){
                                echo  "<tr class='tr-shadow'>";
                                    echo "<td>".$res->getCode()."</td>";
                                    echo "<td>".$res->getNom()."</td>";
                                    echo "<td>".$res->getDescription()."</td>";
                                    echo "<td style='width: 11%'>
                                              <div style='margin-right: 10%'>
                                                    <div class='table-data-feature'>
                                                        <a href='?code=".$res->getCode()."&action=edit' class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                                            <i class='zmdi zmdi-edit'></i>
                                                        </a>
                                                        <a href='?code=".$res->getCode()."&action=remove' class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                            <i class='zmdi zmdi-delete'></i>
                                                        </a>
                                                    </div>
                                              </div>
                                        </td>
                                       </tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </center>
            </div><br>
        <!-- END DATA TABLE -->
    <!--end body-->
<?php include('includes/Footer.php') ?>
<?php ob_end_flush() ?>
