<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'Название',
                'value' => 'title',
            ],
            'description:ntext',
            'content:ntext',
            'date',
            [
                'format' => 'html',
                'label' => 'Картинка',
                'value' => function($data) {
                    return Html::img($data->getImage(), ['width'=>200]);
                }
            ],
            [
                'format' => 'html',
                'label' => 'Статус',
                'value' => function($data) {
                    if ($data->status == 1) {
                        return '<a class="btn btn-warning" href="'.Url::toRoute(['article/disallow', 'id'=>$data->id]).'">Отключить</a>';
                    }
                        return '<a class="btn btn-success" href="'.Url::toRoute(['article/allow', 'id'=>$data->id]).'">Публикация</a>';
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
