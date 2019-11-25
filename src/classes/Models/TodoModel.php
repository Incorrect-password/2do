<?php


namespace Example\Models;


use Psr\Container\ContainerInterface;

class TodoModel
{
    private $db;

    /**
     * TodoModel constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getTodos() {
        $query = $this->db->query('SELECT `id`, `todo`, `complete`, `deleted` FROM `2dos` WHERE `deleted` = 0 AND `complete` = 0');
        $todos = $query->fetchAll();
        return $todos;
    }

    /**
     * takes the data about checked boxes from the list form and applies it to db
     * @param $data
     */
    public function completeTodo($data) {
        foreach ($data as $id){
        }
        $query = $this->db->prepare('UPDATE `2dos` SET `complete` = 1 WHERE `id` = :id');
        $query->execute(['id'=> $id]);
    }

    /**
     * adds data from the add todos form and applies it to db
     * @param $data
     */
    public function addTodo($data) {
        $query = $this->db->prepare('INSERT INTO `2dos`(`todo`,`complete`, `deleted`) VALUES (:todo ,0, 0)');
        $query->execute(['todo'=>$data]);
    }

    /**
     * returns the todos marked as complete
     * @return mixed
     */
    public function getComplete() {
        $query = $this->db->query('SELECT `id`, `todo`, `complete`, `deleted` FROM `2dos` WHERE `deleted` = 0 AND `complete` = 1');
        $complete = $query->fetchAll();
        return $complete;
    }

    /**
     *
     * @param $data
     */
    public function deleteTodo($data) {
        foreach ($data as $id){
        }
        $query = $this->db->prepare('UPDATE `2dos` SET `deleted` = 1 WHERE `id` = :id');
        $query->execute(['id'=> $id]);
    }

}