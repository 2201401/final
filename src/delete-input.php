<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1517354-final';
const USER = 'LAA1517354';
const PASS = '2201401';

$connect = 'mysql:host='. SERVER . ';dbname='. DBNAME .';charset=utf8';
?>

<title>削除</title>
<table>
    <tr>
        <th>機種ID</th>
        <th>機種名</th>
        <th>メーカー</th>
    </tr>
    <?php
$pdo = new PDO($connect, USER, PASS);

$id = $_POST['id']; 


$sql = $pdo->prepare('SELECT * FROM phone WHERE id = ?');
$sql->execute([$id]);

$row = $sql->fetch(PDO::FETCH_ASSOC);

if ($row) {

    echo '<tr>';
    echo '<td>', $row['id'], '</td>';
    echo '<td>', $row['name'], '</td>';
    echo '<td>', $row['maker'], '</td>';
    echo '</tr>';

}
?>
</table>

<p>削除しますか？</p>

    <input type="button" onclick="location.href='top.php'" value="戻る">
    <input type="button" onclick="location.href='delete-output.php?id=<?= $id ?>'" value="削除">
</div>