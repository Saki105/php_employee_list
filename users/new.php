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
// 一般ユーザーの場合、ログインしたユーザー情報を設定する
if($_SESSION['User']['status'] > 1) {
 $result['User'] = $_SESSION['User'];
}


try {
  $user = new User($host, $dbname, $user, $pass);
  $user->connectDb();

   // 登録処理
   if($_POST) {
    $message = $user->validate($_POST);
    if(empty($message['num']) && empty($message['name']) && empty($message['furigana']) && empty($message['romaji']) && empty($message['birthday']) && empty($message['gender']) && empty($message['status']) && empty($message['dept']) && empty($message['section']) && empty($message['grade']) && empty($message['position']) && empty($message['joined_date']) && empty($message['retirement_date']) && empty($message['password'])) {
     $user->add($_POST);
    }
   }
}
catch (PDOExcpextion $e) { // PDOExcpextionをキャチする
  echo "エラー: ". $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=width-device, initial-scale=1.8">
<title>従業員リスト（新規追加）</title>
<link rel="stylesheet" type="text/css" href="../css/base.css">
</head>
<body>

  <header>
    <div id ="navi">
      <h1><a href="index.php">従業員リスト</a></h1>
      <p style="margin-right:10px;float:right;"><?=$_SESSION['User']['name']?>さん</p>
      <ul id="header_navi">
        <li><a href="?logout=1">ログアウト</a></li>
        <li><a href="new.php">新規登録</a></li>
      </ul>
    </div>
  </header>

<section>
<?php if($_SESSION['User']['status'] ==0): ?>
<?php if(isset($message['num'])) echo "<p class='error'>".$message['num']."</p>" ?>
<?php if(isset($message['name'])) echo "<p class='error'>".$message['name']."</p>" ?>
<?php if(isset($message['furigana'])) echo "<p class='error'>".$message['furigana']."</p>" ?>
<?php if(isset($message['romaji'])) echo "<p class='error'>".$message['romaji']."</p>" ?>
<?php if(isset($message['birthday'])) echo "<p class='error'>".$message['birthday']."</p>" ?>
<?php if(isset($message['gender'])) echo "<p class='error'>".$message['gender']."</p>" ?>
<?php if(isset($message['status'])) echo "<p class='error'>".$message['status']."</p>" ?>
<?php if(isset($message['dept'])) echo "<p class='error'>".$message['dept']."</p>" ?>
<?php if(isset($message['section'])) echo "<p class='error'>".$message['section']."</p>" ?>
<?php if(isset($message['grade'])) echo "<p class='error'>".$message['grade']."</p>" ?>
<?php if(isset($message['position'])) echo "<p class='error'>".$message['position']."</p>" ?>
<?php if(isset($message['joined_date'])) echo "<p class='error'>".$message['joined_date']."</p>" ?>
<?php if(isset($message['retirement_date'])) echo "<p class='error'>".$message['retirement_date']."</p>" ?>
<?php if(isset($message['password'])) echo "<p class='error'>".$message['password']."</p>" ?>
<form action="" method="post">
  <p>ユーザー情報の新規登録ができます。</p>
   <table>
    <tr>
      <th>社員番号</th>
      <td><input type="text" name="num" value="<?php if(isset($result['User'])) echo $result['User']['num'] ?>"></td>
    </tr>
    <tr>
      <th>氏名</th>
      <td><input type="text" name="name" value="<?php if(isset($result['User'])) echo $result['User']['name'] ?>"></td>
    </tr>
    <tr>
      <th>フリガナ</th>
      <td><input type="text" name="furigana" value="<?php if(isset($result['User'])) echo $result['User']['furigana'] ?>"></td>
    </tr>
    <tr>
      <th>ローマ字</th>
      <td><input type="text" name="romaji" value="<?php if(isset($result['User'])) echo $result['User']['romaji'] ?>"></td>
    </tr>
    <tr>
      <th>性別</th>
      <td><input type="text" name="gender" value="<?php if(isset($result['User'])) echo $result['User']['gender'] ?>"></td>
    </tr>
    <tr>
      <th>誕生日</th>
      <td><input type="text" name="birthday" value="<?php if(isset($result['User'])) echo $result['User']['birthday'] ?>"></td>
    </tr>
    <tr>
      <th>雇用形態</th>
      <td><input type="text" name="status" value="<?php if(isset($result['User'])) echo $result['User']['status'] ?>"></td>
    </tr>
    <tr>
      <th>部</th>
      <td><input type="text" name="dept" value="<?php if(isset($result['User'])) echo $result['User']['dept'] ?>"></td>
    </tr>
    <tr>
      <th>課</th>
      <td><input type="text" name="section" value="<?php if(isset($result['User'])) echo $result['User']['section'] ?>"></td>
    </tr>
    <tr>
      <th>等級</th>
      <td><input type="text" name="grade" value="<?php if(isset($result['User'])) echo $result['User']['grade'] ?>"></td>
    </tr>
    <tr>
      <th>役職</th>
      <td><input type="text" name="position" value="<?php if(isset($result['User'])) echo $result['User']['position'] ?>"></td>
    </tr>
    <tr>
      <th>入社日</th>
      <td><input type="text" name="joined_date" value="<?php if(isset($result['User'])) echo $result['User']['joined_date'] ?>"></td>
    </tr>
    <tr>
      <th>退職日</th>
      <td><input type="text" name="retirement_date" value="<?php if(isset($result['User'])) echo $result['User']['retirement_date'] ?>"></td>
    </tr>
    <tr>
      <th>パスワード</th>
      <td><input type="text" name="password" value="<?php if(isset($result['User'])) echo $result['User']['password'] ?>"></td>
    </tr>
  </table>
  <input type="hidden" name="id" value="<?php if(isset($result['User'])) echo $result['User']['id'] ?>">
  <input type="submit" id="submit" value="送　信">
</form>
  <?php endif; ?>
</section>

</body>
