<?php
session_start();

require_once("../config/config.php");
require_once("../model/User.php");

try {
  $user = new User($host, $dbname, $user, $pass);
  $user->connectDb();

  if($_POST) {
    $result = $user->login($_POST);
    if(!empty($result)) {
     $_SESSION['User'] = $result;
     header('Location: /employee_list/users/index.php');
     exit;
    } else { 
     $message = "ログインできませんでした";
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
<title>従業員リスト</title>
<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>

    <div class="form-wrapper">
      <h1>従業員リスト</h1>
      <form action="" method="post">
        <div class="form-item">
          <label for="num"></label>
          <input type="text" name="num" required="required" placeholder="ユーザーID" value="<?php if (!empty($_POST["num"])) {echo htmlspecialchars($_POST["num"], ENT_QUOTES);} ?>"></input>
        </div>
        <div class="form-item">
          <label for="password"></label>
          <input type="password" name="password" required="required" placeholder="パスワード" value=""></input>
        </div>
        <div class="button-panel">
          <input type="submit" class="button" name="login" title="Login In" value="ログイン"></input>
        </div>
      </form>
      <!-- <div class="form-footer">
        <p><a href="#">アカウント作成</a></p>
        <p><a href="#">パスワードを忘れた場合</a></p>
      </div> -->
    </div>

  <footer>
  </footer>

  </body>
