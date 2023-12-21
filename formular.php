<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $krestni = $_POST["krestni"];
            $prijmeni = $_POST["prijmeni"];
            $email = $_POST["email"];
            $zprava = $_POST["zprava"];
    
            $cilovy_email = "prosekadam@gmail.com"; //změnit na svůj
    
            $subjekt = "[3JM.cz]: Nová zpráva od klienta.";
            $obsah = "Jméno: $krestni $prijmeni\n";
            $obsah .= "E-mail: $email\n";
            $obsah .= "Zpráva:\n$zprava";
    
            $odeslano = mail($cilovy_email, $subjekt, $obsah);
    
            if ($odeslano) {
                echo "Zpráva byla úspěšně odeslána. Ozveme se Vám během následujících několika dnů.";
            } else {
                echo "Došlo k chybě při odesílání.";
            }
    
            header("Location: index.html");
            exit();
        } catch (Exception $e) {
            echo 'Chyba: ' . $e->getMessage();
        }
        
    }
?>
