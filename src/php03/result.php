<?php
// 関数の読み込み
require('functions/search_city_time.php');

// 東京の時刻
$tokyo = searchCityTime('東京');

//比較対象の時刻
$city = htmlspecialchars($_GET['city'], ENT_QUOTES);
$comparison = searchCityTime($city)
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/sanitize.css">
    <link rel="stylesheet" href="./css/result.css">
    <link rel="stylesheet" href="./css/common.css">
    <title>World Clock</title>
</head>

<body>
    <!-- ヘッダーの作成 -->
    <header class="header">
        <div class="header__inner">
            <a href="index.php" class="header__logo">World Clock</a>
        </div>
    </header>

    <main>
        <div class="result__content">
            <!-- 2枚のカード -->
            <div class="result-cards">
                <!-- 東京の情報 -->
                <div class="result-card">
                    <div class="result-card__img-wrapper">
                        <img src="./img/<?php echo $tokyo['img'] ?>" alt="国旗" class="result-card__img">
                    </div>
                    <div class="result-card__body">
                        <p class="result-card__city"><?php echo $tokyo['name'] ?></p>
                        <p class="result-card__time"><?php echo $tokyo['time'] ?></p>
                    </div>
                </div>
                <!-- 選択した国の情報 -->
                <div class="result-card">
                    <div class="result-card__img-wrapper">
                        <img src="./img/<?php echo $comparison['img'] ?>" alt="国旗" class="result-card__img">
                    </div>
                    <div class="result-card__body">
                        <p class="result-card__city"><?php echo $comparison['name'] ?></p>
                        <p class="result-card__time"><?php echo $comparison['time'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>