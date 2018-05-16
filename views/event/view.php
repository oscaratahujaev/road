<?php

use app\models\Event;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $sectorDetail app\models\EventSectorDetail[] */
/* @var $eventTasks app\models\Eventtask[] */

$this->title = 'Тадбир: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Тадбирлар'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$taskNumber = 1;
?>
<div class="event-view">

    <div class="col-md-12">
        <h3 class="text-center" style="padding-bottom:30px;">
            <?= $model->title ?>
        </h3>
    </div>


    <table class="table table-bordered table-hover">
        <th>№</th>
        <th>Фуқаролар йиғини номи</th>
        <th>Чора-тадбирлар номи</th>
        <th>Амалга ошириш механизми</th>
        <th>Тахминий харажатлар, молиялаштириш манбаи</th>
        <th>Амалга ошириш муддатлари</th>
        <th>Масъул ижрочилар</th>
        <tbody>
        <?php for ($sector = 1; $sector <= 4; $sector++): ?>
            <tr>
                <td colspan="7">
                    <div style="overflow:hidden" class="table-padding">

                        <p class="text-center text-bold"><?= $sector ?>-сектор бўйича

                            <?= Html::a('Тадбир қўшиш <i class="fa fa-plus"></i>', ['event-task/create', 'eventId' => $model->id, 'sector' => $sector], [
                                'data-toggle' => 'tooltip',
                                'class' => 'btn btn-success pull-right',
                            ]) ?>
                        </p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <div class="table-padding">

                        <?= $this->render('sector_detail', [
                            'model' => $model,
                            'sectorDetail' => $sectorDetail,
                            'i' => $sector,
                        ]) ?>

                    </div>
                </td>
            </tr>

            <?php foreach ($eventTasks as $task): ?>
                <?php if ($task['sector'] == $sector): ?>
                    <tr>
                        <td><?= $taskNumber ?></td>
                        <td><?=  Event::getMahalla($task['mahalla'])?></td>
                        <td><?= $task['title'] ?></td>
                        <td><?= $task['realiz_mechanism'] ?></td>
                        <td>
                            <?php foreach ($task['taskFinances'] as $finance): ?>
                                <?= $finance['sum'] ." ".$finance->sumUnit->name. " (" . $finance['source'] . ")" ?>
                            <?php endforeach; ?>
                        </td>
                        <td><?= $task['deadline_date'] ?></td>
                        <td></td>
                    </tr>
                    <?php $taskNumber++; ?>
                <?php endif; ?>

            <?php endforeach; ?>

        <?php endfor; ?>

        </tbody>

    </table>

    <p>
        <?= Html::a(Yii::t('yii', 'Ўзгартириш'), ['Ўзгартириш', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo Html::a('Hello world', ['display-file', 'id' => $model->id]); ?>

    <div class="">
        <?php DetailView::widget([
            'model' => $model,
            'attributes' => [
                'realiz_mechanism:ntext',
                'basis_filename',
                'deadline',
                'event_type_id',
                'responsible',
            ],
        ]) ?>
    </div>

</div>
