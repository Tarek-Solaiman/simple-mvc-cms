<?php
class Users extends Controller {
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                'title' => 'Register',
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            if (empty($_POST['name'])){
                $data['name_err'] = 'Please Enter Your Name';
            }

            if (empty($_POST['email'])){
                $data['email_err'] = 'Please Enter Your Email';
            }else{
                if ($this->userModel->findUserByEmail($_POST['email'])){
                    $data['email_err'] = 'Email Already Taken';
                }
            }

            if (empty($_POST['password'])){
                $data['password_err'] = 'Please Enter A Password';
            }elseif (strlen($_POST['password']) < 6){
                $data['password_err'] = 'Please Make Sure The Password Is At Least 6 Characters Long';
            }
            if (empty($_POST['confirm_password'])){
                $data['confirm_password_err'] = 'Please Confirm Your Password';
            }elseif ($_POST['password'] != $_POST['confirm_password']){
                $data['confirm_password_err'] = 'Passwords Don\'t Match';
            }

            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
                if ($this->userModel->insertUser($data)){
                    $this->login();
                    flash('post_message','You Are Registered '.$data['name']);
                    redirect('posts');
                }else{
                    die('Error');
                }
            }else{
                $this->view('users/register',$data);
            }


        }else{
            $data=[
                'title' => 'Register',
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->view('users/register',$data);
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                'title' => 'Login',
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            if (empty($_POST['email'])){
                $data['email_err'] = 'Please Enter Your Email';
            }

            if (empty($_POST['password'])){
                $data['password_err'] = 'Please Enter A Password';
            }

            if ($this->userModel->findUserByEmail($data['email'])){

            }else{
                $data['email_err'] = 'Email Not Found';
            }

            if (empty($data['email_err']) && empty($data['password_err'])){
                $loggedInUser = $this->userModel->login($data['email'],$data['password']);
                if ($loggedInUser){
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password_err'] = "Incorrect Password";
                    $this->view('users/login',$data);
                }
            }else{
                $this->view('users/login',$data);
            }

        }else{
            $data=[
                'title' => 'Login',
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            $this->view('users/login',$data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        redirect('posts/index');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        session_destroy();
        redirect('users/login');
    }

    public function show($id)
    {
        $user = $this->userModel->findUserById($id);
        $posts = $this->userModel->findUserPosts($id);
        $data = ['user' => $user, 'posts' => $posts];
        $this->view('users/show',$data);
    }

}
