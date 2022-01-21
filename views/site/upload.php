<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var $model \app\models\File
 * @var $this \yii\web\View
 */
?>
<div class="site-upload">
    <h1>Загрузка файлов</h1>
    <?php $form = ActiveForm::begin([
        'id' => 'upload-form',
        'options' => [
            'enctype' => 'multipart/form-data',
        ]
    ]); ?>
        <div class="form-group">
            <?= $form->field($model, 'files')->widget(\kartik\file\FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*',
                    'multiple' => true
                ],
                'pluginOptions' => [
                    'maxFileCount' => 5,
                ]
            ]);?>
        </div>
        <div class="form-group">
            <?= Html::submitInput('Сохранить', ['class' => 'btn btn-primary'])?>
        </div>
    <?php ActiveForm::end()?>
</div>
