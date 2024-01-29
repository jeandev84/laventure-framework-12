<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder;

use Laventure\Component\Database\Connection\Query\Builder\Criteria\Delete;
use Laventure\Component\Database\Connection\Query\Builder\Criteria\Insert;
use Laventure\Component\Database\Connection\Query\Builder\Criteria\Select;
use Laventure\Component\Database\Connection\Query\Builder\Criteria\Update;

/**
 * Criteria
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder
 */
class Criteria
{

    public Select $select;
    public Insert $insert;
    public Update $update;
    public Delete $delete;


    /**
     * @var array
    */
    public array $wheres = [];

    /**
     * @var array
    */
    public array $parameters = [];



    public function __construct()
    {
        $this->select = new Select();
        $this->insert = new Insert();
        $this->update = new Update();
        $this->delete = new Delete();
    }
}