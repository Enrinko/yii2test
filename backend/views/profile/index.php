<?php

use backend\models\ProfileActiveRecord;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Profile Active Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-active-record-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Profile Active Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'createdAt',
            [
                "template" => "<img src=" . Yii::$app->request->baseUrl . "/upload/"   ."class='img-responsive profile-img' >"
            ],
            'isActive',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProfileActiveRecord $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
