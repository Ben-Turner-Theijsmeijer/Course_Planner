
SELECT * FROM Courses LIMIT 3;
--+----------+------------+--------------------------------------+----------------------+--------------+--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+-------------------------------------------------+--------------------------------------------------+---------------------+--------------+--------------+---------------------+--------------------------+----------+
--| CourseID | CourseCode | CourseName                           | CourseOffering       | CourseWeight | CourseDescription                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  | CourseFormat                                    | Prerequisites                                    | PrerequisiteCredits | Corequisites | Restrictions | Equates             | Department               | Location |
--+----------+------------+--------------------------------------+----------------------+--------------+--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+-------------------------------------------------+--------------------------------------------------+---------------------+--------------+--------------+---------------------+--------------------------+----------+
--|        1 | ACCT*1220  | Introductory Financial Accounting    | Summer, Fall, Winter |          0.5 | This course will introduce students to the fundamental concepts and practices of Financial Accounting. Students are expected to become adept at performing the functions related to the accounting cycle, including the preparation of financial statements.                                                                                                                                                                                                                                                       | Also offered through Distance Education format. | N/A                                              |                   0 | N/A          | ACCT*2220    | N/A                 | Department of Management | Guelph   |
--|        2 | ACCT*1240  | Applied Financial Accounting         | Winter               |          0.5 | This course requires students to apply the fundamental principles emanating from accounting's conceptual framework and undertake the practice of financial accounting. Students will become adept at performing the functions related to each step in the accounting cycle, up to and including the preparation of the financial statements and client reports. Students will also develop the skills necessary for assessing an organization's system of internal controls and financial conditions.              | Also offered through Distance Education format. | ACCT*1220 or ACCT*2220                           |                   0 | N/A          | ACCT*2240    | N/A                 | Department of Management | Guelph   |
--|        3 | ACCT*2230  | Management Accounting                | Fall, Winter         |          0.5 | This course emphasizes the use of accounting information to facilitate effective management decisions. Topics include cost determination, cost control and analysis, budgeting, profit-volume analysis and capital investment analysis.                                                                                                                                                                                                                                                                            | N/A                                             | ACCT*1220 or ACCT*2220                           |                   0 | N/A          | N/A          | AGEC*2230, BUS*2230 | Department of Management | Guelph   |
--+----------+------------+--------------------------------------+----------------------+--------------+--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+-------------------------------------------------+--------------------------------------------------+---------------------+--------------+--------------+---------------------+--------------------------+----------+

SELECT * FROM Courses WHERE Coursecode = 'ACCT*1220';
--+----------+------------+-----------------------------------+----------------------+--------------+--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+-------------------------------------------------+---------------+---------------------+--------------+--------------+---------+--------------------------+----------+
--| CourseID | CourseCode | CourseName                        | CourseOffering       | CourseWeight | CourseDescription                                                                                                                                                                                                                                            | CourseFormat                                    | Prerequisites | PrerequisiteCredits | Corequisites | Restrictions | Equates | Department               | Location |
--+----------+------------+-----------------------------------+----------------------+--------------+--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+-------------------------------------------------+---------------+---------------------+--------------+--------------+---------+--------------------------+----------+
--|        1 | ACCT*1220  | Introductory Financial Accounting | Summer, Fall, Winter |          0.5 | This course will introduce students to the fundamental concepts and practices of Financial Accounting. Students are expected to become adept at performing the functions related to the accounting cycle, including the preparation of financial statements. | Also offered through Distance Education format. | N/A           | 0                   | N/A          | ACCT*2220    | N/A     | Department of Management | Guelph   |

UPDATE Courses SET CourseFormat = 'Online' WHERE CourseCode = 'ACCT*1220';
    -- SELECT * FROM Courses WHERE coursecode = 'ACCT*1220';
