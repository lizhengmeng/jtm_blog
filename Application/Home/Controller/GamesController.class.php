<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
class GamesController extends HomeBaseController {
    /*五子棋*/
    public function gobang(){
        $this->display();
    }
}