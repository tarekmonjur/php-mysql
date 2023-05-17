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
	
   protected function getCategoriesTree($categories, $parent = null, $index = 0)
	{
		foreach($categories as $key => $category){
			if (!$parent && !$category['ParentcategoryId'] && !$category['categoryId']){
				$results[$category['SystemKey']] = $category;
				echo $category['SystemKey']. "(". $category['total_items'] .")";
				echo "<br>";
				$child = $this->getCategoriesTree($categories, $category, 1);
				if ($child) {
					$results[$category['SystemKey']]['child'] = $child;
				}
			}

			if ($category['ParentcategoryId'] && $category['ParentcategoryId'] === $parent['Id']) {
				$results[$category['SystemKey']] = $category;
				echo str_repeat(" - ", $index);
				echo $category['SystemKey']. "(". $category['total_items'] .")";
				echo "<br>";
				$child = $this->getCategoriesTree($categories, $category, ++$index);
				$index--;
				if ($child) {
					$results[$category['SystemKey']]['child'] = $child;
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
// echo "<pre>";
// print_r($data);
// echo json_encode($data);

?>
