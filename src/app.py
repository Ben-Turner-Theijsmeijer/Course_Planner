def readCourse():
    file1 = open("testCourse.txt", "r")
    course_code = "none"
    title_done = 0
    title = ""
    credit_weight = "none"
    description = ""
    isDescription = 0
    prerequisites = "none"
    prerequisites_credits = "none"
    restrictions = ""
    isRescription = 0
    corequisites = "none"
    department = "none"
    location = "none"
    i=0
    test = 'Restriction(s):'
    semersters = ["Summer", "Summer,", "Fall", "Fall,", "Winter", "Winter,"]
    for line in file1:

        for word in line.split():
            # If Restriction line
            if word == ('Restriction(s):'):
                isRescription = 1
                isDescription = 0
            
            if word == "Prerequisite(s):":
                isDescription = 0

            if word == "Equate(s):":
                isDescription = 0
            
            if word == "Offering(s):":
                isDescription = 0
            
            if word == "Co-requisite(s):":
                isDescription = 0

            if word == "Department(s):":
                isDescription = 0

            if word == "Location(s):":
                isDescription = 0

            if (isRescription == 1):
                if "*" in word:
                    restrictions = restrictions + " " + word
            #First line of course
            if (i==0):
                if (course_code == "none"):
                    course_code = word
                if  (title_done == 0):
                    if word in semersters:
                        title_done = 1
                    elif "*" not in word:
                        title = title + " " + word

            if isDescription == 1:
                description = description + " " + word
                
            #Check for course weight
            if word[0]=="[":
                credit_weight = word[1:-1]
                isDescription = 1

            
        i = i + 1
        isRescription = 0
    file1.close  
    print(course_code)
    print(title)
    print(description)
    print(credit_weight)
    print(restrictions)
# def addToCourses
        
# def parser(filename)


msg = "course selection assistant"
print(msg)
readCourse()
#list_of_Courses

# def readTextFile(filename)
#     file1 = open(filename, "r")
#         for line in file1:
#             for word in line.split():
#                 '*' in word
#                     course_code = word

