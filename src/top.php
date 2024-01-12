<?php
   const SERVER = 'mysql220.phy.lolipop.lan';
   const DBNAME = 'LAA1517354-final';
   const USER = 'LAA1517354';
   const PASS = '2201401';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
    <meta http-equiv="Cache-Control" content="no-cache">
		<meta charset="UTF-8">
		<title>機種一覧</title>
	</head>
	<body>
        <table>
    <tr><th>機種ID</th><th>機種名</th><th>メーカー</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select*from phone') as $row) {
        echo '<tr>';
        echo '<td>', $row['id'], '</td>';
        echo '<td>', $row['name'], '</td>';
        echo '<td>', $row['maker'], '</td>';
        echo '<td>';
        echo '<form action="koushin-input.php" method="post">';
        echo '<input type="hidden" name="id" value="',$row['id'],'">';
        echo '<button type="submit">更新</button>';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form action="delete-input.php" method="post">';
        echo '<input type="hidden" name="id" value="',$row['id'],'">';
        echo '<button type=submit>削除</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }  
?>

    </table>
    <button onclick="location.href='toroku-input.php'">登録</button>
    </body>
</html>
