<?php

use app\components\Functions;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii', 'Ўзгартириш'), ['Ўзгартириш', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Вилоят',
                'value' => Functions::extractFromJson('uzc', $model->region->name),
            ],
            [
                'label' => 'Туман',
                'value' => Functions::extractFromJson('uzc', $model->district->name),
            ],
            [
                'label' => 'Сектор',
                'value' => Functions::extractFromJson('uzc', $model->sector->name),
            ],
            'sector_head',
            'head_position',
            'head_workplace',
            'head_address',
            'decision_number',
            'decision_date',
            'governor_head',
            'prosecutor_head',
            'affair_head',
            'tax_head',
        ],
    ]) ?>

    <h1>
        Book Records
    </h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
    </table>
</div>
