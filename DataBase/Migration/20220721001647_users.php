<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Users extends AbstractMigration
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
        $UserTable = $this->table('Users');
        $UserTable->addColumn('Email', 'string')
                  ->addColumn('FirstName', 'string')
                  ->addColumn('LastName', 'string')
                  ->addColumn('DateOfBirth', 'string')
                  ->addColumn('DateJoined', 'datetime')
                  ->addColumn('TermsOfAgreement', 'string')
                  ->addColumn('Company', 'string')
                  ->create();
    }
}
