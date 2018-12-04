<?php

use yii\helpers\Html;
use smart\cms\widgets\Alert;
use smart\cms\assets\AppAsset;

$asset = AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::tag('link', '', ['rel' => 'shortcut icon', 'href' => $asset->baseUrl . '/logo.png', 'type' => 'image/png']) ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
        <div class="login-block">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
