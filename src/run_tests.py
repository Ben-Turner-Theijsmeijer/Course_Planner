from utils.text_parser import read_course


def test_case1_base():
    # ARRANGE
    course_list = {}
    test_file = open("../src/tests/test_files/test_case1_base.txt")
    expected_course = {
        "title": "Discrete Structures in Computing I",
        "offered": "Fall",
        "credit_weight": "0.50",
        "description": "This course is an introduction to discrete structures and formal methodologies used in computer science, including Boolean algebra, propositional logic, predicate logic, proof techniques, set theory, equivalence relations, order relations, and functions.",
        "delivery_format": "N/A",
        "prerequisites": ["N/A"],
        "prerequisite_credits": "N/A",
        "corequisites": ["N/A"],
        "equates": ["N/A"],
        "restrictions": "N/A",
        "department": "School of Computer Science",
        "location": "Guelph"
    }

    # ACT
    read_course(test_file, course_list)
    parsed_course = course_list["CIS*1910"]

    # ASSERT
    if not parsed_course:
        raise Exception("Course was not added to dictionary")
    elif parsed_course != expected_course:
        print(parsed_course)
        print(expected_course)
        raise Exception("Parsed course does not match expected course")


def test_case2_restriction():
    # ARRANGE
    course_list = {}
    test_file = open("../src/tests/test_files/test_case2_restriction.txt")
    expected_course = {
        "title": "Programming",
        "offered": "Fall",
        "credit_weight": "0.50",
        "description": "This course examines the applied and conceptual aspects of programming. Topics may include data and control structures, program design, problem solving and algorithm design, operating systems concepts, and fundamental programming skills. This course is intended for students who plan to take later CIS courses. If your degree does not require further CIS courses consider CIS*1500 Introduction to Programming.",
        "delivery_format": "N/A",
        "prerequisites": ["N/A"],
        "prerequisite_credits": "N/A",
        "corequisites": ["N/A"],
        "equates": ["N/A"],
        "restrictions": "CIS*1500.",
        "department": "School of Computer Science",
        "location": "Guelph"
    }

    # ACT
    read_course(test_file, course_list)
    parsed_course = course_list["CIS*1300"]

    # ASSERT
    if not parsed_course:
        raise Exception("Course was not added to dictionary")
    elif parsed_course != expected_course:
        print(parsed_course)
        print(expected_course)
        raise Exception("Parsed course does not match expected course")


def test_case3_prereq():
    # ARRANGE
    course_list = {}
    test_file = open("../src/tests/test_files/test_case3_prereq.txt")
    expected_course = {
        "title": "Intermediate Programming",
        "offered": "Winter",
        "credit_weight": "0.50",
        "description": "In this course students learn to interpret a program specification and implement it as reliable code, as they gain experience with pointers, complex data types, important algorithms, intermediate tools and techniques in problem solving, programming, and program testing.",
        "delivery_format": "N/A",
        "prerequisites": ["CIS*1300"],
        "prerequisite_credits": "N/A",
        "corequisites": ["N/A"],
        "equates": ["N/A"],
        "restrictions": "N/A",
        "department": "School of Computer Science",
        "location": "Guelph"
    }

    # ACT
    read_course(test_file, course_list)
    parsed_course = course_list["CIS*2500"]

    # ASSERT
    if not parsed_course:
        raise Exception("Course was not added to dictionary")
    elif parsed_course != expected_course:
        print(parsed_course)
        print(expected_course)
        raise Exception("Parsed course does not match expected course")


def test_case4_offered():
    # ARRANGE
    course_list = {}
    test_file = open("../src/tests/test_files/test_case4_offered.txt")
    expected_course = {
        "title": "Introduction to Programming",
        "offered": "Fall, Winter",
        "credit_weight": "0.50",
        "description": "This course introduces problem-solving, programming and data organization techniques required for applications using a general purpose programming language. Topics include control structures, data representation and manipulation, program logic, development and testing. This course is intended for students who do not intend to enroll in further CIS courses. If your degree requires further CIS courses, CIS*1300, is required.",
        "delivery_format": "N/A",
        "prerequisites": ["N/A"],
        "prerequisite_credits": "N/A",
        "corequisites": ["N/A"],
        "equates": ["N/A"],
        "restrictions": "N/A",
        "department": "School of Computer Science",
        "location": "Guelph"
    }

    # ACT
    read_course(test_file, course_list)
    parsed_course = course_list["CIS*1500"]

    # ASSERT
    if not parsed_course:
        raise Exception("Course was not added to dictionary")
    elif parsed_course != expected_course:
        print(parsed_course)
        print(expected_course)
        raise Exception("Parsed course does not match expected course")


def test_case5_equates():
    # ARRANGE
    course_list = {}
    test_file = open("../src/tests/test_files/test_case5_equates.txt")
    expected_course = {
        "title": "Capstone Prose/Narrative Workshop",
        "offered": "Fall, Winter",
        "credit_weight": "1.00",
        "description": "A development and extension of the creative writing/reading skills and techniques introduced in the creative writing workshops. This course will involve the generation and revision of challenging new work, sophisticated critique of the work of other students, and focused discussion of the cultural, social, and political issues in which the practice of creative writing is enmeshed.",
        "delivery_format": "N/A",
        "prerequisites": ["CRWR*3100"],
        "prerequisite_credits": "N/A",
        "corequisites": ["N/A"],
        "equates": ["ENGL*4720"],
        "restrictions": "N/A",
        "department": "School of English and Theatre Studies",
        "location": "Guelph"
    }

    # ACT
    read_course(test_file, course_list)
    parsed_course = course_list["CRWR*4100"]

    # ASSERT
    if not parsed_course:
        raise Exception("Course was not added to dictionary")
    elif parsed_course != expected_course:
        print(parsed_course)
        print(expected_course)
        raise Exception("Parsed course does not match expected course")


def test_case6_coreq():
    # ARRANGE
    course_list = {}
    test_file = open("../src/tests/test_files/test_case6_coreq.txt")
    expected_course = {
        "title": "Introduction to Manufacturing Processes",
        "offered": "Winter",
        "credit_weight": "0.50",
        "description": "This course is designed to provide students with an overview of a wide variety of manufacturing processes involved in industrial activities. While most of the manufacturing processes are to be introduced during the course, more emphasis will be given on those processes which are more common in industry, namely material removal processes, casting, and forming. In addition to introducing the various manufacturing process, mathematical models and several empirical data and equations describing the various manufacturing processes will be covered in order to provide the students with a better understanding of the relations between the parameters involved.",
        "delivery_format": "N/A",
        "prerequisites": ["ENGG*2160"],
        "prerequisite_credits": "N/A",
        "corequisites": ["ENGG*2120"],
        "equates": ["N/A"],
        "restrictions": "N/A",
        "department": "School of Engineering",
        "location": "Guelph"
    }

    # ACT
    read_course(test_file, course_list)
    parsed_course = course_list["CRWR*4100"]

    # ASSERT
    if not parsed_course:
        raise Exception("Course was not added to dictionary")
    elif parsed_course != expected_course:
        print(parsed_course)
        print(expected_course)
        raise Exception("Parsed course does not match expected course")


print("Test 1: Base")
test_case1_base()
print("Passed")

print("Test 2: Restriction")
test_case2_restriction()
print("Passed")

print("Test 3: Prerequisite")
test_case3_prereq()
print("Passed")

print("Test 4: Offered")
test_case4_offered()
print("Passed")

print("Test 5: Equates")
test_case5_equates()
print("Passed")

print("Test 6: Corequisites")
test_case5_equates()
print("Passed")
