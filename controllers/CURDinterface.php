<?php
interface CRUDInterface
{
    function selectAll($table): PDOStatement;
    function selectOne($table, $conditions): PDOStatement;
    function update($query): PDOStatement;
    function delete($query): PDOStatement;
    function insert($query): PDOStatement;
}