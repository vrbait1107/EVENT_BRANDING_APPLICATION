<?php

require_once "../config/configPDO.php";

session_start();

extract($_POST);

if (!isset($_SESSION['user'])) {
    echo <<<HTML
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please Login to Subscribe.'
            });
        </script>
    HTML;
    return;
}

try {

    if (isset($_POST['email']) && !empty($_POST['email'])) {

        $email = $_SESSION["user"];

        $sql2 = "SELECT * FROM newsletter_information WHERE email = :email";
        $result2 = $conn->prepare($sql2);
        $result2->bindValue(":email", $email);
        $result2->execute();

        if ($result2->rowCount() > 0) {
            echo <<<HTML
                <script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: 'You are already subscribed to the newsletter!'
                    });
                </script>
            HTML;
            return;
        }

        $sql = "INSERT INTO newsletter_information (email, subscribe) VALUES (:email, :Yes)";

        $result = $conn->prepare($sql);
        $result->bindValue(":email", $email);
        $result->bindValue(":Yes", "Yes");

        # Executing Value
        $result->execute();

        if ($result) {
            echo <<<HTML
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'You are successfully subscribed to the newsletter!'
                    });
                </script>
            HTML;
            return;
        }
        
        echo <<<HTML
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'You failed to subscribe to the newsletter. Please try again.'
                    });
                </script>
            HTML;
        return;
    }
} catch (PDOException $e) {
    echo <<<HTML
    <script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>
    HTML;
    echo "Error " . $e->getMessage();
}

// --------------------------->> CLOSE DB CONNECTION
$conn = null;
