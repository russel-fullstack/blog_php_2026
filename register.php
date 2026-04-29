<?php
declare(strict_types=1);
session_start();
require_once './database/database.php';



function register(PDO $pdo, string $pseudo, string $mail, string $mdp, string $mdp2): string {

    if(empty($pseudo) || empty($mail) || empty($mdp) || empty($mdp2)){
        return "Tous les champs doivent être remplis.";
    }

     if (strlen($pseudo) > 255) return "Votre pseudo ne doit pas dépasser 255 caractères.";
   $stmt = $pdo->prepare("SELECT id FROM membres WHERE username = :username");
    $stmt->execute([':username' => $pseudo]);
    if ($stmt->rowCount() > 0) return "Ce pseudo est déjà utilisé.";

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) return "Adresse email invalide.";

    $stmt = $pdo->prepare("SELECT id FROM membres WHERE email = :mail");
    $stmt->execute([':mail' => $mail]);
    if ($stmt->rowCount() > 0) return "Adresse mail déjà utilisée !";

    if (strlen($mdp) < 8 || !preg_match("#[0-9]+#", $mdp) || !preg_match("#[a-zA-Z]+#", $mdp)) {
        return "Mot de passe : 8 caractères min. avec une lettre et un chiffre.";
    }
    if ($mdp !== $mdp2) return "Les mots de passe ne correspondent pas !";

    $stmt = $pdo->prepare("INSERT INTO membres(username, email, motdepasse) VALUES(:username, :mail, :mdp)");
    $stmt->execute([':username' => $pseudo, ':mail' => $mail, ':mdp' => password_hash($mdp, PASSWORD_DEFAULT)]);

    return "success";
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
   $pseudo = strip_tags($_POST['pseudo'] ?? '');
    $mail   = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL) ?? '';
    $mdp    = $_POST['mdp'] ?? '';
    $mdp2   = $_POST['mdp2'] ?? '';

 $result = register($pdo, $pseudo, $mail, $mdp, $mdp2);
     if ($result === "success") {
        // Message flash persistant en session → redirige vers connexion
        header("Location: connexion.php");
        exit();
    }

    // Erreur : message flash + rechargement du formulaire
    header("Location: inscription.php");
    exit();
}

?>
