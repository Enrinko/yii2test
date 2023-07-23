<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\NewsActiveRecord $model */

$this->title = 'Create News Active Record';
$this->params['breadcrumbs'][] = ['label' => 'News Active Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-active-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
