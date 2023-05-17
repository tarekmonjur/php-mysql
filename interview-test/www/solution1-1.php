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

    protected function getCategory() {
        $query = "SELECT c.name AS 'Category Name', 
            (SELECT COUNT(categoryId) FROM Item_category_relations WHERE categoryId = c.id) AS total_items
            FROM category c
            ORDER BY total_items DESC";

        $result = $this->db->query($query);
        return $result;
    }

    public function display() {
        $result = $this->getCategory();
        if ($result) {
            // Print results in a table
            echo "<table style='border-collapse: collapse; border: 1px solid black;'>";
            echo "<tr><th style='border: 1px solid black;'>Category Name</th><th style='border: 1px solid black;'>Total Items</th></tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='border: 1px solid black;'>" . $row['Category Name'] . "</td>";
                echo "<td style='border: 1px solid black;'>" . $row['total_items'] . "</td>";
                echo "</tr>";
            }
        
            echo "</table>";
        } else {
            echo "Error executing the query: " . $conn->error;
        }
    }

    public function __destruct(){
        $this->dbConnection->closeConnection();
    }
}

$category = new Category();
$category->display();

?>
