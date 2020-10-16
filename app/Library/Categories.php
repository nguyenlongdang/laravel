<?php 

namespace App\Library;

class Categories {

    public static function catalogList($listCat, $parent_id, $arr) {
        foreach ($listCat as $item) {
            if($item['parent_id'] != $parent_id) {
                $arr[] = $item['id'];
                Categories::catalogList($listCat, $item['id'], $arr);
            }
        }

        return $arr;
    }
}