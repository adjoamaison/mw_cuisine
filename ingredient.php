<?php
	/**
	*author: Agatha Adjoa Maison
	*date: 22nd November, 2015
	*description: A class that manages the interactions of ingredients with the database
	*/
	include("adb.php");
	class user ingredient adb{
		/**
		*description: A function to add an ingredient to the database
		*@param recipe
		*@param ingre
		*@return sql result set
		*/
		function addIngredient($recipe,$ingre){
			$str_query="INSERT INTO cuisine_ingredient SET recipe_id='$recipe', ingredient='$ingre'";
			return $this->query($str_query);
		}

		/**
		*description: A function to get all ingredients of a particular recipe by id
		*@return sql result set
		*/
		function getIngredients($id){
			$str_query="SELECT * cuisine_ingredient WHERE recipe_id='$id'";
			return $this->query($str_query);
		}


	}
  ?>
