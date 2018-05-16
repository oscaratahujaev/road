<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $i integer */
/* @var $model app\models\Event */
/* @var $sectorDetail app\models\EventSectorDetail[] */

?>

<?php if (isset($sectorDetail[$i])) {
    $mahalla = $sectorDetail[$i]['mahalla_number'];
    $sum = $sectorDetail[$i]['sum'];
    $object = $sectorDetail[$i]['repaired_object'];
    $road = $sectorDetail[$i]['repaired_road'];
    $employed = $sectorDetail[$i]['employed'];
} else {
    $mahalla = 0;
    $sum = 0;
    $object = 0;
    $road = 0;
    $employed = 0;
}


?>

<?= Html::a('<i class="fa fa-pencil"></i>', ['event-sector-detail/create', 'eventId' => $model->id, 'sectorId' => $i], [
    'data-toggle' => 'tooltip',
    'class' => 'btn btn-primary pull-right',
    'title' => 'Ўзгартириш',
]) ?>
<p class="text-bold">«Йўл харитаси» — Дастурни амалга ошириш бўйича кутилаётган натижалар:</p>
<p>
    — «йўл харитаси»га киритилган маҳаллалар — <span class="text-bold"><?= $mahalla ?> та </span>
</p>
<p>
    — «йўл харитаси»да белгиланган чора-тадбирларни амалга ошириш учун белгиланган молиявий
    маблағларнинг тахминий ҳажми — <span class="text-bold"><?= $sum ?> млрд сўм </span>;
</p>

<p>
    — «йўл харитаси» доирасида капитал таъмирланадиган объектлар — <span class="text-bold"><?= $object ?> та</span>;
</p>

<p>
    — «йўл харитаси» доирасида таъмирланадиган ички йўллар (км) — <span class="text-bold"><?= $road ?> км</span>;
</p>

<p>
    — «йўл харитаси» доирасида бандлиги таъминланадиган фуқаролар — <span class="text-bold"><?= $employed ?>
        нафар</span>.
</p>
