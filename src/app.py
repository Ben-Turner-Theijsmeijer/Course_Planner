from text_parser import read_course

msg = "course selection assistant"
print(msg)

from save_course_list_to_csv import save_course_list_to_csv

course_info = {
    "ANSC*4010": {
        "title": "Animal Welfare Judging and Evaluation",
        "offered": "Fall Only",
        "credit_weight": 0.50,
        "description": "This is the course description",
        "format": "Distance Education",
        "preqrequisites": [
            "ANSC*3080",
            "ANSC*1210 or ANSC*2210",
        ],
        "preqrequisite_credits": 15.00,
        "corequisites": [
            "ANSC*3090 or ANSC*4090",
        ],
        "department": "Department of Psychology",
        "location": "Guelph"
    },
    "CIS*1500": {
        "title": "Introduction to Computing",
        "offered": "Winter Only",
        "credit_weight": 0.50,
        "description": "This is the course description",
        "format": "Distance Education",
        "preqrequisites": [
            "ANSC*3080",
            "ANSC*1210 or ANSC*2210",
        ],
        "preqrequisite_credits": 15.00,
        "corequisites": [
            "ANSC*3090 or ANSC*4090",
        ],
        "department": "Department of Psychology",
        "location": "Guelph"
    }
}

save_course_list_to_csv(course_info, "course_output.csv")
