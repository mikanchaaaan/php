<?php

require_once('config/status_codes.php');

$random_indexes = array_rand($status_codes, 4);

foreach ($random_indexes as $index) {
    $options[] = $status_codes[$index];
}

$question = $options[mt_rand(0, 3)];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/sanitize.css">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Status Code Quiz</title>
</head>

<body>
    <!-- header -->
    <header class="header">
        <div class="header__inner">
            <a href="index.php" class="header__logo">Status Code Quiz</a>
        </div>
    </header>
    <!-- main -->
    <main>
        <div class="quiz__content">
            <!-- quiz -->
            <div class="question">
                <p class="question__text">Q.以下の内容に当てはまるステータスコードを選んでください</p>
                <p class="question__text"><?php echo $question['description'] ?></p>
            </div>
            <!-- answer -->
            <form class="quiz-form" action="result.php" method="post">
                <input type="hidden" name="answer_code" value="<?php echo $question['code'] ?>">
                <!-- choices -->
                <div class="quiz-form__item">
                    <?php foreach ($options as $option): ?>
                        <div class="quiz-form__group">
                            <input class="quiz-form__radio" type="radio" name="option" value="<?php echo $option['code'] ?>" id="<?php echo $option['code'] ?>">
                            <label class="quiz-form__label" for="<?php echo $option['code'] ?>"><?php echo $option['code'] ?></label>
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- submit button -->
                <div class="quiz-form__button">
                    <button class="quiz-form__button-submit" type="submit">回答</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>