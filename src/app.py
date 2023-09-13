from text_parser import read_course

msg = "course selection assistant"
print(msg)
file1 = open("testCourse.txt", "r")

while True:
    linePosition = file1.tell()

    #Read one line and see if its the end of the page
    testEndofFile = file1.readline()
    #If eof exit
    if len(testEndofFile) == 0: break

    #move the location back as its not over yet
    file1.seek(linePosition)
    #read course
    print("\nnext Course:\n")
    read_course(file1)

read_course(file1)

file1.close 

