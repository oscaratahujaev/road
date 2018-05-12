<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ref\RefUnitMeasure */

$this->title = Yii::t('yii', 'Create Ref Unit Measure');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Ref Unit Measures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-unit-measure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
