<?php 

class TodoList
{
    private $id;
    private $title;
    private $description;
    private $important;
 
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getImportant()
    {
        return $this->important;
    }

    public function setImportant($important)
    {
        $this->important = $important;
    }
}
require_once ('../DBManager.php');
class ManagerTodoList extends DBManager
{
    public function getAllTodo()
    {
        $res = $this->getConnexion()->query('SELECT * FROM `todo_list`;');
        $todo_list = [];

        foreach ($res as $Todo_List) {
            $newTodoList = new TodoList;
            $newTodoList->setTitle($Todo_List['title']);
            $newTodoList->setDescription($Todo_List['description']);
            $newTodoList->setImportant($Todo_List['important']);
            $newTodoList->setId($Todo_List['id']);

            $todo_list[] = $newTodoList;

        }
        return $todo_list; 
    }
    public function findById($todo_list)
    {
        $request = 'SELECT * FROM todo_list where id =' . $todo_list;
        $query = $this->getConnexion()->query($request);
        $foundTodoList = $query->fetch();

        if ($foundTodoList) {
            $todo_list = new TodoList();
            $todo_list->setId($foundTodoList['id']);

            return $todo_list;
        } else {
            return null;
        }
    }

    public function create($todo_list) {
        $request = 'INSERT INTO todo_list (title,description,important) VALUE (?,?,?)';
        $query = $this->getConnexion()->prepare($request);
        $query->execute([
            $todo_list->getTitle(), $todo_list->getDescription(), $todo_list->getImportant()]);
        header('Location: pageTodo.php');
        return true;
    }
    public function delete($todo_list)
    {
        $todoToDelete = $this->findById($todo_list);

        if ($todoToDelete) {
            $request = 'DELETE FROM todo_list WHERE id =' . $todo_list . ';';
            $query = $this->getConnexion()->prepare($request);
            $query->execute();

            header('Location: pageTodo.php');
            exit();
        }
    }
}
