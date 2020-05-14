<?php include('includes/Header.php');

include ('Departement.php');
include ('DepartementDAO.php');
include ('DepartementService.php');

include ('Categorie.php');
include ('CategorieDAO.php');
include ('CategorieService.php');

include ('Fonction.php');
include ('FonctionDAO.php');
include ('FonctionService.php');

include ('Employe.php');
include ('EmployeDAO.php');
include ('EmployeService.php');

$listFonction= array();
$fonctSev = new FonctionService();
$listFonction = $fonctSev->getAllFonctionService();

$listDepart = array();
$deptSev = new DepartementService();
$listDepart = $deptSev->getAllDepartementService();

$listCat = array();
$catSev = new CategorieService();
$listCat = $catSev->getAllCategorieService();

$empSev =  new EmployeService();

if( !empty($_POST["code"]) and !empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["dateNais"]) and
    !empty($_POST["tel"]) and !empty($_POST["email"]) and !empty($_POST["passwd"]) and !empty($_POST["adresse"]) and
    !empty($_POST["nbrEnf"]) and !empty($_POST["sexe"]) and
    !empty($_POST["Depart"]) and !empty($_POST["Fonct"]) and !empty($_POST["categ"]) and !empty($_POST["photo"])){

    $empSev->addEmployeService(
        $_POST["code"],
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["dateNais"],
        $_POST["tel"],
        $_POST["email"],
        $_POST["sexe"],
        $_POST["adresse"],
        $_POST["nbrEnf"],
        $_POST["passwd"],
        $_POST["photo"],
        $_POST["role"],
        $_POST["dateRecrutement"],
        $_POST["Fonct"],
        $_POST["categ"],
        $_POST["Depart"]
    );

}

?>
<!--body-->
<body style="font-size:16px">
<!--start header-->
<section class="au-breadcrumb m-t-75" style="background-color: whitesmoke">
    <div class="section__content section__content--p30">
        <cEntrer><h1>Gestion des Employes</h1></cEntrer>
    </div>
