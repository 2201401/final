<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1517354-final';
const USER = 'LAA1517354';
const PASS = '2201401';

$connect = 'mysql:host='. SERVER . ';dbname='. DBNAME .';charset=utf8';
?>

<link rel="stylesheet" href="css/delete-output.css">
<title>削除完了</title>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from phone where id=?');
    if($sql->execute([$_GET['id']])){
        echo'削除に成功しました。';
    }else{
        echo'削除に失敗しました。';
    }
    ?>
    <br><hr><br>
	<table>
		<tr><th>機種ID</th><th>機種名</th><th>メーカー</th></tr>
<?php
    foreach ($pdo->query('select * from phone') as $row) {
        echo '<tr>';
        echo '<td>',$row['id'], '</td>';
        echo '<td>',$row['name'], '</td>';
        echo '<td>',$row['maker'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?> 
</table>
    <p><button onclick="location.href='top.php'">トップ画面へ戻る</button></p>
    </body>
</html>
