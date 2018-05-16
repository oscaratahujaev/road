<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ref\RefMahalla */
?>
<div class="ref-mahalla-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'ceo_full_name',
            'phone_number',
            'work_number',
            'sector_id',
        ],
    ]) ?>

</div>
