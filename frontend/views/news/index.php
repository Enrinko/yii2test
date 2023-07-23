<?php

use yii\grid\GridView;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'News Active Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-active-record-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->id,
                        ['news/view', 'id' => $model->id]
                    );
                },
            ],
            'title',
            'body:html',
            'createdAt',
            'updatedAt',
        ],
    ]); ?>


</div>
