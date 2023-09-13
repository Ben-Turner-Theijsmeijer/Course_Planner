def read_course(file1):
    # Set Up of Varables for Dictionary
    
    course_code = "none"
    is_course_code = 0
    course_code_line = -1

    title_done = 0
    title = ""

    offered = ""

    credit_weight = ""

    description = ""
    is_description = 0

    delivery_format = ""
    is_Format = 0

    prerequisites = "none"
    is_prerequisites = 0
    prerequisite_credits = "none"
    prev_word = ""

    corequisites = "none"
    is_corequisites = 0

    equates = "none"
    is_equates = 0

    restrictions = "none"
    is_restriction = 0

    department = "none"
    is_department = 0

    location = "none"
    is_location = 0

    i=0
    semersters = ["Summer", "Summer,", "Fall", "Fall,", "Winter", "Winter,"]

    # Loop Through all Lines in Source File
    while line:= file1.readline():

        # Loop Through all Words in Source Line
        j=0
        for word in line.split():

            #The course code has to be found first
            if is_course_code == 2:
                # ===================== determining what type of section currently on =====================
                if "(s):" in word:
                    # 0 = not done yet
                    # 1 = starting/in progress
                    # 2 = completed/ommitted
                    if word == "Offering(s):":
                        is_description = 2
                        is_Format = 1
                        is_prerequisites = 0
                        is_corequisites = 0
                        is_equates = 0
                        is_restriction = 0
                        is_department = 0
                        is_location = 0
                    
                    elif word == "Prerequisite(s):":
                        is_description = 2
                        is_Format = 2
                        is_prerequisites = 1
                        is_corequisites = 0
                        is_equates = 0
                        is_restriction = 0
                        is_department = 0
                        is_location = 0
                        prev_word = word


                    elif word == "Co-requisite(s):":
                        is_description = 2
                        is_Format = 2
                        is_prerequisites = 2
                        is_corequisites = 1
                        is_equates = 0
                        is_restriction = 0
                        is_department = 0
                        is_location = 0

                    elif word == "Equate(s):":
                        is_description = 2
                        is_Format = 2
                        is_prerequisites = 2
                        is_corequisites = 2
                        is_equates = 1
                        is_restriction = 0
                        is_department = 0
                        is_location = 0

                    elif word == ('Restriction(s):'):
                        is_description = 2
                        is_Format = 2
                        is_prerequisites = 2
                        is_corequisites = 2
                        is_equates = 2
                        is_restriction = 1
                        is_department = 0
                        is_location = 0

                    elif word == "Department(s):":
                        is_description = 2
                        is_Format = 2
                        is_prerequisites = 2
                        is_corequisites = 2
                        is_equates = 2
                        is_restriction = 2
                        is_department = 1
                        is_location = 0

                    elif word == "Location(s):":
                        is_description = 2
                        is_Format = 2
                        is_prerequisites = 2
                        is_corequisites = 2
                        is_equates = 2
                        is_restriction = 2
                        is_department = 2
                        is_location = 1

            # ===================== Adding information to variables =====================
            
            # For only the first and second lines of a course's information
            # to ensure course code, title, and semester offerings are recorded correctly

            if is_course_code == 0:
                if j == 0:
                    if "*" in word:
                        course_code = word
                        is_course_code = 2
                        course_code_line = i

            #Check the line the course code is on and the next line for the title and semersters
            if (is_course_code == 2 and (i==course_code_line or i == course_code_line+1)):
                # Course Code
                #if course_code == "none": course_code = word

                # Course Title
                if title_done == 0:
                    # Check for end of title
                    if word in semersters:
                        title_done = 1
                    
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
            if is_description == 1:
                if description == "": description = word
                else: description = description + " " + word
                
            #Check for course weight
            if word[0]=="[":
                credit_weight = word[1:-1]
                if is_description != 2: is_description = 1

            # Skipping classification keyword
            if "(s):" not in word:

                # Formats
                if is_Format == 1:
                    if delivery_format == "": delivery_format = word
                    else: delivery_format = delivery_format + " " + word

                # Prerequisites
                if is_prerequisites == 1:
                    if "credits" == word or "credits." == word:
                        if "." in prev_word: prerequisite_credits = prev_word
                    elif "." not in word:
                        if prerequisites == "none": prerequisites = word
                        else: prerequisites = prerequisites + " " + word
                    prev_word = word

                # Co-Requisites
                if is_corequisites == 1:
                    if corequisites == "none": corequisites = word
                    else: corequisites = corequisites + " " + word

                # Equates
                if is_equates == 1:
                    if equates == "none": equates = word
                    else: equates = equates + " " + word

                # Restrictions
                if is_restriction == 1:
                    if "*" in word:
                        if restrictions == "none": restrictions = word
                        else: restrictions = restrictions + " " + word

                # Department
                if is_department == 1:
                    if department == "none": department = word
                    else: department = department + " " + word

                # Location
                if is_location == 1:
                    if location == "none": location = word
                    else: location = location + " " + word

        #Keep track of words in each line
        j = j +1

        #Location is always the last line if location is running its and the next line is starting end location and exit the loop
        if is_location == 1:
            isLocations = 2
            break;

        # iterate line tracker
        i = i + 1

    #If the course code was found. Otherwise junk at end of the file
    if is_course_code == 2:

        print("Course Code:" + course_code)
        print("Title:" +title)
        print("Offered:" + offered)
        print("Credit Weight:" + credit_weight)
        print("Description:" + description)
        print("Format:" + delivery_format)
        print("Prerequisites:" + prerequisites)
        print("Prerequisite Credits:" +prerequisite_credits)
        print("Corequisites:" +corequisites)
        print("Equates:" +equates)
        print("Restrictions:" +restrictions)
        print("Department:" + department)
        print("Location:" + location)
