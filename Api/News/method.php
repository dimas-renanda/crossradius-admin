<?php
require_once "koneksi.php";
class News 
{

	public  function get_news()
	{
		global $mysqli;
		$query="SELECT * FROM news";
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Berita Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function get_newsid($id=0)
	{
		global $mysqli;
		$query="SELECT * FROM news";
		if($id != 0)
		{
			$query.=" WHERE id =".$id." LIMIT 1";
		}
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get 1 News Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
		 
	}

	
}

 ?>