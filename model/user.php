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
			$str_query="INSERT INTO cuisine_user SET username='$name', fav_recipe_id='$recipe', user_pnumber='$number'";
			return $this->query($str_query);
		}

		/**
		*description: A function to get a user by id
		*@return sql result set
		*/
		function getUser($id){
			$str_query="SELECT * cuisine_user WHERE user_id='$id'";
			return $this->query($str_query);
		}

		/**
		*description: A function to get a user's phone number from the database
		*@return sql result set
		*/
		function getUnum($id){
			$str_query="SELECT user_pnumber FROM cuisine_user WHERE user_id='$id'";
			return $this->query($str_query);
		}

		/**
		*description: A function to get a user's username from the database
		*@return sql result set
		*/
		function getUname($id){
			$str_query="SELECT username FROM cuisine_user WHERE user_id='$id'";
			return $this->query($str_query);
		}
	}
  ?>
