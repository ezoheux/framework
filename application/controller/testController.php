<?php


use limeberry\Controller;
use limeberry\dataman\factory\Column;
use limeberry\dataman\factory\Migration;
use limeberry\dataman\factory\Schema;
use limeberry\dataman\factory\Table;
use limeberry\dataman\MySqlConnect; /** Define packages separately for php version 7+ */

/**
 * [TESTS].
 */
class testController extends Controller
{
    public function indexAction()
    {
        //A simple call for migration
        //for test purpose only.
        //Main migration job must not proceed in controllers

        $schema = new Schema();
        $schema->Name('eshop')
                ->Version(1)
                ->Tables(
                    new Table('users',
                        new Column('userid', 'int', 'not null AUTO_INCREMENT primary key'),
                        new Column('password', 'varchar(250)', 'not null')),

                    new Table('books',
                        new Column('bookid', 'int', 'not null AUTO_INCREMENT primary key'),
                        new Column('userid', 'int', 'not null')
                ))->ForeignKey('books', 'userid', 'users', 'userid');

        //echo $schema;

        echo Migration::Up($schema, new MySqlConnect('localhost', 'root', ''));
    }
}
