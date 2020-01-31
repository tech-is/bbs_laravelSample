# ひとこと掲示板(Laravel版)  

Laravelは、PHPのフレームワークになります。
このひとこと掲示板は、初心者がLaravelに慣れるため、基本的なDB書き込み、DB読み込みを中心とした課題のサンプルコードになります。

## インストール方法  
### laravel インストール  


まずは、composerをインストールしましょう。  
以下のリンクからダウンロードしてください。  

```
https://getcomposer.org/
```

次にlaravelをインストールしましょう。
Windowsはコマンドプロンプト、Macはターミナルから以下のスクリプトを実行します。
```
composer create-project laravel/laravel --prefer-dist TEST1
```

プロジェクトのディレクトリに移動します。以下のコマンドを実行します。
```
cd TEST1
```

以下のスクリプトを実行します。
```
php -S localhost:8000 -t public
```

ブラウザを起動しlocalhost:8000にアクセスします。LaravelのWelcomeページが表示されれば、Laravelの準備は完了です。

### ダウンロード方法
```
git clone 
```
でインストールしてください。
### 使用方法
まずは、DBを作製します。  
  
「.env」を作成します。「.env」のサンプルコードをコピーしてください。そこで次のコードを設定してください。(mysqlの文字コードが、utf8になっていることを確認してください)  

```
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=hitokoto  
DB_USERNAME=root  
DB_PASSWORD=  
```
あなたが作製したDBに変更してください。

次に、migrationを行います。  
ターミナルを開き、Laravelによって作られたフォルダ（今回の場合は、「hitokoto_laravel」)にcdコマンドで移動してください。そして次のコマンドを入力してください。　
```
$ php artisan migrate  
```
これで、DBの準備は完了です。

最後に、サーバーの機能を立ち上げます。
Laravelによって作られたフォルダ（今回の場合は、「hitokoto_laravel」)にcdコマンドで移動してください。
そして次のコマンドを入力してください。　　
```
$ php artisan serve  
```
これで8000番ポートでWebサーバーが立ち上がります。
早速、http://localhost:8000  
にアクセスしてみましょう。

name  
に投稿者の名前を  
message  
に投稿内容を入力して、投稿ボタンをクリックするとログに記録が残ります。

ToDoリストとしても利用できます。ぜひ活用してください！！

### 管理者画面
今回、投稿内容を削除、編集ができるように管理者画面を用意しています。管理者画面に行くためには、上記のようにサーバーを立ち上げ次のURLにアクセスしてください。  
http://localhost:8000/login  
パスワードは、「heika83」となっています。
入力してログインしてください。  
管理者画面では、ログデータをCSV形式でダウンロードする機能を設けております。必要があれば利用してください。

## しゃろにゃんより

