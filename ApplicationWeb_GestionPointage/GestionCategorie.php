<?php ob_start(); ?>
<?php include('includes/Header.php');
include ('Categorie.php');
include ('CategorieDAO.php');
include ('CategorieService.php');
$resultat= array();
$CateSev = new CategorieService();

if(!empty($_POST["code"] and !empty($_POST["lib"]) and !empty($_POST["salaire"]))){
    $CateSev->addCategorieService($_POST["code"],$_POST["lib"],$_POST["salaire"]);
}

$resultat = $CateSev->getAllCategorieService();
if(!empty($_POST["filter"])){
    $resultat = $CateSev->getSerchedCategorieService($_POST["filter"]);
}
if(!empty($_POST["nvlib"]) and !empty($_POST["nvsalaire"])){
    $CateSev->editCategorieService($_POST["nvCode"],$_POST["nvlib"],$_POST["nvsalaire"]);
    header("location:gestionCategorie.php");
}
if(!empty($_GET["code"]) AND !empty($_GET["action"])){
    if ($_GET["action"] == "remove") {
        $CateSev->removeService($_GET["code"]);
        header("location:gestionCategorie.php");
    }
}

?>
    <!--body-->
    <body style="font-size:16px">
    <!--start header-->
    <div class="section__content section__content--p30" style="padding: 2%">
        <center><h1>Gestion Des Categories</h1></center>
    </div>
    <!--end header-->
    <!--start form focntion-->
    <div class="card">
        <div class="card-header">
            <strong>Ajouter Une Categorie </strong>
        </div>

        <div class="card-body card-block">
            <form action="" method="post" id="Categorie">
                <table>
                    <td>
                        <div class="col col-sm-10">
                            <label for="nf-email" class=" form-control-label">Code :</label>
                            <input type="text" id="nf-email" name="code" placeholder="Enter Code" class="form-control" required>
                        </div>
                    </td>
                    <td>
                        <div class="col col-sm-10">
                            <label for="nf-lib" class=" form-control-label">Libelle :</label>
                            <input type="text" id="nf-lib" name="lib" placeholder="Enter lib" class="form-control" required>
                        </div>
                    </td>
                    <td>
                        <div class="col col-sm-6">
                            <label for="nf-Salaire" class=" form-control-label">Salaire:</label>
                            <input type="number" id="nf-Salaire" name="salaire" placeholder="salaire" class="form-control" required style="-moz-appearance: textfield">
                        </div>
                    </td>
                </table>
            </form>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm" form="Categorie">
                <i class="fa fa-dot-circle-o"></i> Ajouter
            </button>
            <button type="reset" class="btn btn-danger btn-sm" form="Categorie">
                <i class="fa fa-ban"></i> Annuler
            </button>
        </div>
    </div>
    <!--end form focntion-->
    <div style="background-color: whitesmoke">
        <center><br><h4><u>Liste Des Categories</u></h4><br></center>
    </div>
    <!-- Start Form Modification-->
    <?php
    if(!empty($_GET["code"]) AND !empty($_GET["action"])){
        if ($_GET["action"] == "edit") {
            $C = $CateSev->getCategorieByCodeService($_GET["code"]);
            ?>
            <center>
                <div class="card" style="width: 50%">
                    <div class="card-header" >
                        Modifiez la Categorie choisie :
                    </div>
                    <div class="card-body card-block" >
                        <form action="" method="post" id="modification" class="form-horizontal">
                            <div class="row form-group">
                                <input type="hidden" value="<?php echo $C->getCode();?>" name="nvCode">
                                <div class="col col-sm-5">
                                    <label for="input-small" class=" form-control-label">Nouveau libelle :</label>
                                </div>
                                <div class="col col-sm-6">
                                    <input type="text" id="input-small" value="<?php echo $C->getLibelle();?>" name="nvlib"  class="input-sm form-control-sm form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-5">
                                    <label for="input-small"  class=" form-control-label">Nouveau salaire de base :</label>
                                </div>
                                <div class="col col-sm-6">
                                    <input type="number" id="input-small" value="<?php echo $C->getSalaire();?>" name="nvsalaire" style="-moz-appearance: textfield"  class="input-sm form-control-sm form-control">
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
    <div class="col-lg-6">
        <div class="card-body card-block">
            <form action="" method="post" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <input type="text" id="input1-group2" name="filter" placeholder="" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Rechercher</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Start table des focntions-->
    <div class="table-responsive table-responsive-data2">
        <center>
            <table class="table table-data2" style="font-size:16px;width: 70%">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Libelle</th>
                    <th>Salaire </th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($resultat as $res){
                    echo  "<tr class='tr-shadow'>";
                    echo "<td>".$res->getCode()."</td>";
                    echo "<td>".$res->getLibelle()."</td>";
                    echo "<td>".$res->getSalaire()."</td>";
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
    </body>
    <!--end body-->
<?php include('includes/Footer.php') ?>
<?php ob_end_flush(); ?>
