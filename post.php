<?php

class Post
{
    private int $id;
    private string $title;
    private string $content;
    private string $image;
    private string $published_at;
    private int $user_id;

    /**Le constructeur sui va recevoir les données tant attendues   */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    /**Définition des getters  */
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getPublished_at()
    {
        return $this->published_at;
    }
    public function getUser_id()
    {
        return $this->user_id;
    }



    /**definition des setters  */

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title)
    {
        $this->name = $title;

        return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function setPublished_at($published_at)
    {
        $this->published_at = $published_at;
        return $this;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}
