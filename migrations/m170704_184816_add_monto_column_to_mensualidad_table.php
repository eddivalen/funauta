<?php

use yii\db\Migration;

/**
 * Handles adding monto to table `mensualidad`.
 */
class m170704_184816_add_monto_column_to_mensualidad_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('mensualidad', 'monto', $this->float(5)->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('mensualidad', 'monto');
    }
}
