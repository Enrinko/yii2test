<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\LanguageActiveRecord $model */

$this->title = 'Create Language Active Record';
$this->params['breadcrumbs'][] = ['label' => 'Language Active Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-active-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
