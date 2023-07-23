<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class FileUpload extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate() && null !== $this->imageFile) {
            $this->imageFile->saveAs('upload/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}