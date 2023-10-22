<?php

// DB Credentials
// maybe move these to a .ENV file later?
// change these to your local credentials when working locally

class Database
{
    protected $connection = null;
    public function __construct()
    {
        try {
            $env = parse_ini_file(__DIR__ . '/../../.env');
            $server = $env['server'];
            $username = $env['username'];
            $password = $env['password'];
            $database = $env['database'];
            $this->connection = new mysqli($server, $username, $password, $database);

            if (mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function select($query = "", $params = [])
    {
        try {
            $stmt = $this->executeStatement($query, $params);
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }
    public function delete($query = "", $params = [])
    {
        try {
            $this->executeStatement($query, $params);
            $result = '';
            if (mysqli_affected_rows($this->connection) > 0) {
                return "Course " . $params[1] . " deleted";
            } else {
                return "Course " . $params[1] . " not deleted";
            }
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }
    private function executeStatement($query = "", $params = [])
    {
        try {
            $stmt = $this->connection->prepare($query);
            if ($stmt === false) {
                throw new Exception("Unable to do prepared statement: " . $query);
            }
            if ($params) {
                $stmt->bind_param($params[0], $params[1]);
            }
            $stmt->execute();
            return $stmt;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
