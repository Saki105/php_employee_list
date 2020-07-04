# 従業員リストについて

実装機能

1. ログイン

2. 雇用形態によって、閲覧可能な情報を分岐

- 管理者と正社員は詳細画面の閲覧可

- 契約社員とパート、アルバイトは詳細画面の閲覧不可

- 管理者のみが従業員の追加や編集、削除の権限を付与

# Requirement

- php 7.3.7
- phpMyAdmin 4.8.3
- Apache/2.2.31 (Win32) DAV/2 mod_ssl/2.2.31
- mysqlnd 5.0.12-dev
- MAMP 4.1.1.18915

# Installation

1. 表示用にwebサーバーとして、MAMPをダウンロードします

　https://www.mamp.info/en/windows/

2. Free DownloadからWindows用を選択

3. 「MAMP_MAMP_PRO_###.exe」を実行

　インストールウィザードの途中で表示される「MAMP Pro」のチェックボックスを外してインストール（他の設定項目は初期値どおり）

4. デスクトップに作成された「MAMP」ショートカットを実行して起動

5. 「Apache Server」「MySQL Server」に緑マークが付いたら各サービスが起動中であることを表しています

6. https://github.com/Saki105/php_employee_list.git にアクセスし、クローンのzipファイルをダウンロード

7. zipファイルを解凍し、MAMPフォルダ内"htdocs"フォルダに中身を保存

8. 「MAMP」の「Open WebStart page」にアクセスして、SQLタブをクリック

9. zipファイル内にある「localhost.sql」の中身を実行し、データベースを作成

10. データベース作成後、http://localhost/employee_list/users/login.php にアクセスすると

「従業員リスト　ログイン画面」が表示されます

ユーザーID、パスワードはデータベース内のid、passwordです
