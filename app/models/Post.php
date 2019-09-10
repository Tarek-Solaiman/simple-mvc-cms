<?php
class Post{
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }

  public function getPosts()
  {
    $sql = "SELECT *, posts.id as postId, users.id as userId FROM posts LEFT JOIN 
    users ON posts.user_id = users.id ORDER BY posts.created_at DESC";
    $this->db->query($sql);
    return $this->db->resultSet();
  }

  public function showPost($id)
  {
    $sql = "SELECT *, posts.id as postId, users.id as userId FROM posts LEFT JOIN 
    users ON posts.user_id = users.id WHERE posts.id = :id";
    $this->db->query($sql);
    $this->db->bind(':id',$id);
    $row = $this->db->single();
    return $row;
  }

  public function deletePost($id)
  {
    $sql = "DELETE FROM posts WHERE posts.id = :id";
    $this->db->query($sql);
    $this->db->bind(':id',$id);
    return $this->db->execute();
  }

  public function editPost($data)
  {
    $sql = "UPDATE `posts` SET `title` = :title, `body` = :body WHERE `posts`.`id` = :id";
    $this->db->query($sql);
    $this->db->bind(':title',$data['title']);
    $this->db->bind(':body',$data['body']);
    $this->db->bind(':id',$data['id']);
    if ($this->db->execute()){
      return true;
    }else{
      return false;
    }
  }

  public function create($data)
  {
    $sql = "INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)";
    $this->db->query($sql);
    $this->db->bind(':user_id',$data['user_id']);
    $this->db->bind(':title',$data['post_title']);
    $this->db->bind(':body',$data['body']);

    if ($this->db->execute()){
      return true;
    }else{
      return false;
    }
  }
}