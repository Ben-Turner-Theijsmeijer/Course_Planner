from text_parser import read_course

msg = "course selection assistant"
print(msg)
file1 = open("testCourse.txt", "r")


course_list = {}

while True:
    linePosition = file1.tell()

    #Read one line and see if its the end of the page
    testEndofFile = file1.readline()
    #If eof exit
    if len(testEndofFile) == 0: break

    #move the location back as its not over yet
    file1.seek(linePosition)
    #read course
    read_course(file1, course_list)

file1.close 

# Print Course List
for key in course_list:
    print("Course Code:          " + key)
    print("Title:                " + course_list[key]["title"])
    print("Offered:              " + course_list[key]["offered"])
    print("Credit Weight:        " + course_list[key]["credit_weight"])
    print("Description:          " + course_list[key]["description"])
    print("Format:               " + course_list[key]["delivery_format"])
    print("Prerequisites:        " + course_list[key]["prerequisites"])
    print("Prerequisite Credits: " + course_list[key]["prerequisite_credits"])
    print("Corequisites:         " + course_list[key]["corequisites"])
    print("Equates:              " + course_list[key]["equates"])
    print("Restrictions:         " + course_list[key]["restrictions"])
    print("Department:           " + course_list[key]["department"])
    print("Location:             " + course_list[key]["location"])
    print("\n")


