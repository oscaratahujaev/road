<?php

use yii\db\Migration;

/**
 * Class m180516_043354_task_finance_source
 */
class m180516_043354_task_finance_source extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('task_finance', 'source', $this->string(255));
    }

    public function down()
    {
        $this->dropColumn('task_finance', 'source');
    }
}
