<?php
//============================================================================
//          Base Controller
//          Loads Models And Views
//============================================================================

class Controller {
  public function model($model)
  {
    require_once APPROOT.'/models/'.$model.'.php';

    return new $model();
  }

  public function view($view, $data = [])
  {
    if (file_exists(APPROOT.'/views/' . $view . '.php')){
               require_once APPROOT.'/views/' . $view . '.php';
    }else{
      die("Page Not Found");
    }
  }

}