<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\NewsActiveRecord $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News Active Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-active-record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'body:html',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
