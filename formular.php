<?php
        
    $krestni = $_POST["krestni"];
    $prijmeni = $_POST["prijmeni"];
    $email = $_POST["email"];
    $zprava = $_POST["zprava"];

    $obsah = "Jméno: $krestni $prijmeni\n";
    $obsah .= "E-mail: $email\n";
    $obsah .= "Zpráva:\n$zprava";

    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "prosekadam@gmail.com";
    $mail->Password = "stlf rnzh paoo royr";

    $mail->setFrom($email, $krestni);
    $mail->addAddress("prosekadam@gmail.com", "Adam"); //Změnit
    $mail->AddReplyTo($email, $krestni);

    $mail->Subject = "[3JM.cz]: Nová zpráva od klienta.";
    $mail->Body = $obsah;

    $mail->send();

    header("Location: zprava-odeslana.html");
?>
