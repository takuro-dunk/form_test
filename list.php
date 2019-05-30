<?php
$user = "yoshimura";
$pass = "t30489246";
try{
    $dbh = new PDO('mysql:host=localhost;dbname=test_db1;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM user_table";
    $stmt = $dbh->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<table>\n";
    echo "<tr>\n";
    echo "<th>名前</th><th>給料</th><th>区分</th>\n";
    echo "</tr>\n";
    foreach ($result as $row){
        echo "<tr>\n";
        echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES,'UTF-8') . "</td>\n";
        echo "<td>" . htmlspecialchars($row['salary'],ENT_QUOTES, 'UTF-8') . "</td>\n";
        echo "<td>" . htmlspecialchars($row['division'], ENT_QUOTES, 'UTF-8') . "</td>\n";
        echo "</tr>\n";
    }
    echo "</table>\n";
    $dbh = null;
} catch (Exception $e) {
    echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}
?>
