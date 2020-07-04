<?php
require_once("DB.php");

// UserクラスでDBクラスを継承する
class User extends DB {

 // ログイン
 public function login($arr) {
   $sql = 'SELECT * FROM employee_list WHERE num = :num AND password = :password';
   $stmt = $this->connect->prepare($sql);
   $params = array(':num'=>$arr['num'], ':password'=>$arr['password']);
   $stmt->execute($params);
   // $result = $stmt->rowCount();
   $result = $stmt->fetch();
   return $result;
 }


 // 参照 select
 public function findAll() {
   $sql = 'SELECT * FROM employee_list';
   $stmt = $this->connect->prepare($sql);
   $stmt->execute();
   // fetchAllで全てのレコードを返す
   $result = $stmt->fetchAll();
   return $result;
 }

 // 参照（条件付き）select
 public function findById($id) {
   $sql = 'SELECT * FROM employee_list WHERE id = :id';
   $stmt = $this->connect->prepare($sql);
   $params = array(':id'=>$id);
   $stmt->execute($params);
   // fetchで行数特定
   $result = $stmt->fetch();
   return $result;
 }


 // 新規登録 insert
 public function add($arr) {
   // INSERT文を変数に格納(バインドで値を置き換える)
   $sql = "INSERT INTO employee_list (num, name, furigana, romaji, birthday, gender, status, dept, section, grade, position, joined_date, retirement_date, password) VALUES(:num, :name, :furigana, :romaji, :birthday, :gender, :status, :dept, :section, :grade, :position, :joined_date, :retirement_date, :password)";
   // 挿入する値は空のまま、SQL実行の準備をする
   $stmt = $this->connect->prepare($sql);
   // 挿入する値を配列に格納する(パラメーターでバインド)
   $params = array(
     ':num'=>$arr['num'],
     ':name'=>$arr['name'],
     ':furigana'=>$arr['furigana'],
     ':romaji'=>$arr['romaji'],
     ':birthday'=>$arr['birthday'],
     ':gender'=>$arr['gender'],
     ':status'=>$arr['status'],
     ':dept'=>$arr['dept'],
     ':section'=>$arr['section'],
     ':grade'=>$arr['grade'],
     ':position'=>$arr['position'],
     ':joined_date'=>date('Y-m-d'),
     ':retirement_date'=>date('Y-m-d'),
     ':password'=>$arr['password']
   );
   // 挿入する値が入った変数をexecuteにセットしてSQLを実行
   $stmt->execute($params);
   echo "情報を登録しました。";
 }

// 編集 update
public function edit($arr) {
 $sql = "UPDATE employee_list SET num = :num, name = :name, furigana = :furigana, romaji = :romaji, birthday = :birthday, gender = :gender, status = :status, dept = :dept, section = :section, grade = :grade, position = :position, joined_date = :joined_date, retirement_date = :retirement_date, password = :password WHERE id = :id";
 $stmt = $this->connect->prepare($sql);
 $params = array(
   ':id'=>$arr['id'],
   ':num'=>$arr['num'],
   ':name'=>$arr['name'],
   ':furigana'=>$arr['furigana'],
   ':romaji'=>$arr['romaji'],
   ':birthday'=>$arr['birthday'],
   ':gender'=>$arr['gender'],
   ':status'=>$arr['status'],
   ':dept'=>$arr['dept'],
   ':section'=>$arr['section'],
   ':grade'=>$arr['grade'],
   ':position'=>$arr['position'],
   ':joined_date'=>$arr['joined_date'],
   ':retirement_date'=>$arr['retirement_date'],
   ':password'=>$arr['password']
 );
 $stmt->execute($params);
 echo "情報を更新しました。";
}

// 削除 delete
public function delete($id = null) {
  if(isset($id)) {
    $sql = "DELETE FROM employee_list WHERE id = :id";
    $stmt = $this->connect->prepare($sql);
    $params = array(':id'=>$id);
    $stmt->execute($params);
    echo "削除しました。";
  }
}



// 入力チェック validate
public function validate($arr) {
  $message = array();
  // 社員番号
  if(empty($arr['num'])) {
    $message['num'] = '社員番号を入力して下さい。';
  }
  // 氏名
  if(empty($arr['name'])) {
    $message['name'] = '氏名を入力して下さい。';
  }
  // フリガナ
  if(empty($arr['furigana'])) {
    $message['furigana'] = 'フリガナを入力して下さい。';
  }
  // ローマ字
  if(empty($arr['romaji'])) {
    $message['romaji'] = 'ローマ字を入力して下さい。';
  }
  // 性別
  if(empty($arr['gender'])) {
    $message['gender'] = '性別を入力して下さい。';
  }
  // 誕生日
  if(empty($arr['birthday'])) {
    $message['birthday'] = '誕生日を入力して下さい。';
  }
  // 雇用形態
  if(empty($arr['status'])) {
    $message['status'] = '雇用形態を入力して下さい。';
  }
  // 部
  if(empty($arr['dept'])) {
    $message['dept'] = '部を入力して下さい。';
  }
  // // 課
  // if(empty($arr['section'])) {
  //   $message['section'] = '課を入力して下さい。';
  // }
  // 等級
  if(empty($arr['grade'])) {
    $message['grade'] = '等級を入力して下さい。';
  }
  // 役職
  if(empty($arr['position'])) {
    $message['position'] = '役職を入力して下さい。';
  }
  // 入社日
  if(empty($arr['joined_date'])) {
    $message['joined_date'] = '入社日を入力して下さい。';
  }
  // // 退職日
  // if(empty($arr['retirement_date'])) {
  //   $message['retirement_date'] = '退職日を入力して下さい。';
  // }
  // パスワード
  if(empty($arr['password'])) {
    $message['password'] = 'パスワードを入力して下さい。';
  }
  return $message;
}

}
