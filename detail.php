<?php
$user = "yoshimura";
$pass = "t30489246";
try{
    if (empty($_GET['id'])) throw new Exception('ID不正');
    $id = (int) $_GET['id'];
    $dbh = new PDO('mysql:host=localhost;dbname=test_db1;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM user_table where id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "名前:" . htmlspecialchars($result['name'], ENT_QUOTES, 'UTF-8') . "<br>\n";
    echo "場所:" . htmlspecialchars($result['category'], ENT_QUOTES, 'UTF-8') . "<br>\n";
    echo "区分:" . htmlspecialchars($result['division'], ENT_QUOTES, 'UTF-8') . "<br>\n";
    echo "給与:" . htmlspecialchars($result['salary'], ENT_QUOTES, 'UTF-8') . "<br>\n";
    echo "備考:<br>" . htmlspecialchars($result['biko'], ENT_QUOTES, 'UTF-8') . "<br>\n";
    $dbh = null;
} catch(Exception $e){
    echo "エラー発生: " . htmlspecialchars($e->getmessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}