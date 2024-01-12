<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1517354-final';
const USER = 'LAA1517354';
const PASS = '2201401';

$connect = 'mysql:host='. SERVER . ';dbname='. DBNAME .';charset=utf8';
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>更新完了</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update phone set name=?,maker=? where id=?');
    if (empty($_POST['name'])) {
        echo '機種名を入力してください。';
    } else
    if (empty($_POST['maker'])) {
        echo 'メーカー名を入力してください。';
    } else
    if($sql->execute([$_POST['name'],$_POST['maker'],$_POST['id']])){
        echo '更新に成功しました。';
    } else {
        echo '更新に失敗しました。';
    }
    
?>
        <hr>
        <table>
        <tr><th>機種ID</th><th>機種名</th><th>メーカー</th></tr>

<?php
foreach ($pdo->query('select * from phone') as $row) {
    echo '<tr>';
    echo '<td>', $row['id'], '</td>';
    echo '<td>', $row['name'], '</td>';
    echo '<td>', $row['maker'], '</td>';
    echo '</tr>';
    echo "\n";
}
?>
        </table>
        <button onclick="location.href='top.php'">トップ画面へ戻る</button>
    </body>
</html>