<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

/**
 * @var $this \yii\web\View
 * @var $dataProvider \yii\data\ActiveDataProvider
 */
?>

<h1>Список</h1>

<div class="mb-2">
    <a href="/site/upload" class="btn btn-success">Загрузить</a>
</div>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '{items} {pager}',
    'columns' => [
        [
            'attribute' => 'filename',
            'value' => function($model) {
                return Html::a($model->filename, $model->url);
            },
            'format' => 'raw',
        ],
        [
            'attribute' => 'created_at',
            'value' => function($model) {
                return \Yii::$app->formatter->asDate($model->created_at, "php:d F Y H:i");
            }
        ],
    ],
]); ?>