<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreatePermissionTable extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table  =  $this->table('permissions',array('engine'=>'InnoDB'));
        $table
        ->addColumn('parent_id', 'integer', ['signed'=>false])
        ->addColumn('title', 'string')
        ->addColumn('name', 'string')
        ->addColumn('path', 'string')
        ->addColumn('redirect', 'string')
        ->addColumn('icon', 'string')
        ->addColumn('component', 'string')
        ->addColumn('permission', 'string')
        ->addColumn('affix', 'string')
        ->addColumn('sort', 'integer', ['signed'=>false])
        ->addColumn('type', 'integer', ['signed'=>false])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->addIndex(array('permission'), array('unique'  =>  true))
        ->create();
    }
    public function down()
    {
        $table =  $this->table('permissions');
        $table->drop();
    }
}
