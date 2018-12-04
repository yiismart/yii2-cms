<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$title = Yii::t('user', 'Login');
$this->title = Yii::$app->name;

if ($model->hasErrors()) {
    Yii::$app->getSession()->setFlash('error', array_values($model->getFirstErrors())[0]);
}

?>
<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'options' => ['class' => 'login-form card'],
]); ?>

    <h5 class="card-header"><?= Html::encode($title) ?></h5>

    <div class="card-body">
        <div class="row">
            <div class="col-12 login-email"><?= Html::activeTextInput($model, 'email', ['class' => 'form-control', 'placeholder' => $model->getAttributeLabel('email')]) ?></div>
            <div class="col-12 login-password"><?= Html::activePasswordInput($model, 'password', ['class' => 'form-control', 'placeholder' => $model->getAttributeLabel('password')]) ?></div>

            <div class="col-12 login-button">
                <div class="float-right"><?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary']) ?></div>
                <div><?= Html::activeCheckbox($model, 'rememberMe') ?></div>
            </div>
        </div>
    </div>

<?php ActiveForm::end() ?>
