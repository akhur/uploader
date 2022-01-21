<?php
/**
 * @var $model \app\models\File
 */
?>
<p>Дата загрузки: <b><?= \Yii::$app->formatter->asDate($model->created_at, "php:d F Y H:i")?></b></p>
<p>Название файла: <b><?= $model->filename?></b></p>
<p>Превью: <br><?= $model->getThumb(200, 200, 'crop')?></p>
<p><a href="<?= $model->getThumb(null, null, 'original')?>" target="_blank">Посмотреть оригинал</a></p>