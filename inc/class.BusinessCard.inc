<?php

class BusinessCard extends Crud 
{
   public $idOrders;	
	public $empName;
	public $empTitle;
	public $empContact;
	public $empCampus;
	public $empFund;
	public $empDept;
	public $empProgram;
	public $empClass;
	public $empProject;
	public $submitDate;
	public $sentToPrinter;
	
      public function BusinessCardList($sql)
  				{   
	  				$i = 0;    		
			      $this->conn();
			      $stmt = $this->db->prepare($sql);
			      $stmt->bindParam(':id', $id);
			      $stmt->execute();
			      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "<table border='1'>";
			      foreach($rows as $row)
				    	{   
				    	echo "<tr>";
				    		++$i;
				        	foreach($row as $fieldname=>$value)
				        		{
				        				echo "<td>";
				           			echo $this->$fieldname=$value;
				           			echo "</td>";
				        		}
						echo "</tr>";
			      		}
			      		echo "</table>";
			      return $i;
			  }
        
        
}// Class ending
?>