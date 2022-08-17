<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Bugs extends AbstractMigration
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
        $BugsTable = $this->table('Bugs');
        $BugsTable->addColumn('Project_Id', 'string')
                  ->addColumn('Project_Name', 'string')
                  ->addColumn('Bug_Id', 'string')
                  ->addColumn('Bug_Progress', 'string')
                  ->addColumn('Bug_Title', 'string')
                  ->addColumn('Bug_Description', 'string')
                  ->addColumn('Bug_Time_Posted', 'datetime')
                  ->addColumn('Bug_Priority', 'string')
                  ->addColumn('Bug_Deleted_Date', 'datetime')
                  ->addColumn('Bug_Expected_Due_Date', 'datetime')
                  ->addColumn('Bug_Posted_By', 'string')
                  ->create();
    }
}
