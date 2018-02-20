<?php

namespace App\Helpers;

trait GetSelected
{
	/**
	 * @param  int $id - id of the current instance
	 * @param  string $item_to_search - name of related class(of table in db)
	 * @param  obj $dependent - method name of relation in Model (for example method "template" in Campaign.php model)
	 * @param  string name of the field in database
	 * @return [array]
	 */
	public static function selected( $id, $dependend, $item_to_search, $field_to_pluck = 'name' ) {

	 	$item = static::with($dependend)->findOrFail($id);

	 	$item_subs = $item->{$dependend}->pluck($field_to_pluck, 'id')->toArray();
	 	$item_to_search = $item_to_search->toArray();

        $selected_subs = [];

        foreach ($item_to_search as $key => $val) {
            if (array_key_exists($key, $item_subs)) {
                $selected_subs[] = $key;
            }
        }

        return $selected_subs;
 	}
}
