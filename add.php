<?php
$user = "yoshimura";
$pass = "t30489246";
$name = $_POST['name'];
$biko = $_POST['biko'];
$category = (int) $_POST['category'];
$division = (int) $_POST['division'];
$salary = (int) $_POST['salary'];
try{
    $dbh = new PDO('mysql:host=localhost;dbname=test_db1;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO test_db1 (name, category, division, salary, biko) VALUES (?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $name, PDO::PARAM_STR);
    $stmt->bindValue(2, $category, PDO::PARAM_INT);
    $stmt->bindValue(3, $division, PDO::PARAM_INT);
    $stmt->bindValue(4, $salary, PDO::PARAM_INT);
    $stmt->bindValue(5, $biko, PDO::PARAM_STR);
    $stmt->execute();
    $dbh = null;
    echo "登録が完了しました。"
} catch (Exception $e) {
    echo "エラー発生： " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}
?>