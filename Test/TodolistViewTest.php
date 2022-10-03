<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodoListRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../View/TodolistView.php";
require_once __DIR__ . "/../Helper/InputHelper.php";


use Entity\TodoList;
use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;
use View\TodoListView;

function testViewShowTodoList()
{
    $todoListRepository = new TodoListRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar OOP");
    $todoListService->addTodoList("Belajar Database");

    $todoListView->showTodoList();
}

function testViewAddTodoList()
{
    $todoListRepository = new TodoListRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar OOP");
    $todoListService->addTodoList("Belajar Database");

    $todoListService->showTodoList();

    $todoListView->addTodoList();
    $todoListService->showTodoList();
}

function testViewRemoveTodoList()
{
    $todoListRepository = new TodoListRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar OOP");
    $todoListService->addTodoList("Belajar Database");
    
    $todoListService->showTodoList();
    $todoListView->removeTodoList();

    $todoListService->showTodoList();
    $todoListView->removeTodoList();
     
    $todoListService->showTodoList();
}

testViewRemoveTodoList();