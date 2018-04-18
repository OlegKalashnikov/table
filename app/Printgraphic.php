<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printgraphic extends Model
{
    public static function recarray($data, & $current, $parent = null) {
        foreach ($data as $item) {
            if ($item['parent_id'] == $parent) {
                $value = isset($item['value']) ? $item['value'] : 0;
                $current += $value;
                recarray($data, $current, $item['id']);
            }
        }
        return $current;
    }
}
