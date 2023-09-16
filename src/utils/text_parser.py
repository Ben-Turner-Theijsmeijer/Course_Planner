def read_course(file1, course_list):
    # Set Up of Variables for Dictionary
    
    course_code = "N/A"
    is_course_code = 0
    course_code_line = -1

    title_done = 0
    title = "N/A"

    offered = "N/A"

    credit_weight = "N/A"

    description = "N/A"
    is_description = 0

    delivery_format = "N/A"
    is_Format = 0

    prerequisites = ["N/A"]
    is_prerequisites = 0
    prerequisite_credits = "N/A"
    prev_word = ""

    corequisites = ["N/A"]
    is_corequisites = 0

    equates = ["N/A"]
    is_equates = 0

    restrictions = "N/A"
    is_restriction = 0

    department = "N/A"
    is_department = 0

    location = "N/A"
    is_location = 0

    i=0
    semesters = ["Summer", "Summer,", "Fall", "Fall,", "Winter", "Winter,"]

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
                    # 2 = completed/omitted
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

            # Course Code
            if is_course_code == 0:
                if j == 0:
                    if "*" in word:
                        course_code = word
                        is_course_code = 2
                        course_code_line = i

            #Check the line the course code is on and the next line for the title and semesters
            if (is_course_code == 2 and (i==course_code_line or i == course_code_line+1)):
                # Course Title
                if title_done == 0:
                    # Check for end of title
                    if word in semesters:
                        title_done = 1
                    
                    #adding to title if not name of course 
                    elif "*" not in word:
                        if title == "N/A": title = word
                        else: title = title + " " + word
                
                # Semester Offerings
                if word in semesters:
                    if offered == "N/A": offered = word
                    else: offered = offered + ", " + word

            # For all subsequent lines of a course's information
            # Description
            if is_description == 1:
                if description == "N/A": description = word
                else: description = description + " " + word
                
            #Check for course weight
            if word[0]=="[":
                credit_weight = word[1:-1]
                if is_description != 2: is_description = 1

            # Skipping classification keyword
            if "(s):" not in word:

                # Formats
                if is_Format == 1:
                    if delivery_format == "N/A": delivery_format = word
                    else: delivery_format = delivery_format + " " + word

                # Prerequisites
                if is_prerequisites == 1:
                    if "credits" == word or "credits." == word:
                        if "." in prev_word: prerequisite_credits = prev_word
                    elif "." not in word:
                        if prerequisites[0] == "N/A": prerequisites[0] = word
                        else: prerequisites.append(word)
                    prev_word = word

                # Co-Requisites
                if is_corequisites == 1:
                    if corequisites[0] == "N/A": corequisites[0] = word
                    else: corequisites.append(word)

                # Equates
                if is_equates == 1:
                    if equates[0] == "N/A": equates[0] = word
                    else: equates.append(word)

                # Restrictions
                if is_restriction == 1:
                    if "*" in word:
                        if restrictions == "N/A": restrictions = word
                        else: restrictions = restrictions + " " + word

                # Department
                if is_department == 1:
                    if department == "N/A": department = word
                    else: department = department + " " + word

                # Location
                if is_location == 1:
                    if location == "N/A": location = word
                    else: location = location + " " + word

        #Keep track of words in each line
        j = j +1

        #Location is always the last line if location is running its and the next line is starting end location and exit the loop
        if is_location == 1:
            is_location = 2
            break;

        # iterate line tracker
        i = i + 1

    #If the course code was found. Otherwise junk at end of the file
    if is_course_code == 2:

        # strip any leading / trailing whitespace from variables
        course_code = course_code.strip()
        title = title.strip()
        offered = offered.strip()
        credit_weight = credit_weight.strip()
        description = description.strip()
        delivery_format = delivery_format.strip()
        # prerequisites = prerequisites.strip()
        prerequisite_credits = prerequisite_credits.strip()
        # corequisites = corequisites.strip()
        # equates = equates.strip()
        restrictions = restrictions.strip()
        department = department.strip()
        location = location.strip()

        # UNCOMMENT TO PRINT COURSE CONTENT
        # print("Course Code:" + course_code)
        # print("Title:" + title)
        # print("Offered:" + offered)
        # print("Credit Weight:" + credit_weight)
        # print("Description:" + description)
        # print("Format:" + delivery_format)
        # print("Prerequisites:" + prerequisites)
        # print("Prerequisite Credits:" + prerequisite_credits)
        # print("Corequisites:" + corequisites)
        # print("Equates:" +equates)
        # print("Restrictions:" +restrictions)
        # print("Department:" + department)
        # print("Location:" + location)
        
        # Populating course_list with new course
        course_list[course_code] = {
            "title": title,
            "offered": offered,  
            "credit_weight": credit_weight,
            "description": description,
            "delivery_format": delivery_format,
            "prerequisites" : prerequisites,
            "prerequisite_credits": prerequisite_credits,
            "corequisites": corequisites,
            "equates": equates,
            "restrictions": restrictions,
            "department": department,
            "location": location
        }
        

