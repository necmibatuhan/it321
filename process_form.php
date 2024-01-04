<?php
include("connect.php");

if ($_POST) {
    $name = $_POST["name"];
    $mail = $_POST["email"];
    $habit = $_POST["habit"];

    $sql = "INSERT INTO dbo.registration (name, email, habit) VALUES (:name, :email, :habit)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $mail);
        $stmt->bindParam(':habit', $habit);

        $calistirekle = $stmt->execute();

        if ($calistirekle) {
            echo '<script>alert("Bağlantı başarıyla kuruldu. Projemize destek olduğunuz için teşekkür ederiz.");</script>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
