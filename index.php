<?php
// セッションを開始する
session_start();
session_regenerate_id();

// エラーが有ったとき
// ????? $msg はメッセージ
$msg = '';
$date = '';
if (isset($_SESSION['error'])) {
    // errorという配列の中のキーmsg,dateで呼び出される値

    $msg = $_SESSION['error']['msg'];
    $date = $_SESSION['error']['date'];
}
?>
<!DOCTYPE html>
<html lang="練習問題09-2">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>練習問題09-2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row my-3">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                    <!-- エラーがあったときメッセージを表示 -->
                        <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $msg ?>
                        </div>
                        <?php endif ?>
                        <!-- ポストで送信 -->
                        <form action="./action.php" method="post">
                            <div class="form-group">
                                <label for="date">日付を入力してください</label>
                                 <!--// ??? テキストボックスの値は
                                 name="date"で渡される
                                 valueは関係ない  
                                 for属性id属性が関連付けられボタン等押しやすくなる-->


                                <input type="text" name="date" value="<?=$date ?>" id="date" class="form-control">
                            </div>
                            <input type="submit" value="送信" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
