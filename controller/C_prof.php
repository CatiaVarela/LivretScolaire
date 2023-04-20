<?php
require_once '../view/includes/user-session.php';
// On vérifie que l'utilisateur est connecté et qu'il a les droits pour accéder à cette page
if (!hasAccess(100)) {
  add_notif_modal('danger', "Accès refusé", "Vous n'avez pas les droits pour accéder à cette page");
?>
  <script>
      window.location.replace("/view");
  </script>
  <?php
  exit();
}
?>


<?php
require_once('../modele/BDD.php');
require_once('../view/includes/header.php');
require_once('../view/includes/nav.php');
?>

<?php
$enseignant = recupere_enseignants();

// vérifier que la personne a cliqué sur le bouton submit et que les champs ne sont pas vides
if (verif_submit('saisie_pr') == 'Ajouter') {
  if (isset($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['prenom'])) {
    insert_enseignants();
?>
    <script>
      window.location.href = "../controller/C_prof.php";
    </script>
  <?php
  //retourner une erreur si au moins un des champs est vide
  } else {
  ?>
    <script>
      error = [];
      error.push("Veuillez remplir tous les champs");
    </script>
<?php
  }
}

require_once '../view/Professeurs.php';
require_once '../view/includes/footer.php';