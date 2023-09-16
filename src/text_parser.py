import re

def read_course(file1, course_list):
    # Set Up of Varables for Dictionary
    
    course_code = "N/A"
    is_course_code = 0
    course_code_line = -1

    title_done = 0
    title = "N/A"

    offered = "N/A"

    credit_weight = "N/A"
    is_credit_weight = 0

    description = "N/A"
    is_description = 0

    delivery_format = "N/A"
    is_Format = 0

    prerequisites = ["N/A"]
    is_prerequisites = 0
    prerequisite_credits = "N/A"
    is_prerequisite_credits = 0
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
    semersters = ["Summer", "Summer,", "Fall", "Fall,", "Winter", "Winter,", "Unspecified"]
    
    # RegEx patterns
    credit_pattern = r"\[\d+\.\d{2}\]"
    prerequisite_credit_pattern = r"\d+\.\d{2}"
    course_pattern = r"\*\d{4}"

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
                        prev_word = word

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
                    if re.search(course_pattern, word):
                        course_code = word
                        is_course_code = 2
                        course_code_line = i

            #Check the line the course code is on and the next line for the title and semersters
            if (is_course_code == 2 and (i==course_code_line or i == course_code_line+1)):
                # Course Title
                if title_done == 0:
                    # Check for end of title
                    if word in semersters or re.search(credit_pattern, word) or word.startswith("(LEC:"):
                        title_done = 1
                    
                    #adding to title if not name of course 
                    elif not re.search(course_pattern, word):
                        if title == "N/A": title = word
                        else: title = title + " " + word
                
                # Semester Offerings
                if word in semersters:
                    if offered == "N/A": 
                        if word.endswith(','): offered = word[:-1]
                        else: offered = word
                    else: 
                        if word.endswith(','): offered = offered + ", " + word[:-1]
                        else: offered = offered + ", " + word

            # For all subsequent lines of a course's information
            # Description
            if is_description == 1:
                if description == "N/A": description = word
                else: description = description + " " + word
                
            #Check for course weight (only checks first occurence as to not overwrite)
            if re.search(credit_pattern, word) and is_credit_weight == 0:
                credit_weight = word[1:-1]
                is_credit_weight = 2
                if is_description != 2: is_description = 1

            # Skipping classification keyword
            if "(s):" not in word:

                # Formats
                if is_Format == 1:
                    if delivery_format == "N/A": delivery_format = word
                    else: delivery_format = delivery_format + " " + word

                # Prerequisites
                if is_prerequisites == 1:
                    # For Credit Prerequisites
                    if ("credits" == word or "credits." == word) and is_prerequisite_credits == 0:
                        if re.search(prerequisite_credit_pattern, prev_word):
                            prerequisite_credits = prev_word
                            is_prerequisite_credits = 2
                    # For Course Prerequisites
                    elif not re.search(prerequisite_credit_pattern, word) and word != "including":
                        if prerequisites[0] == "N/A": prerequisites[0] = word
                        else: prerequisites.append(word)
                    prev_word = word

                # Co-Requisites
                if is_corequisites == 1:
                    # All phase N courses edge case
                    if "All Phase" in line:
                        corequisites[0] = line[17:]
                        is_corequisites = 2 
                    # Can be taken as co-requisite edge case
                    elif "can be taken as co-requisite" in line:
                        corequisites[0] = line[17:]
                        is_corequisites = 2
                    # 1 of edge case
                    elif "1 of" in line:
                        corequisites[0] = line[17:]
                        is_corequisites = 2
                    # May be taken concurrently edge case
                    elif "may be taken concurrently" in line:
                        corequisites[0] = line[17:]
                        is_corequisites = 2
                    # Course A or Course B edge case
                    elif "or" in line:
                        corequisites[0] = line[17:]
                        is_corequisites = 2
                    # other cases
                    elif corequisites[0] == "N/A": 
                        if word.endswith(','): corequisites[0] = word[:-1]
                        else: corequisites[0] = word
                    else:
                        if word.endswith(','): corequisites.append(word[:-1])
                        else: corequisites.append(word)
                    prev_word = word

                # Equates
                if is_equates == 1:
                    if equates[0] == "N/A":
                        if word.endswith(',') or word.endswith('.'): equates[0] = word[:-1]
                        else: equates[0] = word
                    else: 
                        if word.endswith(',') or word.endswith('.'): equates.append(word[:-1])
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
        prerequisite_credits = prerequisite_credits.strip()
        restrictions = restrictions.strip()
        department = department.strip()
        location = location.strip()

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
        

