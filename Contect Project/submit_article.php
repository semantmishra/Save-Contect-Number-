<?php
include('function.php');
$data = data_empyt($_POST);
	if($data===true)
	{
		$data = data_validate($_POST);
			if (is_array($data))
			{	
				include_once('database.php');
					$exist = Check_article_exist($data);
						if(is_array($exist))
						{
							$arcial_insert = Aricle_insert($exist);
								if($arcial_insert==true)
								{
								header("location:My_Article.php?s= Post SuccesFull");
								}
								else
								{
								header("location:My_Article.php?e= ".$arcial_insert);
								}
						}
						else
						{
						header("location:My_Article.php?e=".$exist);
						}
			}
			else
			{
			header("location:My_Article.php?e=".$data);
			}
	}
	else
	{
	header("location:My_Article.php?e=".$data);
	}





?>