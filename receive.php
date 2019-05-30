<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>出力結果</title>
</head>
<body>
<?php
//print_r($_POST);
echo htmlspecialchars($_POST['name'],ENT_QUOTES,'UTF-8');
echo "<br>";
if ($_POST['category'] === '1') echo "東京";
if ($_POST['category'] === '2') echo "神奈川";
if ($_POST['category'] === '3') echo "埼玉";
echo "<br>";
if ($_POST['division'] === '1') {
    echo "S";
} elseif ($_POST['division'] === '2'){
    echo "A";
}else{
    echo "B";
}
echo "<br>";
if (is_numeric($_POST['salary'])){
    echo number_format($_POST['salary']);
}
echo "<br>";
echo nl2br(htmlspecialchars($_POST['biko'],ENT_QUOTES,'UTF-8'));
echo "<br>";
?>
</body>
</html>
