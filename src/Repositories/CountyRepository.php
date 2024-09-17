<?php

namespace App\Repositories;
class CountyRepository extends BaseRepository
{
    function __construct($host = self::HOST, $user = self::USER, $password = self::PASSWORD, $db = self::DATABASE)
    {
        parent::__construct(host: $host, user: $user, password: $password, database: $db);
        $this->tableName = 'counties';
    }
}