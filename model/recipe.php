<?php
	/**
	*author: Agatha Adjoa Maison
	*date: 22nd November, 2015
	*description: A class that manages the interactions of recipes with the database
	*/
	include("adb.php");
	class recipe extends adb
	{
		/**
		*description: A function to add a recipe to the database
		*@param name
		*@param chef
		*@param overview
		*@param ingredient
		*@param instruction
		*@param image
		*@param category
		*@return sql result set
		*/
		function addRecipe($name,$chef,$overview,$ingredient,$instruction,$image,$category){
			$str_query="INSERT INTO cuisine_recipe SET mealname='$name',chef_id='$chef',
				overview='$overview', ingredient_id='$ingredient', instruction_id='$instruction',
				meal_image='$image', category_id='$category'";
				echo $str_query;
			return $this->query($str_query);
		}

		/**
		*description: A function to increment the rating of a recipe by one
		*@param id
		*@return sql result set
		*/
		function rateRecipe($id){
			$str_query="UPDATE cuisine_recipe SET rating=rating+1 WHERE recipe_id='$id'";
			return $this->query($str_query);
		}

		/**
		*description: A function to view all added recipes
		*@return sql result set
		*/
		function viewRecipe(){
			$str_query="SELECT * FROM cuisine_recipe";
			return $this->query($str_query);
		}
	}
?>
