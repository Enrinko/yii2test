<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\LanguageActiveRecord $model */

$this->title = 'Update Language Active Record: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Language Active Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="language-active-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
