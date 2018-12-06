<?php

use yii\helpers\Html;
use smart\cms\widgets\SidebarMenu;

?>
<div class="sidebar-overlay"></div>
<nav id="sidebar" class="bg-dark">
    <div class="sidebar-header text-white">
        <h3><?= Html::encode(Yii::t('cms', 'Modules')) ?></h3>
        <button id="sidebar-dismiss" type="button" class="btn btn-dark"><i class="fas fa-arrow-left"></i></button>
    </div>

    <?= SidebarMenu::widget([
        'items' => Yii::$app->params['menu-modules'],
    ]) ?>
</nav>
