<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateRoleTable extends Migrator
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
        $table  =  $this->table('roles',array('engine'=>'InnoDB'));
        $table
        ->addColumn('name', 'string')
        ->addColumn('value', 'string') 
        ->addColumn('desc', 'string')
        ->addColumn('status', 'integer', ['signed'=>false])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->addIndex(array('name'), array('unique'  =>  true))
        ->create();
    }
    public function down()
    {
        $table =  $this->table('roles');
        $table->drop();
    }
}
