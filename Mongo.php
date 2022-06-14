<?php

use MongoDB\Driver\{Manager, BulkWrite, WriteResult, Query};

class Mongo {
	private Manager $connection;
	public function __construct(string $connectionString)
	{
		$this->connection = new Manager($connectionString);
	}

	public function insert(string $database, string $collection, array $data):WriteResult
	{
		$commandConnection = new BulkWrite();
		$commandConnection->insert($data);
		return $this->connection->executeBulkWrite($database.".".$collection, $commandConnection);
	}

	public function delete(string $database, string $collection, array $whereData):WriteResult
	{
		$commandConnection = new BulkWrite();
		$commandConnection->delete($whereData);
		return $this->connection->executeBulkWrite($database.".".$collection, $commandConnection);
	}

	public function update(string $database, string $collection, array $data, bool $multiOption = false):WriteResult
	{
		$commandConnection = new BulkWrite();
		$commandConnection->update($data[0],$data[1], ['multi' => $multiOption]);
		return $this->connection->executeBulkWrite($database.".".$collection, $commandConnection);
	}

	public function get(string $database, string $collection, array $whereData = [])
	{
		$commandQuery = new Query($whereData);
		return $this->connection->executeQuery($database.".".$collection, $commandQuery)->toArray();
	}
}