<?php
/*
  ./app/models/postsModel.php
*/

namespace App\Models\PostsModel;

/**
 * [findAll description]
 * @param  PDO   $conn    [description]
 * @return array          [description]
 */
function findAll(\PDO $conn) :array {
  $sql = "SELECT *
          FROM posts
          ORDER BY created_at DESC
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
  $sql = "SELECT *
          FROM posts
          WHERE id = :id;";
  $rs = $conn->prepare($sql);
  $rs->bindValue(':id',$id, \PDO::PARAM_INT);
  $rs->execute();
  return $rs->fetch(\PDO::FETCH_ASSOC);
}
