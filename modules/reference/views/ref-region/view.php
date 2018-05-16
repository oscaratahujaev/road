<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ref\RefRegion */
?>
<div class="ref-region-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'founded_year',
            'ceo_full_name',
            'work_number',
            'address:ntext',
            'folder',
        ],
    ]) ?>

</div>
