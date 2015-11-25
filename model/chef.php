<?php
	/**
	*author: Agatha Adjoa Maison
	*date: 22nd November, 2015
	*description: A class that manages the interactions of chefs with the database
	*/
	include("adb.php");
	class chef extends adb{

		/**
		*description: A function to add a chef's profile to the database
		*@param name
		*@param number
		*@param address
		*@param email
		*@return sql result set
		*/
		function addChef($name,$number,$address,$email){
			$str_query="INSERT INTO cuisine_chef set chef_name='$name', chef_pnumber='$number',
				chef_address='$address', chef_email='$email'";
			return this->query($str_query);
		}

		/**
		*description: A function to all chefs in the database
		*@return sql result set
		*/
		function viewChef(){
			$str_query="SELECT * FROM cuisine_chef";
			return $this->query($str_query);
		}
	}
  ?>
