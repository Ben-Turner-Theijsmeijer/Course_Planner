from preprocess_data import process_data
import json 
import sys

def find_cases(file_path = '../data/raw/f23_courses2.txt'):
    cases = set()

    # FILE 2
    file1_str = process_data(file_path, 199)
    course_sections = file1_str.split(']')

    for i in range (0, len(course_sections)):
        possible_case = []
        lines = course_sections[i].split('\n')
        for line in lines:
            key = line.split('(s):')[0]
            if len(key) != len(line):
                possible_case.append(key)
        possible_case.sort()
        cases.add(tuple(possible_case))
    
    print(json.dumps(list(cases)))


if __name__ == '__main__':
    find_cases(sys.argv[1]) if len(sys.argv) > 1 else find_cases()
