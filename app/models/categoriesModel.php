<?php
/*
  ./app/models/categoriesModel.php
  Modèle des catégories
 */

namespace App\Models\CategoriesModel;

/**
 * [findAll description]
 * @param  PDO   $conn
 * @return array
 */
function findAll(\PDO $conn): array {
    $sql = "SELECT *
            FROM categories
            ORDER BY name ASC;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
