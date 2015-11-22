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
		*@return
		*/
		function addRecipe($name,$chef,$overview,$ingredient,$instruction,$image,$category,$rating){
			$str_query="INSERT INTO cuisine_recipe SET mealname='$name',chef_id='$chef',
				overview='$overview', ingredient_id='$ingredient_id', instruction='$instruction',
				meal_image='$image', category_id='$category'";
			return $this->query($str_query);
		}

	}
?>
