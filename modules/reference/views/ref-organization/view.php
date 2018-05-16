<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ref\RefOrganization */
?>
<div class="ref-organization-view">
 
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
