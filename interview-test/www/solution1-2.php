<?php

require_once './connection.php';

class Category {

	private $db;
    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = new DatabaseConnection('mysql');
        $this->db = $this->dbConnection->getConnection();
    }

   private function subCategories($categories, $parent, $index = 0)
   {
		$subs = [];	
		foreach($categories as $key => $category){
			if ($category['ParentcategoryId'] === $parent['Id']) {
				$subs[$category['SystemKey']] = $category;
				$child = $this->subCategories($categories, $category, $index);
				if ($child) {
					$subs[$category['SystemKey']]['child'] = $child;
				}
			}
		}
		return $subs;
   }

   protected function getCategoriesTree($categories, $parent = null)
   {
	   foreach($categories as $key => $category){
		   if (!$parent && !$category['ParentcategoryId'] && !$category['categoryId']){
			   $results[$category['SystemKey']] = $category;
			   $subs = $this->subCategories($categories, $category, 1);
			   if ($subs) {
				   $results[$category['SystemKey']]['child'] = $subs;
			   }
		   }
	   }
	   return $results;
   }

	public function getCategories() {
		$data = [];
		$query = "SELECT c.*, cr.ParentcategoryId, cr.categoryId,
			(SELECT COUNT(categoryId) FROM Item_category_relations WHERE categoryId = c.Id) total_items
			FROM category c
			LEFT JOIN catetory_relations cr ON c.Id = cr.categoryId";
		$result = $this->db->query($query);
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$categoryResult[$row['Id']] = $row;
			}
		
			$data = $this->getCategoriesTree($categoryResult);
		}
		return $data;
	}

	public function __destruct(){
        $this->dbConnection->closeConnection();
    }
}

$category = new Category();
$data = $category->getCategories();
echo "<pre>";
print_r($data);
// echo json_encode($data);

?>
