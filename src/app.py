from text_parser import read_course

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

# print(course_list)

save_course_list_to_csv(course_list, "course_output.csv")
