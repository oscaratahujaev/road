<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ref\RefCategory */
?>
<div class="ref-category-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'creator',
            'created_at',
            'modifier',
            'modified_at',
        ],
    ]) ?>

</div>
