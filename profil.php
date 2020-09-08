<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
if(isset($_GET['id']) AND $_GET['id'] > 0)
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<meta charset="utf-8">
</head>
<body>
	<div align="center">	
	<h2>Profil de <?php echo $userinfo['pseudo']; ?> </h2>
	<br /><br /><br />
	Pseudo = <?php echo $userinfo['pseudo']; ?>
	<br />
	Mail = <?php echo $userinfo['mail']; ?>
	<br />
	<?php
	if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
	{
	?>
	<a href="editionprofil.php">Editer mon profil</a>
	<br />
	<a href="deconnexion.php">Déconnexion</a>
	<?php	
	}
	?>
</body>
</html>
<?php
}
?>