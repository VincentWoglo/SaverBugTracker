<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class NewProject extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $UserTable = $this->table('Projects');
        $UserTable->addColumn('Project_Id', 'string')
                  ->addColumn('Project_Title', 'string')
                  ->addColumn('Time_Created', 'datetime')
                  ->addColumn('Project_Created_By', 'string')
                  ->addColumn('User_Id', 'datetime')
                  ->addColumn('Project_Manager', 'string')
                  ->create();
    }
}
