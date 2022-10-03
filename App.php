<?php

require_once __DIR__ . "/Entity/Todolist.php";
require_once __DIR__ . "/Helper/InputHelper.php";
require_once __DIR__ . "/Repository/TodoListRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/View/TodolistView.php";
require_once __DIR__ . "/Config/Database.php";

use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;
use View\TodoListView;

echo "APLIKASI TODOLIST" . PHP_EOL;

$connection = Config\Database::getConnection();
$todoListRepository = new TodoListRepositoryImpl($connection);
$todoListService = new TodoListServiceImpl($todoListRepository);
$todoListView = new TodoListView($todoListService);

$todoListView->showTodoList();