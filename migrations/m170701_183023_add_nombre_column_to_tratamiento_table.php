<?php

use yii\db\Migration;

/**
 * Handles adding nombre to table `tratamiento`.
 */
class m170701_183023_add_nombre_column_to_tratamiento_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('tratamiento', 'nombre', $this->string(30)->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('tratamiento', 'nombre');
    }
}
