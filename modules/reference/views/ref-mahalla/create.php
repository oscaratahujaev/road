<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ref\RefMahalla */

$this->title = Yii::t('yii', 'Create Ref Mahalla');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Ref Mahallas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-mahalla-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
