<?php

use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use smart\cms\assets\AppAsset;
use smart\cms\widgets\Alert;

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
    <?= Html::tag('link', '', ['rel' => 'shortcut icon', 'href' => $asset->baseUrl . '/img/logo32.png', 'type' => 'image/png']) ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container-fluid">

        <div class="wrapper">
            <div id="content">
                <?= $this->render('partials/header') ?>
                <?= Breadcrumbs::widget([
                    'homeLink' => false,
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

    </div>
</div>

<footer class="footer">
    <div class="container-fluid">
        <p class="float-left">&copy; yiismart/yii2-cms</p>
        <p class="float-right">Powered by <?= Html::img($asset->baseUrl . '/img/powered.png', ['class' => 'powered-by']) ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
