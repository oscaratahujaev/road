<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ref\RefDistrict */

$this->title = Yii::t('yii', 'Create Ref District');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Ref Districts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-district-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