</section>
<!--end header-->
<!--start form focntion-->
<div class="card">
    <div class="card-header">
        <strong>Ajouter Un Employe </strong>
    </div>

    <div class="card-body card-block">
        <form action="" method="post" id="Employe">
            <table>
                <tr>
                <td>
                    <div class="col col-sm-10">
                        <label for="nf-email" class=" form-control-label">CIN :</label>
                        <input type="text" id="nf-email" name="code" placeholder="Entrer CIN" class="form-control" required>
                    </div>
                </td>
                <td>
                    <div class="col col-sm-10">
                        <label for="nf-Nom" class=" form-control-label">Nom :</label>
                        <input type="text" id="nf-Nom" name="nom" placeholder="Entrer Nom" class="form-control" required>
                    </div>
                </td>
                <td>
                    <div class="col col-sm-10">
                        <label for="nf-prenome" class=" form-control-label">Prénom :</label>
                        <input type="text" id="nf-prenom" name="prenom" placeholder="Entrer Prénom" class="form-control" required style="-moz-appearance: textfield">
                    </div>
                </td>
                </tr>
                <tr>
                    <td>
                        <div class="col col-sm-10">
                            <label for="sexe" class=" form-control-label">Sexe :</label>
                            <select id="sexe" name="sexe"  class="form-control" required>
                                <option>Homme</option>
                                <option>Femme</option>
                        </div>
                    </td>
                    <td>
                        <div class="col col-sm-10">
                            <label for="nf-date" class=" form-control-label">Date de Naissance :</label>
                            <input type="date" id="nf-date" name="dateNais"  class="form-control" required>
                        </div>
                    </td>
                    <td>

                        <div class="col col-sm-10">
                            <label for="telef" class=" form-control-label">Télephone:</label>
                            <input type="tel" id="telef" name="tel"  class="form-control" required>
                        </div>
                    </td>

                </tr>
                <tr>
                    <td>
                        <div class="col col-sm-10">
                            <label for="email" class=" form-control-label">Email:</label>
                            <input type="email" id="email" name="email" placeholder=" Entrer email" class="form-control" required style="-moz-appearance: textfield">
                        </div>
                    </td>
                    <td>
                        <div class="col col-sm-10">
                            <label for="passwd" class=" form-control-label">Password:</label>
                            <input type="password" id="passwd" name="passwd" placeholder=" Entrer Password" class="form-control" required style="-moz-appearance: textfield">
                        </div>
                    </td>
                    <td>
                    <div class="col col-sm-10">
                        <label for="adresse" class=" form-control-label">Adresse :</label>
                        <input type="text" id="adresse" name="adresse" placeholder="Entrer Adresse"  class="form-control" required>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col col-sm-6">
                            <label for="nbrenfant" class=" form-control-label">Nombre Enfants:</label>
                            <input type="number" name="nbrEnf" id="nbrEnf" class="form-control" value="1" min="0" max="10" oninput="nbrOutputId.value = nbrInputId.value">

                        </div>
                    </td>
                    <td>
                        <div class="col col-sm-10">
                            <label for="role" class=" form-control-label">Role:</label>
                            <select id="role" name="role"  class="form-control" >
                                <option>selectionne un role</option>
                                <option>Admin</option>
                                <option>Super Admin</option>
                                <option>Employe</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="col col-sm-10">
                            <label for="dateRecrutement" class=" form-control-label">Date Recrutement :</label>
                            <input type="date" id="dateRecrutement" name="dateRecrutement"   class="form-control" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col col-sm-10">
                            <label for="Departement class=" form-control-label">Département:</label>
                            <select id="Departement " name="Depart"  class="form-control" >
                                <option>Choisi un Departement</option>
                                <?php
                                    foreach ($listDepart as $d){
                                        echo "<option value='".$d->getNum()."'>".$d->getNom()."</option>";
                                    }
                                ?>

                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="col col-sm-10">
                            <label for="Fonction" class=" form-control-label">Fonction:</label>
                            <select id="Fonction" name="Fonct"  class="form-control"  >
                                <option>Choisi une Fonction</option>
                                <?php
                                    foreach ($listFonction as $f){
                                        echo "<option value='".$f->getCode()."'>".$f->getNom()."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="col col-sm-10">
                            <label for="categorie" class=" form-control-label">Catégorie:</label>
                            <select id="categorie" name="categ"  class="form-control" >
                                <option>Choisi une Categorie</option>
                                <?php
                                foreach ($listCat as $c){
                                    echo "<option value='".$c->getCode()."'>".$c->getlibelle()."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                       <center><div class="col col-sm-6">
                            <label for="photo" class=" form-control-label" style="margin-left: 0px !important;">Photo :</label>
                            <input type="file" id="photo" name="photo" class="form-control" required  >
                        </div>
                       </center>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm" form="Employe">
            <i class="fa fa-dot-circle-o"></i> Ajouter
        </button>
        <button type="reset" class="btn btn-danger btn-sm" form="Employe">
            <i class="fa fa-ban"></i> Annuler
        </button>
    </div>
</div>
<!--end form focntion-->
<div style="background-color: whitesmoke">
    <cEntrer><br><h4><u>Liste Des Employes</u></h4><br></cEntrer>
</div>
<!-- Start Form Modification-->
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
                <th>Nom</th>
                <th>Salaire De Base</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            /*
            foreach ($resultat as $res){
                echo  "<tr class='tr-shadow'>";
                echo "<td>".$res->getCode()."</td>";
                echo "<td>".$res->getNom()."</td>";
                echo "<td>".$res->getMontant()."</td>";
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
            }*/
            ?>
            </tbody>
        </table>
    </center>
</div><br>
<!-- END DATA TABLE -->
</body>
<!--end body-->
<?php include('includes/Footer.php') ?>
