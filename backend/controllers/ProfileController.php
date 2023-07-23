<?php

namespace backend\controllers;

use backend\models\FileUpload;
use backend\models\LanguageActiveRecord;
use backend\models\ProfileActiveRecord;
use backend\models\TextsActiveRecord;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ProfileController implements the CRUD actions for ProfileActiveRecord model.
 */
class ProfileController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ]
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ProfileActiveRecord models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ProfileActiveRecord::find(),
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProfileActiveRecord model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the ProfileActiveRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ProfileActiveRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProfileActiveRecord::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new ProfileActiveRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $profile = new ProfileActiveRecord();
        $model = new FileUpload();
        $texts = [new TextsActiveRecord()];

        $dataProvider = LanguageActiveRecord::find()->all();
        $request = $this->request->post();

        if ($this->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $this->createDirectory("upload");
            if (isset($model->imageFile)) {
                $model->upload();
                $profile->img = null === $model->imageFile? "" : $model->imageFile->name;
            }
            $profile->user_id = \Yii::$app->user->id;
            $profile->createdAt = new \DateTime();
            $profile->createdAt = $profile->createdAt->format('Y-m-d H:i:s');
            $profile->isActive = true;
            if ($profile->save()) {
                $textArray = $this->request->post("TextsActiveRecord");
                foreach ($textArray as $item) {
                    $text = new TextsActiveRecord();
                    foreach ($item as $attr => $key) {
                        $text[$attr] = $key;
                    }
                    $text->profile_id = $profile->getAttribute("id");
                    $text->save();
                }
                return $this->redirect(['view', 'id' => $profile->id]);
            }
        } else {
            $profile->loadDefaultValues();
        }

        return $this->render('create', [
            'profileModel' => $profile,
            'textsModel' => $texts,
            'language' => $dataProvider,
            'request' => $request,
            'model' => $model,
        ]);
    }

    public function createDirectory($path)
    {
        ;
        if (!file_exists("$path")) {
            mkdir($path, 0775, true);
        }
    }

    /**
     * Updates an existing ProfileActiveRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $profile = $this->findModel($id);
        $model = new FileUpload();

        $texts = TextsActiveRecord::find()->where(["profile_id" => $id])->orderBy('lang ASC')->all();

        $dataProvider = LanguageActiveRecord::find()->orderBy("id ASC")->all();
        $request = $this->request->post();

        if ($this->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $this->createDirectory("upload");
            $model->upload();
            $profile->img = $model->imageFile->name;
            $profile->user_id = \Yii::$app->user->id;
            $profile->createdAt = new \DateTime();
            $profile->createdAt = $profile->createdAt->format('Y-m-d H:i:s');
            $profile->isActive = true;
            if ($profile->save()) {
                $textArray = $this->request->post("TextsActiveRecord");
                foreach ($textArray as $item) {
                    $text = new TextsActiveRecord();
                    foreach ($item as $attr => $key) {
                        $text[$attr] = $key;
                    }
                    $text->profile_id = $profile->getAttribute("id");
                    $text->save();
                }
                return $this->redirect(['view', 'id' => $profile->id]);
            }
        } else {
            $profile->loadDefaultValues();
        }

        return $this->render('update', [
            'profileModel' => $profile,
            'textsModel' => $texts,
            'language' => $dataProvider,
            'request' => $request,
            'model' => $model,
        ]);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProfileActiveRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
