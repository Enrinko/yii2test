<?php

use backend\models\FileUpload;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Request;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var array $textsModel */
/** @var FileUpload $model */
/** @var backend\models\ProfileActiveRecord $profileModel */
/** @var array $language */
/** @var Request $req */
/** @var yii\widgets\ActiveForm $form */
$this->registerCssFile("/admin/css/form.css");
?>

<div class="profile-active-record-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="profile-img-container">
        <img src="<?= Yii::$app->request->baseUrl . '/upload/' . $profileModel->img ?>" class="img-responsive profile-img" />
    </div>
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <div class="flex-texts-forms">
        <?php for ($i = 0; $i < sizeof($language); $i++) {
            $newText = new \backend\models\TextsActiveRecord();
            ?>
            <div class="texts-forms-item">

                <?= $form->field($newText, "[$i]id")->hiddenInput(["value" => isset($textsModel[$i]) ? $textsModel[$i]->id : ""])->label("") ?>
                <?= $form->field($newText, "[$i]lang")->hiddenInput(['value' => $language[$i]->id])->label("") ?>

                <?= $form->field($newText, "[$i]title")->textInput(['maxlength' => true, "value" => isset($textsModel[$i]) ? $textsModel[$i]->title : "" ]) ?>

                <?= $form->field($newText, "[$i]body")->textarea(['rows' => 6, "value" => isset($textsModel[$i]) ? $textsModel[$i]->body : ""]) ?>
            </div>
        <?php } ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
