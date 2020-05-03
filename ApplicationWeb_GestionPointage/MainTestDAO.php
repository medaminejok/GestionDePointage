<html>
<body>
<?php
include ('Fonction.php');
include ('FonctionDAO.php');
include ('FonctionService.php');

$fonctSev = new FonctionService();
$resultat = $fonctSev->getSerchedFonctionService('d');
function affiche($x){
    echo "<table>
        <tr>
            <td>Code</td>
            <td>Nom</td>
            <td>Montant</td>
        </tr>";
    foreach ($x as $res){
        echo "<tr>";
        echo "<td>".$res->getCode()."</td>";
        echo "<td>".$res->getNom()."</td>";
        echo "<td>".$res->getMontant()."</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br><br>";
}
affiche($resultat);


//==================================================== TEST FONCTION_Service ===========================================

/*---------------------------------------------test de recuperation des donnée------------------------- ca marche
$fonctSev = new FonctionService();
$resultat = $fonctSev->getSerchedFonctionService('d');
affiche($resultat);
-------------------------------------------------------------------------------------------*/

/*---------------------------------------------test de suppression------------------------- ca marche
$fonctSev->removeService('F5','mm','5000');
$resultat = $fonctSev->getAllFonctionService();
affiche($resultat);
-------------------------------------------------------------------------------------------*/

/*---------------------------------------------test de modification------------------------- ca marche
$fonctSev = new FonctionService();
$resultat = $fonctSev->getAllFonctionService();

affiche($resultat);
$fonctSev->editCategoryService('F5','mm','5000');
$resultat = $fonctSev->getAllFonctionService();
affiche($resultat);
-------------------------------------------------------------------------------------------*/

/*---------------------------------------------test de recuperation des donnée------------------------- ca marche
$fonctSev = new FonctionService();
$resultat = $fonctSev->getAllFonctionService();
affiche($resultat);
-------------------------------------------------------------------------------------------*/
/*---------------------------------------------test d'addition------------------------- ca marche
$fonctSev = new FonctionService();
$fonctSev->addFonctionService('F5','Mm','5000');
$resultat = $fonctSev->getAllFonctionService();
-------------------------------------------------------------------------------------------*/

//==================================================== TEST FONCTION_DAO ===============================================
// $fonctionDAO = new FonctionDAO();
/*----------------------------------affichage---------------------------------------------- ca marche
$resultat = $fonctionDAO->getAllFonction();
function affiche($x){
    echo "<table>
        <tr>
            <td>Code</td>
            <td>Nom</td>
            <td>Montant</td>
        </tr>";
    foreach ($x as $res){
        echo "<tr>
            <td>$res->code</td>
            <td>$res->nom</td>
            <td>$res->montant</td>
          </tr>";
    }
or
    foreach ($resultat as $res){
        echo "<tr>";
        echo "<td>".$res->getCode()."</td>";
        echo "<td>".$res->getNom()."</td>";
        echo "<td>".$res->getMontant()."</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br><br>";
}
affiche($resultat);
------------------------------------------------------------------------------------------ */
/*---------------------------------------------test d'addition------------------------- ca marche

$f1 = new Fonction('F1','Dev','10000');
$f2 = new Fonction('F2','DB','9000');
$f3 = new Fonction('F3','Res','8000');
$f4 = new Fonction('F4','Tel','60000');
$fonctionDAO->addFonction($f1);
$fonctionDAO->addFonction($f2);
$fonctionDAO->addFonction($f3);
$fonctionDAO->addFonction($f4);
$resultat = $fonctionDAO->getAllFonction();//2eme recuperation des données
affiche($resultat);
-------------------------------------------------------------------------------------------*/
/*---------------------------------------------test de modification------------------------- ca marche

$fonctionDAO->editFonction('F4',new Fonction('F4','Tc','6000'));
$resultat = $fonctionDAO->getAllFonction();//2eme recuperation des données
affiche($resultat);
-------------------------------------------------------------------------------------------*/
/*---------------------------------------------test de suppression-------------------------- ca marche

affiche($resultat); //pour afficher avant la suppression
$fonctionDAO->removeFonction('F3');
$resultat = $fonctionDAO->getAllFonction();//2eme recuperation des données
affiche($resultat);//pour afficher apres la suppression
-------------------------------------------------------------------------------------------*/
//====================================================END TEST FONCTION_DAO ============================================
?>
</body>
</html>