--+----------+------------+-----------------------------------+----------------------+--------------+--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+-------------------------------------------------+---------------+---------------------+--------------+--------------+---------+--------------------------+----------+
--| CourseID | CourseCode | CourseName                        | CourseOffering       | CourseWeight | CourseDescription                                                                                                                                                                                                                                            | CourseFormat                                    | Prerequisites | PrerequisiteCredits | Corequisites | Restrictions | Equates | Department               | Location |
--+----------+------------+-----------------------------------+----------------------+--------------+--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+-------------------------------------------------+---------------+---------------------+--------------+--------------+---------+--------------------------+----------+
--|        1 | ACCT*1220  | Introductory Financial Accounting | Summer, Fall, Winter |          0.5 | This course will introduce students to the fundamental concepts and practices of Financial Accounting. Students are expected to become adept at performing the functions related to the accounting cycle, including the preparation of financial statements. | Online                                          | N/A           | 0                   | N/A          | ACCT*2220    | N/A     | Department of Management | Guelph   |

DELETE FROM Courses WHERE CourseCode = 'ACCT*1220';

DELETE FROM Courses WHERE Location = 'Guelph';

DROP TABLE Courses;

-- Query for courses in Fall 
SELECT CourseCode, CourseName
FROM Courses
WHERE CourseOffering = 'Fall'
UNION  -- Combine with in-person courses
SELECT CourseCode, CourseName
FROM Courses
WHERE CourseFormat = 'Fall, Winter' Limit 3;





-- Course Samples
-- INSERT INTO Courses (CourseID, CourseCode, CourseName, CourseDescription, CourseOffering, CourseWeight, CourseFormat, Prerequisites, PrerequisiteCredits, Corequisites, Restrictions, Equates, Department, Location)
-- VALUES
--     (1, 'CIS1300', 'Programming', 'This is a course description for CIS 1300', 'Fall', 0.5, NULL, NULL, NULL, NULL, NULL, NULL, 'Department of Computer Science', 'Guelph'),
--     (2, 'CIS2500', 'Intermediate Programming', 'This is the course description for CIS 2500', 'Winter', 0.5, NULL, NULL, NULL, NULL, NULL, NULL, 'Department of Computer Science', 'Guelph'),
--     (3, 'CIS2520', 'Data Structures', 'This is the course description for CIS 2520', 'Fall', 0.5, NULL, NULL, NULL, NULL, NULL, NULL, 'Department of Computer Science', 'Guelph');

-- -- Prerequisite Samples
-- INSERT INTO Prerequisites (PrerequisiteID, CourseID, PrerequisiteCourseID, PrerequisiteType, GPA, CreditsRequirement, Other)
-- VALUES
--     (1, 3, 2, NULL, NULL, NULL, NULL),  -- CIS2520 has CIS2500 as a prerequisite
--     (2, 2, 1, NULL, NULL, NULL, NULL);  -- CIS2500 has CIS1300 as a prerequisite

INSERT INTO Courses_Taken (CourseCode, CourseName, Prerequisites) VALUES ('ACCT*1220', 'Introductory Financial Accounting', 'N/A');

SELECT Courses.CourseCode, Courses.Prerequisites FROM Courses_Taken INNER JOIN Courses ON Courses.Prerequisites LIKE CONCAT('%', Courses_Taken.CourseCode, '%');

--+------------+--------------------------------------------------------------------------------------------------------+
--| CourseCode | Prerequisites                                                                                          |
--+------------+--------------------------------------------------------------------------------------------------------+
--| ACCT*1240  | ACCT*1220 or ACCT*2220                                                                                 |
--| ACCT*2230  | ACCT*1220 or ACCT*2220                                                                                 |
--| ACCT*3330  | ACCT*1220 or ACCT*2220                                                                                 |
--| FARE*3310  | (ACCT*1220 or ACCT*2220), (ECON*2740 or PSYC*1010 or STAT*2040 or STAT*2060 or STAT*2080 or STAT*2120) |
--| HTM*3120   | (ACCT*1220 or ACCT*2220), (ECON*2740 or PSYC*1010 or STAT*2040 or STAT*2060 or STAT*2080)              |
--+------------+--------------------------------------------------------------------------------------------------------+