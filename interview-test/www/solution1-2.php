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

   private function subCategories($categories, $parent, $subs_total = 0)
   {
		$subs = [];	
		$subs_total =  0;
		foreach($categories as $key => $category){
			if ($category['ParentcategoryId'] === $parent['Id']) {
				$subs[$category['SystemKey']] = $category;
				$subs_total = $subs_total + $category['total_items'];

				$child = $this->subCategories($categories, $category, $subs_total);
				
				if ($child['child']) {
					$subs[$category['SystemKey']]['TotalItems'] = $child['sub_total'];
					$subs[$category['SystemKey']]['child'] = $child['child'];
				} else {
					$subs[$category['SystemKey']]['TotalItems'] = $category['total_items'];
				}
				$total = $total + $child['sub_total'];
			}
		}
		
		return ['child' => $subs, 'sub_total' => $subs_total, 'total' => $total];
   }

   protected function getCategoriesTree($categories, $parent = null)
   {
	   	foreach($categories as $key => $category){
		   if (!$parent && !$category['ParentcategoryId'] && !$category['categoryId']){
			   	$results[$category['SystemKey']] = $category;
			   	$subs = $this->subCategories($categories, $category);
			   	
			   	if ($subs['child']) {
					$results[$category['SystemKey']]['TotalItems'] = $subs['total'];
				   	$results[$category['SystemKey']]['child'] = $subs['child'];
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
