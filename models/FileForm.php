<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

/**
 * FileForm.
 */
class FileForm extends Model
{
    public $files;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['files'], 'required'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'files' => 'Файлы',
        ];
    }

    /**
     * @return bool
     */
    public function save()
    {
        $files = UploadedFile::getInstances($this, 'files');
        if (!empty($files)) {
            $fileFolder = Yii::getAlias('@app/web/uploads');
            foreach ($files as $file) {
                $fileName = explode('.', $file->name);
                $fileName = $fileName[0];
                $translit = Inflector::transliterate($fileName);
                $slugName = Inflector::slug($translit,'-', true);
                $fileNameExt = $slugName . '.' . $file->extension;
                $fileExist = File::findOne(['filename' => $fileNameExt]);
                if ($fileExist) {
                    $fileNameExt = $slugName . '_' . Yii::$app->security->generateRandomString(8) . '.' . $file->extension;
                }
                if ($file->saveAs($fileFolder . '/' . $fileNameExt)) {
                    $model = new File();
                    $model->filename = $fileNameExt;
                    $model->save();
                };
            }
            return true;
        }
        echo '<pre>'.print_r($files,1).'</pre>';die;
        return false;
    }
}
