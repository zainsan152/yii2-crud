<?php 
namespace app\models;
use yii\db\ActiveRecord;

/**
 * 
 */
class Jobs extends ActiveRecord
{
	
	private $name;
	private $role;
	private $description;

	public function rules()
	{
		return[[
			['name' , 'role' , 'description'] , 'required']
		];
	}
}
 ?>