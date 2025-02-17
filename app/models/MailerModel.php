<?php

namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use Dotenv\Dotenv;


// require dirname(__DIR__) . '/vendor/autoload.php';

class MailerModel
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        try {
            // Configuration SMTP
            // $dotenv = Dotenv::createImmutable(__DIR__ . "/../../core");
            // $dotenv->load();
            // print_r($_ENV);

            extract($_ENV);

            $this->mail->isSMTP();
            $this->mail->Host       = 'smtp.gmail.com'; // Serveur SMTP
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = 'miloudybouchra01@gmail.com' ;//$EMAIL_ENVOI; // Remplacez par votre email
            $this->mail->Password   = 'woup cipg eoma fnjj';//$PASSWORD_MAIL; // Mot de passe d’application
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port       = 587;

            // Expéditeur par défaut
            $this->mail->setFrom('miloudybouchra01@gmail.com', 'Roomate Team');
        } catch (Exception $e) {
            error_log("Erreur PHPMailer: " . $e->getMessage());
        }
    }

    public function envoyerEmail($email, $full_name, $sujet, $body)
    {
        try {
            // Destinataire
            $this->mail->addAddress($email, "$full_name");

            // Contenu de l'email
            $this->mail->isHTML(true);
            $this->mail->Subject = $sujet;
            $this->mail->Body    = $body;

            // Envoyer l'email
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return "Erreur lors de l'envoi de l'email : {$this->mail->ErrorInfo}";
        }
    }
}
