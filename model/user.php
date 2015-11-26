<?php
	/**
	*author: Agatha Adjoa Maison
	*date: 22nd November, 2015
	*description: A class that manages the interactions of a user with the database
	*/
	include("adb.php");
	class user extends adb{
		/**
		*description: A function to add a user to the database
		*@param name
		*@param pword
    *@param number
		*@return sql result set
		*/
		function addUser($name,$pword,$number){
			$str_query="INSERT INTO cuisine_user SET username='$name', upassword='$pword', user_pnumber='$number'";
			return $this->query($str_query);
		}

		/**
		*description: A function to get a user by id
		*@return sql result set
		*/
		function getUser($id){
			$str_query="SELECT * FROM cuisine_user WHERE user_id='$id'";
			return $this->query($str_query);
		}
	}
  ?>
