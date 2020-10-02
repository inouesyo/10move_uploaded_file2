<?php
// アップロードされたファイルを保存するディレクトリ
// __DIR__ マジック定数 主にデバック用に利用?
// 状況に応じた値が入る??
// そのファイルの存在するディレクトリ。
$path = __DIR__ . '/images/';
// $_FILES  スーパーグローバル変数の一つ
// アップロードしたファイルの情報を取得できる
// アップロードされたファイルを、PC上のファイル名で保存する
// move_uploaded_file(コピー元,コピー先)
// コピー元はたいてい tmp_nameをキーにしてとりだしたもの。

// $path . $_FILES[] パスとファイル名を結合
// ????????配列image_fileのtmp_nameの値
move_uploaded_file($_FILES['image_file']['tmp_name'], $path . $_FILES['image_file']['name']);

// ディレクトリ内のファイルを配列で取得
// scandir(調べるディレクトリ（フォルダー）)
$tmp = scandir($path);

// 「.」から始まるファイルを削除して、通常ファイルのみを取得する
$files = [];
// 空の配列$filesを用意
// $tmpから$v を取り出す。
// preg_match( 検索するパターン)
// ^  [ ]、{ }、$ 「メタ文字」
// 先頭のデリミタに続く「^」は、文字列の最初にマッチすることを意味

foreach ($tmp as $v) {
    if (!preg_match('/^\./', $v) && is_file('./images/' . $v)) {
        $files[] = $v;
    }
}
?>
<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>練習問題10-2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row my-3">
            <?php
            $cnt = 1;
            foreach ($files as $v) {
                // echoでも書けるが、なるべくphp,htmlは住み分けて、
                // デザイナーが修正しやすいようにしてあげる。
            ?>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="./images/<?= $v ?>" class="img-fluid">
                        </div>
                    </div>
                </div>
                <?php
                if ($cnt % 4 == 0) {
                ?>
        </div>
        <div class="row my-3">
    <?php
                }
                $cnt++;
            }
    ?>
        </div>
        <a href="./">もどる</a>
    </div>
</body>

</html>