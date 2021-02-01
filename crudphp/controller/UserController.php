<?php

class UserController {
    public function __construct(){
        if (!empty($_GET["id"])) {
            $this->user = UserDAO::findByID($_GET["id"]);
        } else {
            $this->user = new User();
        }

        $action = @$_GET["action"];

        method_exists( $this, $action)?$this->$action() : $this->list();
    }

    public function list(){
        $this->render("list");
    }

    public function edit(){
        $template = "edit";

        if(!empty($_POST)) {
            $this->user->setParametersFromArray($_POST);
            if ($this->user->isValid()) {
                UserDAO::saveOrUpdate($this->user);
                $template = "list";
            }
        }
        
        $this->render($template);
    } 

    public function delete(){
        $template = "delete";
        if(!empty($_POST)) {
            if(!empty($this->user->getId())) {
                UserDAO::delete($this->user);
            }
            $template = "list";
        }

        $this->render($template);
    } 

    public function read(){
        $this->render("read");
    }

    public function render($template){
        $user = $this->user;
        include_once "view/$template.php";
    }

}