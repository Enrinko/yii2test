<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\LanguageActiveRecord $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="language-active-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_size_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_size_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
