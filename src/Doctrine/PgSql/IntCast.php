<?php
/**
 * Int Cast
 *
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace DoctrineComponent\Doctrine\PgSql;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;

class IntCast extends FunctionNode
{
    public $stringPrimary;

    public function getSql(SqlWalker $sqlWalker)
    {
        return 'CAST(regexp_replace(' . $this->stringPrimary->dispatch($sqlWalker) . ", E'[A-Za-z\\\\-_]', '', 'g') AS integer)";
    }

    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);

        $this->stringPrimary = $parser->StringPrimary();

        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
