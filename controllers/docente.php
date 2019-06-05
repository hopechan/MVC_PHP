<?php
    class Docente extends Controller{
        public function __construct() {
            parent::__construct();
            $this->view->docentes = [];
        }   
    }
?>