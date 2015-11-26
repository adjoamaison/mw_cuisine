<?php
	/**
	*author: Agatha Adjoa Maison
	*date: 22nd November, 2015
	*description: A class that manages the interactions of user favorite with the database
	*/
	include("adb.php");
	class favorite extends adb{
		/**
		*description: A function to add a user's favorite recipe to the database
		*@param name
		*@param recipe
		*@return sql result set
		*/
		function addFavorite($name,$recipe){
			$str_query="INSERT INTO cuisine_favorite SET username='$name', fav_recipe_id='$recipe'";
			return $this->query($str_query);
		}

		/**
		*description: A function to view a user's favorite recipes
		*@return sql result set
		*/
		function viewFavorite($name){
			$str_query="SELECT * FROM cuisine_favorite WHERE username='$name'";
			echo $str_query;
			return $this->query($str_query);
		}

		/**
		*description: A function to delete a user's favorite recipe from the database
		*@return sql result set
		*/
		function removeFavorite($id, $name){
			$str_query="DELETE FROM cuisine_favorite WHERE fav_id='$id' and username='$name'";
			return $this->query($str_query);
		}
	}
  ?>
