<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ref\RefDistrict */
?>
<div class="ref-district-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'region_id',
            'founded_year',
            'ceo_full_name',
            'work_number',
            'address:ntext',
            'folder',
        ],
    ]) ?>

</div>
