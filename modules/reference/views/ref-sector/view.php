<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ref\RefSector */
?>
<div class="ref-sector-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'district_id',
            'name:ntext',
            'sector_number',
            'ceo_full_name',
            'ceo_position',
            'phone_number',
            'work_number',
            'address:ntext',
        ],
    ]) ?>

</div>
