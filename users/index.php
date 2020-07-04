<?php
session_start();

require_once("../config/config.php");
require_once("../model/User.php");

// ログアウト処理
if(isset($_GET['logout'])) {
  // セッション情報を破棄する
  $_SESSION = array();
  session_destroy();
}

// ログイン画面を経由しているか確認する
if(!isset($_SESSION['User'])) {
  header('Location: /employee_list/users/login.php');
  exit;
}
// 管理者以外の場合、ログインしたユーザー情報を設定する
if($_SESSION['User']['status'] > 1) {
  $result['User'] = $_SESSION['User'];
}


try {
  $user = new User($host, $dbname, $user, $pass);
  $user->connectDb();

  // 参照処理
  $result = $user->findAll();
} catch (PDOExcpextion $e) { // PDOExcpextionをキャチする
  echo "エラー: ". $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=width-device, initial-scale=1.8">
<title>従業員リスト</title>
<link rel="stylesheet" type="text/css" href="../css/base.css">
</head>
<body>

<header>
  <div id ="navi">
    <h1><a href="index.php">従業員リスト</a></h1>
    <p style="margin-right:10px;float:right;"><?=$_SESSION['User']['name']?>さん</p>
    <ul id="header_navi">
      <li><a href="?logout=1">ログアウト</a></li>
      <?php if($_SESSION['User']['status'] == 0): ?>
      <li><a href="new.php">新規登録</a></li>
      <?php endif; ?>
    </ul>
  </div>
</header>


<?php foreach ($result as $row): ?>
<section id = "index_emp">
  <p><?=$row['num']?></br>
  <ruby><?=$row['name']?><rt><?=$row['furigana']?></rt></ruby> ( <?=$row['romaji']?> )　<?=$row['gender']?></p>
  <ul class = "dept">
    <li><?=$row['dept']?> <?=$row['section']?></li>
    <li><?=$row['position']?></li>
  </ul>
  <div id ="details">
    <?php if($_SESSION['User']['status'] <= 1): ?>
    <a href="details.php?id=<?=$row['id']?>">詳細</a>
    <?php if($_SESSION['User']['id'] != $row['id']): ?>
    <?php endif; ?>
    <?php endif; ?>
  </div>
</section>
<?php endforeach; ?>




<footer>
</footer>

</body>
