<?php
/**
 * Int Cast
 *
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace DoctrineComponent\Doctrine\MySql;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\QueryException;
use Doctrine\ORM\Query\SqlWalker;

class IntCast extends FunctionNode
{
    public $stringPrimary;

    public function getSql(SqlWalker $sqlWalker)
    {
        return 'CAST(' . $this->stringPrimary->dispatch($sqlWalker) . ' AS UNSIGNED)';
    }

    public function parse(Parser $parser)
    {
        try {
            $parser->match(Lexer::T_IDENTIFIER);

            $parser->match(Lexer::T_OPEN_PARENTHESIS);

            $this->stringPrimary = $parser->StringPrimary();

            $parser->match(Lexer::T_CLOSE_PARENTHESIS);
        } catch (QueryException $e) {
        }
    }
}
