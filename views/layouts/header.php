<?php

use yii\bootstrap4\Nav;
use yii\helpers\Html;

?>
<nav class="navbar navbar-expand fixed-top navbar-dark bg-dark">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-dark">
            <i class="fas fa-bars"></i>
            <span><?= Html::encode(Yii::t('cms', 'Modules')) ?></span>
        </button>

        <?= Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => Yii::$app->params['menu-header'],
        ]) ?>

    </div>

    <?= $this->render('sidebar') ?>
</nav>
