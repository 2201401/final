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
		<link rel="stylesheet" href="css/koushin-input.css">
		<title>更新</title>
	</head>
	<body>
    <table>
    <tr><th>機種ID</th><th>機種名</th><th>メーカー</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select*from phone where id=?');
    $sql->execute([$_POST['id']]);
	foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="koushin-output.php" method="post">';
        echo '<td> ';
		echo '<input type="hidden" name="id" value="', $row['id'], '">',$row['id'];
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="name" value="', $row['name'], '">';
		echo '</td> ';
		echo '<td>';
		echo ' <input type="text" name="maker" value="', $row['maker'], '">';
		echo '</td> ';
		echo '<td><input type="submit" value="更新"></td>';
		echo '</form>';
        echo '</tr>';
		echo "\n";
	}
?>
</table>
<p><button onclick="location.href='top.php'">トップ画面へ戻る</button></p>
    </body>
</html>

