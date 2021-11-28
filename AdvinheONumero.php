<?php
    session_start();

    echo "
        <p>Adivinhe o número que estou pensando entre 1 e 100.</p>
        <form action='#' method='post'>
            <input type='text' name='entrada'>
            <input type='submit' value='Tentar'>
        </form><br/>
    ";

    if (!isset($_SESSION['tentativa'])) {
        $_SESSION['tentativa'] = 1;
        $_SESSION['numero'] = rand(1,100);
    }

    if(isset($_POST['entrada']) && $_POST['entrada'] != "s") {
        $entrada = $_POST['entrada'];

        if($_SESSION['numero'] == $entrada) {
            echo "
                AEEEEE MANO! Tu acertou. O número era <strong>".$_SESSION['numero']."</strong>!
                E foi com <strong>".$_SESSION['tentativa']."</strong> tentativas :D
                Se quiser jogar de novo é só digitar <strong>s</strong>.
            ";
        }
        elseif ($_SESSION['numero'] > $entrada) {
            echo "O número é maior que ".$entrada."!";
        }

        else {
            echo "O número é menor que ".$entrada."!";
        }

        $_SESSION['tentativa']++;  
    }

    elseif(isset($_POST['entrada']) && $_POST['entrada'] == "s") {
        unset($_SESSION['numero']); session_destroy();
    }
