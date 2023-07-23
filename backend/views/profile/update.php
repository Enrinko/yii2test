<?php

use backend\models\FileUpload;
use yii\helpers\Html;
use yii\web\Request;

/** @var yii\web\View $this */
/** @var array $textsModel */
/** @var backend\models\ProfileActiveRecord $profileModel */
/** @var Request $request */
/** @var FileUpload $model */
/** @var array $language */

$this->title = 'Update Profile Active Record: ' . $profileModel->id;
$this->params['breadcrumbs'][] = ['label' => 'Profile Active Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $profileModel->id, 'url' => ['view', 'id' => $profileModel->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-active-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'profileModel' => $profileModel,
        'textsModel' => $textsModel,
        'language' => $language,
        'req' => $request,
        'model' => $model,
    ]) ?>

</div>
