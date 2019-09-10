<?php
class Posts extends Controller
{
  public function __construct()
  {
    if (!isLoggedIn()){
      redirect('users/login');
    }else{
      $this->postModel = $this->model('Post');
    }

}
  public function index()
  {
    $posts = $this->postModel->getPosts();
    $data = [
      "title" => 'Post Page',
      "posts" => $posts
    ];
    $this->view(__CLASS__.'/index',$data);
  }

  public function show($id)
  {
    $post = $this->postModel->showPost($id);
    $data = ['post' => $post];
    $this->view('posts/show',$data);
  }

  public function delete($id)
  {
    $post = $this->postModel->showPost($id);
    if ($post->user_id !== $_SESSION['user_id']) {
      flash('post_message', 'Not Allowed', 'alert alert-danger text-center');
      redirect('posts');
    } else {
      $post = $this->postModel->deletePost($id);
      flash('post_message', 'Post Deleted Successfully', 'alert alert-info text-center');
      redirect('posts');
    }
  }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      $data=[
        'title' => 'Create Post',
        'post_title' => trim($_POST['post_title']),
        'body' => trim($_POST['body']),
        'user_id' => trim($_POST['userId']),
        'title_err' => '',
        'body_err' => ''
      ];
      if (empty($_POST['post_title'])){
        $data['title_err'] = 'Please Enter Post Title';
      }

      if (empty($_POST['body'])){
        $data['body_err'] = 'Please Enter Post Body';
      }

      if (empty($data['title_err']) && empty($data['body_err'])) {
        if($this->postModel->create($data)){
          flash('post_message','Post Created Successfully');
          redirect('posts');
        }
      } else{
          $this->view('posts/create',$data);
        }



    }else{
      $data=[
        'title' => 'Create Post',
        'post_title' => '',
        'body' => '',
        'user_id' => '',
        'title_err' => '',
        'body_err' => ''
      ];
      $this->view('posts/create',$data);
    }
  }

  public function edit($id)
  {
    $post = $this->postModel->showPost($id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      $data=[
        'id' => $id,
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'title_err' => '',
        'body_err' => ''
      ];
      if (empty($_POST['title'])){
        $data['title_err'] = 'Please Enter Post Title';
      }

      if (empty($_POST['body'])){
        $data['body_err'] = 'Please Enter Post Body';
      }

      if (empty($data['title_err']) && empty($data['body_err'])) {
        if($this->postModel->editPost($data)){
          flash('post_message','Post Updated Successfully');
          redirect('posts/show/'.$data['id']);
        }
      } else{
        $this->view('posts/edit',$data);
      }



    }else{
      if ($post->user_id !== $_SESSION['user_id']){
        flash('post_message','Not Allowed','alert alert-danger text-center');
        redirect('posts');
      }else{
        $data=[
          'id' => $post->postId,
          'title' => $post->title,
          'body' => $post->body,
          'title_err' => '',
          'body_err' => ''
        ];
        $this->view('posts/edit',$data);
      }

    }
  }

}