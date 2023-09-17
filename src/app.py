# Module for main application logic
from utils.text_parser import read_course
from utils.save_course_list_to_csv import save_course_list_to_csv
from utils.text_parser import read_course
from utils.preprocess_data import process_data
from utils.commandline_gui import selecton

file_path = "../data/raw/f23_courses2.txt"

course_list = {}

process_data(file_path, 199) # preprocess the data and output to data.txt

file1 = open("data.txt", "r")

course_list = {}
course = {}

while True:
    linePosition = file1.tell()

    # Read one line and see if its the end of the page
    testEndofFile = file1.readline()
    #If EOF exit
    if len(testEndofFile) == 0: break

    # move the location back as its not over yet
    file1.seek(linePosition)
  
    read_course(file1, course_list) # parse the data and store in course_list dictionary
 
save_course_list_to_csv(course_list, "course_output.csv") # output the course_list dict to a csv

file1.close 

selecton(course_list)
