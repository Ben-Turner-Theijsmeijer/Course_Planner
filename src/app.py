from text_parser import read_course
from commandline_gui import selecton
import json 

msg = "course selection assistant"
print(msg)

from save_course_list_to_csv import save_course_list_to_csv
from courses import course_type


print(course_type.base_course)

course_list = {}

course_list.update(course_type.base_course)
course_list.update(course_type.coreq_course)
course_list.update(course_type.restriction_course)
course_list.update(course_type.offered_course)
course_list.update(course_type.equates_course)

file1 = open("data.txt", "r")

course_list = {}
course = {}

while True:
    linePosition = file1.tell()

    #Read one line and see if its the end of the page
    testEndofFile = file1.readline()
    #If eof exit
    if len(testEndofFile) == 0: break

    #move the location back as its not over yet
    file1.seek(linePosition)
    #read course
    read_course(file1, course_list) # parse the data and store in dictionary
 
# print(json.dumps(course_list, indent = 6)) 


save_course_list_to_csv(course_list, "course_output.csv") # output the course_list dict to a csv

file1.close 

selecton(course_list)
