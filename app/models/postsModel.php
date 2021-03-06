<?php
/*
  ./app/models/postsModel.php
  Modèle des posts
*/

namespace App\Models\PostsModel;

/**
 * [findAll description]
 * @param  PDO   $conn    [description]
 * @return array          [description]
 */
function findAll(\PDO $conn) :array {
  $sql = "SELECT *, p.id as postId,
          c.id as categoryId,
          c.name as categoryName,
          p.created_at as postDate
          FROM posts p
          JOIN categories c ON p.category_id = c.id
          ORDER BY p.created_at DESC
          LIMIT 10;";
  $rs = $conn->query($sql);
  return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * [findOneById description]
 * @param  PDO   $conn               [description]
 * @param  int   $id                 [description]
 * @return array       [description]
 */
function findOneById(\PDO $conn, int $id) :array {
  $sql = "SELECT *, p.id as postId,
          c.id as categoryId,
          c.name as categoryName,
          p.created_at as postDate
          FROM posts p
          JOIN categories c ON p.category_id = c.id
          WHERE p.id = :id;";
  $rs = $conn->prepare($sql);
  $rs->bindValue(':id',$id, \PDO::PARAM_INT);
  $rs->execute();
  return $rs->fetch(\PDO::FETCH_ASSOC);
}

/**
 * [insert description]
 * @param  PDO   $conn
 * @param  array $data
 * @return int
 */
 function insert(\PDO $conn, array $data): int {
    $sql = "INSERT INTO posts
            SET title   = :title,
            text        = :text,
            quote       = :quote,
            category_id = :category,
            created_at  = CURRENT_TIMESTAMP();";
     $rs = $conn->prepare($sql);
     $rs->bindValue(':title', $data['title'], \PDO::PARAM_STR);
     $rs->bindValue(':text', $data['text'], \PDO::PARAM_STR);
     $rs->bindValue(':quote', $data['quote'], \PDO::PARAM_STR);
     $rs->bindValue(':category', $data['category_id'], \PDO::PARAM_INT);
     $rs->execute();
     return $conn->lastInsertId();
 }

/**
 * [updateOneById description]
 * @param  PDO   $conn
 * @param  int   $id
 * @param  array $data
 * @return bool
 */
function updateOneById(\PDO $conn, int $id, array $data): bool{
    $sql = "UPDATE posts
            SET title   = :title,
            text        = :text,
            quote       = :quote,
            category_id = :category
            WHERE id    = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':title', $data['title'], \PDO::PARAM_STR);
    $rs->bindValue(':text', $data['text'], \PDO::PARAM_STR);
    $rs->bindValue(':quote', $data['quote'], \PDO::PARAM_STR);
    $rs->bindValue(':category', $data['category_id'], \PDO::PARAM_INT);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);

    return intval($rs->execute());
}

/**
 * [deleteOneById description]
 * @param  PDO  $conn
 * @param  int  $id
 * @return bool
 */
function deleteOneById(\PDO $conn, int $id): bool{
    $sql = "DELETE FROM posts
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);

    return intval($rs->execute());
}

/**
 * [findNumberOfPosts description]
 * @param  PDO    $conn
 * @return [type]
 */
function findNumberOfPosts(\PDO $conn){
  $sql = "SELECT COUNT(p.id) AS nbrTotalPosts
          FROM posts p;";
  $rs = $conn->query($sql);
  return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * [findNumberOfPostsByCategory description]
 * @param  PDO    $conn       
 * @return [type]
 */
function findNumberOfPostsByCategory(\PDO $conn){
    $sql = "SELECT COUNT(id) AS nbrPostsByCategory, category_id
            FROM posts
            GROUP BY category_id;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
