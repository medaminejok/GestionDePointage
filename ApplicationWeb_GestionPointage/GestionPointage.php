
<?php include('includes/Header.php') ;
include ('Pointage.php');
include ('PointageDAO.php');
include ('PointageService.php');
$resultat= array();
$PointSev = new PointageService();
if(!empty($_POST["date"]) and !empty($_POST["time"]) and !empty($_POST["type"])){
    $PointSev->addPointageService($_POST["date"],$_POST["time"],$_POST["type"]);
}

$resultat = $PointSev->getAllPointageService();
if(!empty($_POST["filter"])){
    $resultat = $PointSev->getSerchedPointageService($_POST["filter"]);
}
if(!empty($_POST["nvDate"]) and !empty($_POST["nvHeure"]) and !empty($_POST["nvType"])){
    $PointSev->editPointageService($_POST["id"],$_POST["nvDate"],$_POST["nvHeure"],$_POST["nvType"]);
}
if(!empty($_GET["id"]) AND !empty($_GET["action"])){
    if ($_GET["action"] == "remove") {
        $PointSev->RemovePointageService($_GET["id"]);
        header("location:GestionPointage.php");
    }
}
?>
    <!--body-->
        <body style="font-size:16px">
        <!--start header-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <center><h1>Gestion de Pointage</h1></center>
                </div>
            </section>
        <!--end header-->
        <!--start form focntion-->
            <div class="card">
                <div class="card-header">

                    <strong>Ajouter Un Pointage </strong>
                </div>

                <div class="card-body card-block">
                    <form action="" method="post" id="Pointage">
                        <table>
                            <td>
                                <div class="col col-sm-10" >
                                    <label for="date" class=" form-control-label">Date:</label>
                                    <input type="date" id="date" name="date" class="form-control" required style="width:150px">
                                </div>
                            </td>
                            <td>
                                <div class="col col-sm-10" style="width:200px">
                                    <label for="heure" class=" form-control-label">Heure:</label>
                                    <input type="time" id="input-small" VALUE="<?php echo date_timestamp_get();?>" name="time" style="-moz-appearance: textfield" class="form-control" required style="width:150px" >
                                </div>
                            </td>
                             <td>
                                <div class="col col-sm-10" style="width:200px">
                                    <label for="type" class=" form-control-label">Type:</label>
                                    <select  id="type"  name="type" class="form-control" required style="width:150px" >
                                    <option selected>Entrée</option>
                                    <option>Sortie</option>
                                </div>
                            </td>
                        </table>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" form="Pointage" name="Ajouter">
                        <i class="fa fa-dot-circle-o"></i> Ajouter
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm" form="Pointage">
                        <i class="fa fa-ban"></i> Annuler
                    </button>
                </div>
            </div>
            <!--end form focntion-->
        <div style="background-color: white">
            <center><br><h4><u>Liste Des Pointages</u></h4><br></center>
        </div>
        <?php
        if(!empty($_GET["id"]) AND !empty($_GET["action"])){
        if ($_GET["action"] == "edit") {
        $f = $PointSev->getPointageByIdService($_GET["id"]);
        ?>
        <center>
            <div class="card" style="width: 50%">
                <div class="card-header" >
                    Modifiez le Pointage choisi :
                </div>
                <div class="card-body card-block" >
                    <form action="" method="post" id="modification" class="form-horizontal">
                        <div class="row form-group">
                            <input type="hidden" value="<?php echo $f->getIdP();?>" name="nvId">
                            <div class="col col-sm-5">
                                <label for="input-small" class=" form-control-label">Nouvelle Date :</label>
                            </div>
                            <div class="col col-sm-6">
                                <input type="date" id="input-small" value="<?php echo $f->getDateP();?>" name="nvDate"  class="input-sm form-control-sm form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-sm-5">
                                <label for="input-small"  class=" form-control-label">Nouvelle Heure :</label>
                            </div>
                            <div class="col col-sm-6">
                                <input type="time" id="input-small" value="<?php echo $f->getHeureP();?>" name="nvHeure" style="-moz-appearance: textfield"  class="input-sm form-control-sm form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-sm-5">
                                <label for="input-small"  class=" form-control-label">Nouveau Type :</label>
                            </div>
                            <div class="col col-sm-6">
                                <input type="text" id="input-small" value="<?php echo $f->getTypeP();?>" name="nvType" style="-moz-appearance: textfield"  class="input-sm form-control-sm form-control">
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
        <!--Recherche-->
        <div class="col-lg-6" style="margin-left: 12.5%">
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
            <!--Start table des pontages-->
        <div class="table-responsive table-responsive-data2">
            <center>
                <table class="table table-data2" style="font-size:16px;width: 70%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($resultat as $res){
                        echo  "<tr class='tr-shadow'>";
                        echo "<td>".$res->getIdP()."</td>";
                        echo "<td>".$res->getDateP()."</td>";
                        echo "<td>".$res->getHeureP()."</td>";
                        echo "<td>".$res->getTypeP()."</td>";
                        echo "<td style='width: 11%'>
                                              <div style='margin-right: 10%'>
                                                    <div class='table-data-feature'>
                                                        <a href='?id=".$res->getIdP()."&action=edit' class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                                            <i class='zmdi zmdi-edit'></i>
                                                        </a>
                                                        <a href='?id=".$res->getIdP()."&action=remove' class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
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

<?php include('includes/Footer.php'); ?>