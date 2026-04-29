<?php
declare(strict_types=1);
session_start();
require_once 'database/database.php';

// function authenticateUser(PDO $pdo, string $mailconnect, string $mdpconnect): string
// {
//     if (empty($mailconnect) || empty($mdpconnect)) return "Tous les champs doivent être remplis.";

//     $requser = $pdo->prepare("SELECT * FROM blog_php_2026 WHERE email = :email");
//     $requser->execute([':email' => $mailconnect]);
//     $userinfo = $requser->fetch();

//     if (!$userinfo || !password_verify($mdpconnect, $userinfo['motdepasse'])) return 'Indentifiants invalides !';


//     $_SESSION['id'] = $userinfo['id'];
//     $_SESSION['pseudo'] = $userinfo['pseudo'];
//     $_SESSION['mail'] = $userinfo['mail'];
//     $_SESSION['role'] = $userinfo['role'];
//     $_SESSION['avatar'] = $userinfo['avatar'];


//     return "success";
// }
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $mailconnect   = filter_input(INPUT_POST, 'mailconnect', FILTER_SANITIZE_EMAIL) ?? '';
//     $mdpconnect    = $_POST['mdpconnect'] ?? '';
//     $result = authenticateUser($pdo, $mailconnect, $mdpconnect);
//     if ($result === "success") {
//         header("Location: profil.php?id=" . $_SESSION['id']);
//         exit();
//     } else {
//         header("Location: connexion.php");
//         exit();
//     }
// }

$pageTitle = 'Connexion'; // Titre de la page de connexion
ob_start(); // Créer un tampon de sortie pour stocker le contenu de la page de connexion
require_once 'resources/views/users/login_html.php'; // Inclure la vue de la page de connexion
$pageContent = ob_get_clean(); // Récupérer le contenu du tampon de sortie et le stocker dans la variable $pageContent
require_once 'resources/views/layouts/blog-layout/blog-layout_html.php'; // Inclure le layout du blog qui affichera le header, le contenu et le footer
?>
