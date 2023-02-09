<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateAdminTable extends Migrator
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
        $table  =  $this->table('admins',array('engine'=>'InnoDB'));
        $table
        ->addColumn('username', 'string')
        ->addColumn('password', 'string') 
        ->addColumn('gender', 'integer', ['signed'=>false])
        ->addColumn('name', 'string')
        ->addColumn('avatar', 'string')
        ->addColumn('phone', 'string')
        ->addColumn('email', 'string')
        ->addColumn('email_status', 'integer', ['signed'=>false])
        ->addColumn('birthday', 'date')
        ->addColumn('last_ip', 'string')
        ->addColumn('last_time', 'datetime')
        ->addColumn('status', 'integer', ['signed'=>false])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->addIndex(array('username'), array('unique'  =>  true))
        ->create();
    }

    public function down()
    {
        $table =  $this->table('admins');
        $table->drop();
    }
}
