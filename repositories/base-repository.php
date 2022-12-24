<?php
    class BaseRepository 
    {
        protected $db = null;
        protected $table = '';

        protected function __construct(string $tableName) 
        {
           $this->db = new PDO('sqlite:' . __DIR__ .'/../test.db', null, null);
           $this->table = $tableName;
        }
    }



