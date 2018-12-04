<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
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
    <?= Html::tag('link', '', ['rel' => 'shortcut icon', 'href' => $asset->baseUrl . '/logo.png', 'type' => 'image/png']) ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => false,
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container-fluid">
        <p class="pull-left">&copy; simple-yii2/cms</p>
        <p class="pull-right">Powered by <?= Html::img($asset->baseUrl . '/powered.png', ['class' => 'powered-by']) ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
