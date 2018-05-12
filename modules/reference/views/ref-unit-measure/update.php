<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ref\RefUnitMeasure */

$this->title = Yii::t('yii', 'Update Ref Unit Measure: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Ref Unit Measures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="ref-unit-measure-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
