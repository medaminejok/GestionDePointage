<?php include('includes/Header.php');
include ('Departement.php');
include ('DepartementDAO.php');
include ('DepartementService.php');
$resultat= array();
$DeptSer = new DepartementService();
if(isset($_POST['submit'])){
if(!empty($_POST["num"] and !empty($_POST["nom"]) and !empty($_POST["descr"]))){
    $DeptSer->addDepartementService($_POST["num"],$_POST["nom"],$_POST["descr"]);
}
}
$resultat = $DeptSer->getAllDepartementService();
if(!empty($_POST["filter"])){
    $resultat = $DeptSer->getSerchedDepartementService($_POST["filter"]);
}
if(!empty($_POST["nvNom"]) and !empty($_POST["nvDescr"])){
    $DeptSer->editDepartementService($_POST["nvnum"],$_POST["nvNom"],$_POST["nvDescr"]);
}
if(!empty($_GET["num"]) AND !empty($_GET["action"])){
    if ($_GET["action"] == "remove") {
        $DeptSer->removeService($_GET["num"]);
        header("location:GestionDepartement.php");
    }
}

?>
<!--body-->
<body style="font-size:16px">
<!--start header-->
<section class="au-breadcrumb m-t-75" style="background-color: whitesmoke">
    <div class="section__content section__content--p30">
        <center><h1>Gestion des Departements</h1></center>
    </div>
</section>
<!--end header-->
<!--start form focntion-->
<div class="card">
    <div class="card-header">
        <strong>Ajouter Une Departement </strong>
    </div>

    <div class="card-body card-block">
        <form action="" method="post" id="Departement">
            <table>
                <td>
                    <div class="col col-sm-10">
                        <label for="dp-num" class=" form-control-label">Num :</label>
                        <input type="text" id="dp-num" name="num" placeholder="Entrer Num" class="form-control" required>
                    </div>
                </td>
                <td>
                    <div class="col col-sm-10">
                        <label for="dp-Nom" class=" form-control-label">Nom :</label>
                        <input type="text" id="dp-Nom" name="nom" placeholder="Entrer Nom" class="form-control" required>
                    </div>
                </td>
                <td>
                    <div class="col col-sm-6">
                        <label for="dp-descr" class=" form-control-label">Description :</label>
                        <textarea style="width: 300px;height: 40px"  id="dp-descr" name="descr" placeholder="Entrer une Description"   cols="2px" rows="1px" class="form-control" required ></textarea>
                    </div>
                </td>
            </table>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm" form="Departement" name="submit">
            <i class="fa fa-dot-circle-o"></i> Ajouter
        </button>
        <button type="reset" class="btn btn-danger btn-sm" form="Departement">
            <i class="fa fa-ban"></i> Annuler
        </button>
    </div>
</div>
<!--end form focntion-->
<div style="background-color: whitesmoke">
    <center><br><h4><u>Liste Des Departements</u></h4><br></center>
</div>
<!-- Start Form Modification-->
<?php
if(!empty($_GET["num"]) AND !empty($_GET["action"])){
    if ($_GET["action"] == "edit") {
        $f = $DeptSer->getDepartementByNumService($_GET["num"]);
        ?>
        <center>
            <div class="card" style="width: 50%">
                <div class="card-header" >
                    Modifiez le Departement choisi :
                </div>
                <div class="card-body card-block" >
                    <form action="" method="post" id="modification" class="form-horizontal">
                        <div class="row form-group">
                            <input type="hidden" value="<?php echo $f->getNum();?>" name="nvnum">
                            <div class="col col-sm-5">
                                <label for="input-small" class=" form-control-label">Nouveau nom :</label>
                            </div>
                            <div class="col col-sm-6">
                                <input type="text" id="input-small" value="<?php echo $f->getNom();?>" name="nvNom"  class="input-sm form-control-sm form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-sm-5">
                                <label for="input-small"  class=" form-control-label">Nouvelle Description :</label>
                            </div>
                            <div class="col col-sm-6">
                                <textarea  id="input-small" name="nvDescr" style="-moz-appearance: textfield"  class="input-sm form-control-sm form-control"><?php echo $f->getDescr();?></textarea>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" form="modification" name="submit">
                        <i class="fa fa-edit"></i> Modifier
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
<div class="col-lg-6" style="margin-left: 12.5%">
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-9">
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
                <th>Num</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($resultat as $res){
                echo  "<tr class='tr-shadow'>";
                echo "<td>".$res->getNum()."</td>";
                echo "<td>".$res->getNom()."</td>";
                echo "<td>".$res->getDescr()."</td>";
                echo "<td style='width: 11%'>
                                              <div style='margin-right: 10%'>
                                                    <div class='table-data-feature'>
                                                        <a href='?num=".$res->getNum()."&action=edit' class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                                            <i class='zmdi zmdi-edit'></i>
                                                        </a>
                                                        <a href='?num=".$res->getNum()."&action=remove' class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
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
