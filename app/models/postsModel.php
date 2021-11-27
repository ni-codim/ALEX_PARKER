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
