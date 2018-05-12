<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ref\RefPlaceType */

$this->title = Yii::t('yii', 'Create Ref Place Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Ref Place Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-place-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
