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
