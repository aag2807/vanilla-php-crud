<?php 
    interface IBaseRepository
    {
        public function getAll();
        public function getById($id);
        public function create($entity);
        public function update($entity);
        public function delete($id);
    }