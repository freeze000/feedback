<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Feedback';
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */
/* @var $form ActiveForm */
?>
<div class="feedback">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'firstname') ?>
        <?= $form->field($model, 'lastname') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'mobile')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '+7 (999) 999-99-99',
        ]) ?>
        <?= $form->field($model, 'plot')->textarea() ?>
        <?= $form->field($model, 'reCaptcha')->widget(
            \himiklab\yii2\recaptcha\ReCaptcha2::className(),
            []
        ) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
