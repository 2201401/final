<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1517354-final';
const USER = 'LAA1517354';
const PASS = '2201401';

$connect = 'mysql:host='. SERVER . ';dbname='. DBNAME .';charset=utf8';
?>

<!DOCTYPE html>
<html lang ="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/toroku-output.css">
    <title>機種登録完了</title>
</head>  
<body>
    <?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('insert into phone(id,name,maker) values(?,?,?)');
    if(empty($_POST['name'])){
        echo'機種名を入力してください。';
    }else if(empty($_POST['maker'])){
        echo'メーカー名を入力してください';
    }else if($sql->execute([$_POST['id'],$_POST['name'],$_POST['maker']])){
        echo'登録に成功しました。';
    }else{
        echo'登録に失敗しました。';
    }
    ?>
    <br><hr><br>
    <table>
    <tr><th>機種ID</th><th>機種名</th><th>メーカー</th></tr>
    <?php
    foreach($pdo->query('select*from phone')as $row){
         echo '<tr>';
         echo '<td>',$row['id'],':';
         echo '<td>',$row['name'],':';
         echo '<td>',$row['maker'];
         echo '</tr>';
         echo "\n";
        }
        ?>
        </table>
        <form action="top.php" method="post">
            <p><button type="subnit">トップ画面へ戻る</button></p>
    </form>
    </body>
    </html>
