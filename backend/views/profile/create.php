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

$this->title = 'Create Profile Active Record';
$this->params['breadcrumbs'][] = ['label' => 'Profile Active Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-active-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'profileModel' => $profileModel,
        'textsModel' => $textsModel,
        'language' => $language,
        'req' => $request,
        'model' => $model,
    ]) ?>

</div>
