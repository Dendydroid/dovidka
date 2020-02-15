<?php

class JsonDatabase
{
	private $path;

	private $db;

	private $errorPath;

	public function __construct($pathClass)
	{
		$this->errorPath = __CLASS__ . __METHOD__;

		$this->path = new $pathClass();

		if(file_exists($this->path->db_path)){
			
			$this->db = file_get_contents($this->path->db_path);

		}else{

			file_put_contents($this->path->db_path, "{}");
		}

		$this->db = json_decode($this->db, true);
	}

	public function updateDB()
	{
		$fh = fopen( $this->path->db_path, 'w' );
		fclose($fh);
		file_put_contents($this->path->db_path, json_encode($this->db));
	}

	public function getAll()
	{
		return $this->db;
	}

	public function addOne(array $record)
	{
		$this->db[] = $record;

		$this->updateDB();
	}

	public function removeOne($searchKey, $searchValue)
	{
		foreach ($this->db as $index => $record) {
			foreach ($record as $row){
                foreach ($row as $key => $value) {
                    if($key === $searchKey && $searchValue){
                        unset($this->db[$index]);
                    }
                }
            }
		}
		$this->updateDB();
	}
}