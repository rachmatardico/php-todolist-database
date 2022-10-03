<?php

namespace Repository
{

    use Entity\TodoList;
    use PDO;

    interface TodoListRepository
    {
        function save(TodoList $todoList):void;

        function remove(int $number):bool;

        function findAll():array;
    }

    class TodoListRepositoryImpl implements TodoListRepository
    {
        private array $todoList = array();

        private PDO $connection;

        public function __construct(PDO $connection)
        {
            $this->connection = $connection;
        }

        function save(TodoList $todoList): void
        {
            $sql = "INSERT INTO todolist(todo) VALUES(?)";
            $statement= $this->connection->prepare($sql);
            $statement->execute([$todoList->getTodo()]);
        }

        function remove(int $number): bool
        {
            $sql = "SELECT id FROM todolist WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$number]);

            if ($statement->fetch()) {
                // TODOLIST ADA
                $sql = "DELETE FROM todolist WHERE id = ?";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$number]);
                return true;
            }else {
                // TODOLIST TIDAK ADA
                return false;
            }
        }

        function findAll(): array
        {
            $sql = "SELECT id, todo FROM todolist";
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            $result = [];

            foreach ($statement as $row) {
                $todoList = new TodoList();
                $todoList->setId($row['id']);
                $todoList->setTodo($row['todo']);
                
                $result[] = $todoList;
            }

            return $result;
        }
    }
}