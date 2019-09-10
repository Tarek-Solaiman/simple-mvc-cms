<?php
class Pages extends Controller
{
  public function index()
  {
    $data = [
      'title'=>'Home',
      'description' => 'This Is The Home Page Description'
    ];
    $this->view(__CLASS__.'/index',$data);
  }
  public function about()
  {
    $data = [
      'title'=>'About Page',
      'description' => 'This Is The About Page Description'
    ];
    $this->view(__CLASS__.'/about',$data);
  }
}