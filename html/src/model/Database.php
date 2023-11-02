<?php
/*
Module that interacts with the CourseModel to execute 
database queries
*/

class Database
{
    protected $connection = null;

    /*
    ======================================================================
    ||                     Miscellaneous Functions                      ||
    ======================================================================
    */

    // Set up connection to SQL database
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

    // Executes a statement on the database
    private function executeStatement($query = "", $params = [])
    {
        try {
            $stmt = $this->connection->prepare($query);
            if ($stmt === false) {
                throw new Exception("Unable to do prepared statement: " . $query);
            }

            // Prepares the parameters prior to executing the db statement
            if (!empty($params)) {
                $newParams = array();
                for ($i = 0; $i < count($params); $i++) {
                    $newParams[] = &$params[$i];
                }

                call_user_func_array(array($stmt, 'bind_param'), $newParams);
            }

            $stmt->execute();
            return $stmt;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function select($query = "", $params = [])
    {
        try {
            $stmt = $this->executeStatement($query, $params);
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            // Checks if the response is valid
            if (!empty($result)) {
                return $result;
            }
            $result = "No results found!";
            $stmt->close();
            return $result;

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /*
    ======================================================================
    ||                        Course Functions                          ||
    ======================================================================
    */

    // Checks if a course exists in the Courses table
    private function checkCourseExists($courseCode)
    {
        $query = "SELECT COUNT(*) FROM Courses WHERE CourseCode = ?";
        $params = ["s", $courseCode];
        $count = 0;

        $stmt = $this->executeStatement($query, $params);

        $stmt->bind_result($count);

        $stmt->fetch();

        return $count;
    }

    // Creates a course given the course code & parameters
    public function create($query = "", $params = [])
    {
        try {
            // Check if the course already exists
            $courseExists = $this->checkCourseExists($params[1]);

            if ($courseExists) {
                return "Course " . $params[1] . " already exists";
            } else {
                $this->executeStatement($query, $params);
                if (mysqli_errno($this->connection) === 0) {
                    return "Course " . $params[1] . " has been created!";
                } else {
                    return "Unable to create " . $params[1] . "!";
                }
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Deletes a course given the course code
    public function delete($query = "", $params = [])
    {
        try {
            $courseExists = $this->checkCourseExists($params[1]);

            if ($courseExists) {
                $this->executeStatement($query, $params);
                if (mysqli_errno($this->connection) === 0) {
                    return "Course " . $params[1] . " has been deleted!";
                } else {
                    return "Unable to delete " . $params[1] . "!";
                }
            } else {
                return "Course " . $params[1] . " not found";
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // updates a course given the course code & parameters
    public function update($query = "", $params = [])
    {
        // Check if the course already 
        try {
            $this->executeStatement($query, $params);
            if (mysqli_errno($this->connection) === 0) {
                return "Course " . $params[13] . " has been updated!"; // offset 13 for the last bind
            } else {
                return "Unable to update " . $params[1] . "!";
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /*
    ======================================================================
    ||                  Student Course_Taken Functions                  ||
    ======================================================================
    */

    // Checks if a course exists from the CoursesTaken table
    private function checkCourseExistsStudent($courseCode)
    {
        $query = "SELECT COUNT(*) FROM Courses_Taken WHERE CourseCode = ?";
        $params = ["s", $courseCode];
        $count = 0;

        $stmt = $this->executeStatement($query, $params);

        $stmt->bind_result($count);

        $stmt->fetch();

        return $count;
    }

    // Creates a course for the students taken courses given the course code & parameters 
    public function createStudent($query = "", $params = [])
    {
        try {
            // Check if the course already exists
            $courseExists = $this->checkCourseExistsStudent($params[1]);

            if ($courseExists) {
                return "Course " . $params[1] . " already exists";
            } else {
                $this->executeStatement($query, $params);
                if (mysqli_errno($this->connection) === 0) {
                    return "Course " . $params[1] . " has been created!";
                } else {
                    return "Unable to create " . $params[1] . "!";
                }
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Deletes a course from students taken courses given the course code
    public function deleteStudent($query = "", $params = [])
    {
        try {
            $courseExists = $this->checkCourseExistsStudent($params[1]);

            if ($courseExists) {
                $this->executeStatement($query, $params);
                if (mysqli_errno($this->connection) === 0) {
                    return "Course " . $params[1] . " has been deleted!";
                } else {
                    return "Unable to delete " . $params[1] . "!";
                }
            } else {
                return "Course " . $params[1] . " not found";
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // updates a course in the student's taken courses given the course code & parameters
    public function updateStudent($query = "", $params = [])
    {
        try {
            $courseExists = $this->checkCourseExistsStudent($params[2]);

            if ($courseExists) {
                $this->executeStatement($query, $params);
                if (mysqli_errno($this->connection) === 0) {
                    return "Course " . $params[2] . " has been updated!";
                } else {
                    return "Unable to update " . $params[2] . "!";
                }
            } else {
                return "Course " . $params[2] . " not found";
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

    }
}