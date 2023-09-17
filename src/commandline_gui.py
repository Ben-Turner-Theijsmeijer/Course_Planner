def selecton ( course_list):
    print("**************************************")
    print("*      Course Selection Tool         *")
    print("**************************************")

    leave = 0
    while leave == 0:
        response = input("*    Which course would you like to look at?\ntype \"COURSE\"    If you want to search by course code\ntype \"ALL\"       If you want so see all courses offered\ntype \"OFFERED\"   If you want to see all courses offered in a certain semester.\ntype \"EXIT\"      if you wish to exit the program input.\n\n\n")
        if response.lower() == "exit":
            break
        leave = search(response, course_list)


    print("*    Thank you for using the UoG Course Selection Tool.")

def search(response, course_list):
    if response.lower() == "all":
        j = 0
        for key in course_list:
            if j < 10:
                print(key,  end=", ")
                j += 1
            else:
                print(key)
                j = 0
        print("\n\n")
        return 0
    elif response.lower() == "offered":
        i = 0
        while i == 0:
            resp = input("*    What semsester offerings would you like to view?\n")
            if resp.lower() == "exit\n":
                return 1
            j = 0
            for key, data in course_list.items():
                if resp.title() in data['offered']:
                    if j < 10:
                        print(key,  end=", ")
                        j += 1
                    else:
                        print(key)
                        j = 0
                    i += 1
            if i == 0:
                print("*    No courses found in that semester, please ensure your semester offering is one of the following: Fall, Winter, Summer.")
        print("\n\n")
        return 0
        

    elif response.lower() == "course":
        i = 0
        while i == 0:
            resp = input("*    Input course code\n")
            # print("--> \'", resp, "\'")
            if resp.lower() == "exit":
                return 1
            for key, data in course_list.items():
                # print(key)
                if resp.upper() in key:
                    course_info(key, data)
                    i += 1
                    # print(course_list[key])
            if i == 0:
                print("*    no courses found with that course code, please ensure your course code is in the format DEPARTMENT*COURSE_LEVEL. (ACCT*1220)\n")

        print("\n\n")
        return 0
    else:
        print("*    Sorry, that was not an expected response. Please try again.\n\n")
        return 0
    
def course_info(key, data):
    print('*    Course Code:           ', key)
    print('*    Title:                 ',data['title'])
    print('*    Offered:               ', data['offered'])
    print('*    Credit Weight:         ', data['credit_weight'])
    print('*    Description:           ', data['description'])
    print('*    Format:                ', data['delivery_format'])
    print('*    Prerequisites:         ', ', '.join(data['prerequisites']))
    print('*    Prerequisite Credits:  ', data['prerequisite_credits'])
    print('*    Corequisites:          ', ', '.join(data['corequisites']))
    print('*    Restrictions:          ', data['restrictions'])
    print('*    Equates:               ', ', '.join(data['equates']))
    print('*    Department:            ', data['department'])
    print('*    Location:              ', data['location'])
        

