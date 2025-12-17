<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($nom) && !empty($email) && !empty($message)) {
        $to = "kiliancorpet@gmail.com";
        $subject = "Message de $nom via le Portfolio";
        $body = "Nom: $nom\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "<p style='color: lime;'>Votre message a bien été envoyé.</p>";
        } else {
            echo "<p style='color: red;'>Erreur lors de l'envoi. Essayez plus tard.</p>";
        }
    } else {
        echo "<p style='color: red;'>Tous les champs sont obligatoires.</p>";
    }
} else {
    echo "<p style='color: red;'>Méthode non autorisée.</p>";
}
?>
