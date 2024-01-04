include("connect.php");

if(isset($_POST["yt0"])){
  $name = $_POST["name"];
  $mail = $_POST["mail"];
  $habit = $_POST["habit"];




$sql = "INSERT INTO dbo.registration (name, email, habit) VALUES (:name, :mail, :habit)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':mail', $mail);
$stmt->bindParam(':habit', $habit);


$calistirekle = $stmt->execute();
}
if ($calistirekle) {
  echo '<script>alert("Bağlantı başarıyla kuruldu. Projemize destek olduğunuz için teşekkür ederiz.");</script>';
}

