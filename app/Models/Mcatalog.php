<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TypiCMS\NestableTrait;

class Mcatalog extends Model
{
    use HasFactory;
    use NestableTrait;

    protected $table = 'catalog';
    protected $primaryKey = 'id';

    public function treeList()
    {
        return Mcatalog::orderByRaw('-name ASC')
            ->where('status', 1)
            ->where('trash', 1)
            ->get()
            ->nest()
            ->listsFlattened('name');
    }

    public static function catalogList($list, $parent_id, $arr)
    {
        foreach ($list as $item) {
            if($item['parent_id'] != $parent_id) {
                $arr[] = $item['id'];
                Mcatalog::catalogList($list, $item['id'], $arr);
            }
        }

        return $arr;
    }
}
