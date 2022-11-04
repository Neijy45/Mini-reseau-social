

<?php

class PostController
{
    private PDO $db;

    public function __construct()
    {
        $dbName = "bd";
        $port = 3306;
        $userName = "root";


        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port;charset=utf8mb4", $userName));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function setDb(PDO $db)
    {
        $this->db = $db;
        return $this;
    }

    public function create(Post $post)
    {
        $req = $this->db->prepare("INSERT INTO `post` (title, content, image, published_at, user_id) VALUES (:title, :content, :image, :published_at, :user_id)");
        $req->bindValue(":title", $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(":image", $post->getImage(), PDO::PARAM_STR);
        $req->bindValue(":published_at", $post->getPublished_at(), PDO::PARAM_STR);
        $req->bindValue(":user_id", $post->getUser_id(), PDO::PARAM_INT);
        $req->execute();
    }

    public function update(Post $post)
    {
        $req = $this->db->prepare("UPDATE `post` SET title = :title , content = :content, image = :image, published_at = :published_at, user_id= :user_id WHERE id = :id");
        $req->bindValue(":id", $post->getId(), PDO::PARAM_INT);
        $req->bindValue(":title", $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(":image", $post->getImage(), PDO::PARAM_STR);
        $req->bindValue(":published_at", $post->getPublished_at(), PDO::PARAM_STR);
        $req->bindValue(":user_id", $post->getUser_id(), PDO::PARAM_INT);
        $req->execute();
    }

    public function delete(Post $post)
    {
        $req = $this->db->prepare("DELETE FROM `post` WHERE id = :id");
        $req->bindValue(":id", $post->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    public function read(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `post` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $post = new Post($data);
        return $post;
    }

    public function readAll()
    {
        $posts = [];
        $req = $this->db->query("SELECT * FROM `post`");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $post = new Post($data);
            $posts[] = $post;
        }
        return $posts;
    }
}
