<?php

use app\models\EventTask;
use yii\db\Migration;

/**
 * Class m180516_032442_event_task_sector_field
 */
class m180516_032442_event_task_sector_field extends Migration
{


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('event_task', 'sector', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('event_task', 'sector');
    }

}
