<?php

function getPost($id)
{
    $statement = getDb()->prepare("SELECT * FROM posts WHERE id = :id");
    $statement->execute([$id]);
    
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function getAllPosts()
{
    $statement = getDb()->query("SELECT * FROM posts ORDER BY id DESC");
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $posts;
}

function createPost(string $title, string $content = ""):int
{
    $statement = getDb()->prepare("INSERT INTO posts (title, content) VALUES (:title, :content);");
    $statement->execute([
        'title' => $title,
        'content' => $content
    ]);

    return 1;
}

function updatePost(int $id = 0, string $title = "", string $content = ""):int
{
    $statement = getDb()->prepare("SELECT * FROM posts WHERE id = :id;");
    $statement->execute([$id]);
    $post = $statement->fetch(PDO::FETCH_ASSOC);

    if ($post == null) {
        return 0;
    }

    $statement = getDb()->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :id ;");
    $statement->execute([
        'id' => $id,
        'title' => $title,
        'content' => $content
    ]);

    return 1;
}

function deletePost(int $id = 0):int
{
    $statement = getDb()->prepare("SELECT * FROM posts WHERE id = :id;");
    $statement->execute([$id]);
    $post = $statement->fetch(PDO::FETCH_ASSOC);

    if ($post == null) {
        return 0;
    }

    $statement = getDb()->query("DELETE FROM posts WHERE id = :id;");
    $statement->execute([$id]);

    return 1;
}