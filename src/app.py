def readCourse():
    # Set Up of Varables for Dictionary
    file1 = open("testCourse.txt", "r")
    courseCode = "none"

    titleDone = 0
    title = ""

    offered = ""

    creditWeight = ""

    description = ""
    isDescription = 0

    format = ""
    isFormat = 0

    prerequisites = "none"
    isPrerequisites = 0
    prerequisiteCredits = "none"
    prevWord = ""

    corequisites = "none"
    isCorequisites = 0

    equates = "none"
    isEquates = 0

    restrictions = "none"
    isRestriction = 0

    department = "none"
    isDepartment = 0

    location = "none"
    isLocation = 0

    i=0
    semersters = ["Summer", "Summer,", "Fall", "Fall,", "Winter", "Winter,"]

    # Loop Through all Lines in Source File
    for line in file1:

        # Loop Through all Words in Source Line
        for word in line.split():

            # ===================== determining what type of section currently on =====================
            if "(s):" in word:
                # 0 = not done yet
                # 1 = starting/in progress
                # 2 = completed/ommitted
                if word == "Offering(s):":
                    isDescription = 2
                    isFormat = 1
                    isPrerequisites = 0
                    isCorequisites = 0
                    isEquates = 0
                    isRestriction = 0
                    isDepartment = 0
                    isLocation = 0
                
                elif word == "Prerequisite(s):":
                    isDescription = 2
                    isFormat = 2
                    isPrerequisites = 1
                    isCorequisites = 0
                    isEquates = 0
                    isRestriction = 0
                    isDepartment = 0
                    isLocation = 0
                    prevWord = word


                elif word == "Co-requisite(s):":
                    isDescription = 2
                    isFormat = 2
                    isPrerequisites = 2
                    isCorequisites = 1
                    isEquates = 0
                    isRestriction = 0
                    isDepartment = 0
                    isLocation = 0

                elif word == "Equate(s):":
                    isDescription = 2
                    isFormat = 2
                    isPrerequisites = 2
                    isCorequisites = 2
                    isEquates = 1
                    isRestriction = 0
                    isDepartment = 0
                    isLocation = 0

                elif word == ('Restriction(s):'):
                    isDescription = 2
                    isFormat = 2
                    isPrerequisites = 2
                    isCorequisites = 2
                    isEquates = 2
                    isRestriction = 1
                    isDepartment = 0
                    isLocation = 0

                elif word == "Department(s):":
                    isDescription = 2
                    isFormat = 2
                    isPrerequisites = 2
                    isCorequisites = 2
                    isEquates = 2
                    isRestriction = 2
                    isDepartment = 1
                    isLocation = 0

                elif word == "Location(s):":
                    isDescription = 2
                    isFormat = 2
                    isPrerequisites = 2
                    isCorequisites = 2
                    isEquates = 2
                    isRestriction = 2
                    isDepartment = 2
                    isLocation = 1

            # ===================== Adding information to variables =====================
            
            # For only the first and second lines of a course's information
            # to ensure course code, title, and semester offerings are recorded correctly
            if (i==0 or i == 1):
                # Course Code
                if courseCode == "none": courseCode = word

                # Course Title
                if titleDone == 0:
                    # Check for end of title
                    if word in semersters:
                        titleDone = 1
                    
                    #adding to title if not name of course 
                    elif "*" not in word:
                        if title == "": title = word
                        else: title = title + " " + word
                
                # Semester Offerings
                if word in semersters:
                    if offered == "": offered = word
                    else: offered = offered + " " + word

            # For all subsequent lines of a course's information
            # Description
            if isDescription == 1:
                if description == "": description = word
                else: description = description + " " + word
                
            #Check for course weight
            if word[0]=="[":
                creditWeight = word[1:-1]
                if isDescription != 2: isDescription = 1

            # Skipping classification keyword
            if "(s):" not in word:

                # Formats
                if isFormat == 1:
                    if format == "": format = word
                    else: format = format + " " + word

                # Prerequisites
                if isPrerequisites == 1:
                    if "credits" == word:
                        if "." in prevWord: prerequisiteCredits = prevWord
                    elif "." not in word:
                        if prerequisites == "none": prerequisites = word
                        else: prerequisites = prerequisites + " " + word
                    prevWord = word

                # Co-Requisites
                if isCorequisites == 1:
                    if corequisites == "none": corequisites = word
                    else: corequisites = corequisites + " " + word

                # Equates
                if isEquates == 1:
                    if equates == "none": equates = word
                    else: equates = equates + " " + word

                # Restrictions
                if isRestriction == 1:
                    if "*" in word:
                        if restrictions == "none": restrictions = word
                        else: restrictions = restrictions + " " + word

                # Department
                if isDepartment == 1:
                    if department == "none": department = word
                    else: department = department + " " + word

                # Location
                if isLocation == 1:
                    if location == "none": location = word
                    else: location = location + " " + word

        # iterate line tracker
        i = i + 1

    file1.close  
    print(courseCode)
    print(title)
    print(offered)
    print(creditWeight)
    print(description)
    print(format)
    print(prerequisites)
    print(prerequisiteCredits)
    print(corequisites)
    print(equates)
    print(restrictions)
    print(department)
    print(location)
    
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
#                     courseCode = word

