<?php
class User {
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }

  public function findUserByEmail($email)
  {
    $sql = "SELECT * FROM users WHERE email = :email";
    $this->db->query($sql);
    $this->db->bind(':email',$email);
    $row = $this->db->single();
    if ($this->db->rowCount() > 0){
      return true;
    }else{
      return false;
    }
  }

  public function findUserById($id)
  {
    $sql = "SELECT * FROM users WHERE id = :id";
    $this->db->query($sql);
    $this->db->bind(':id',$id);
    $row = $this->db->single();
    return $row;
  }

    public function findUserPosts($id)
    {
        $sql = "SELECT * FROM posts WHERE user_id = :id";
        $this->db->query($sql);
        $this->db->bind(':id',$id);
        $rows = $this->db->resultSet();
        return $rows;
    }

  public function login($email,$password)
  {
    $sql = "SELECT * FROM users WHERE email = :email";
    $this->db->query($sql);
    $this->db->bind(':email',$email);

    $row = $this->db->single();
    $hashed_password = $row->password;

    if (password_verify($password,$hashed_password)){
      return $row;
    }else{
      return false;
    }
  }

  public function insertUser($data)
  {
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $this->db->query($sql);
    $this->db->bind(':name',$data['name']);
    $this->db->bind(':email',$data['email']);
    $this->db->bind(':password',$data['password']);

    if ($this->db->execute()){
      return true;
    }else{
      return false;
    }
  }

}
