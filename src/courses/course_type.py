#   course_list[course_code] = {
#         "title": title,
#         "offered": offered,  
#         "credit_weight": credit_weight,
#         "description": description,
#         "delivery_format": delivery_format,
#         "prerequisites" : prerequisites,
#         "prerequisite_credits": prerequisite_credits,
#         "corequisites": corequisites,
#         "equates": equates,
#         "restrictions": restrictions,
#         "department": department,
#         "location": location
#     }

base_course = {
    "CIS*1910": {
        "title": "Discrete Structures in Computing I",
        "offered": "Fall Only",
        "credit_weight": 0.50,
        "description": '''This course is an introduction to discrete structures and formal
methodologies used in computer science, including Boolean algebra,
propositional logic, predicate logic, proof techniques, set theory,
equivalence relations, order relations, and functions.
Department(s): School of Computer Science  
        ''',
        "delivery_format": "N/A",
        "preqrequisites": ["N/A"],
        "preqrequisite_credits": "N/A",
        "corequisites": ["N/A"],
        "department": "Department of Computer Science",
        "location": "Guelph",
        "restrictions": "N/A",
        "equates": ["N/A"]
    }
}


coreq_course = {
    "ENGG*2180": {
        "title": "Introduction to Manufacturing Process",
        "offered": "Winter Only",
        "credit_weight": 0.50,
        "description": '''This course is designed to provide students with an overview of a wide
variety of manufacturing processes involved in industrial activities.
While most of the manufacturing processes are to be introduced during
the course, more emphasis will be given on those processes which are
more common in industry, namely material removal processes, casting,
and forming. In addition to introducing the various manufacturing
process, mathematical models and several empirical data and equations
describing the various manufacturing processes will be covered in order
to provide the students with a better understanding of the relations
between the parameters involved.''',
        "delivery_format": "N/A",
        "preqrequisites": ["ENGG*2160"],
        "preqrequisite_credits": "N/A",
        "corequisites": ["ENGG*2120"],
        "department": "School of Engineering",
        "location": "Guelph",
        "restrictions": "N/A",
        "equates": ["N/A"],
    }
}

restriction_course = {
    "CIS*1300": {
    "title": "Programming",
    "offered": "Fall Only",
    "credit_weight": 0.50,
    "description": '''This course examines the applied and conceptual aspects of
programming. Topics may include data and control structures, program
design, problem solving and algorithm design, operating systems
concepts, and fundamental programming skills. This course is intended
for students who plan to take later CIS courses. If your degree does
not require further CIS courses consider CIS*1500 Introduction to
Programming.''',
    "delivery_format": "N/A",
    "preqrequisites": ["N/A"],
    "preqrequisite_credits": "N/A",
    "corequisites": ["ENGG*2120"],
    "department": "School of Computer Science",
    "location": "Guelph",
    "restrictions": "CIS*1500. This is a Priority Access Course. Enrolment maybe restricted to particular programs or specializations. See department",
    "equates": ["N/A"],
    }
}

offered_course = {
    "CIS*1300": {
    "title": "Programming",
    "offered": "Fall and Winter",
    "credit_weight": 0.50,
    "description": '''This course introduces problem-solving, programming and data
organization techniques required for applications using a general
purpose programming language. Topics include control structures,
data representation and manipulation, program logic, development
and testing. This course is intended for students who do not intend to
enroll in further CIS courses. If your degree requires further CIS courses,
CIS*1300, is required.''',
    "delivery_format": "N/A",
    "preqrequisites": ["N/A"],
    "preqrequisite_credits": "N/A",
    "corequisites": ["N/A"],
    "department": "School of Computer Science",
    "location": "Guelph",
    "restrictions": "N/A",
    "equates": ["N/A"],
    }
}

equates_course = {
    "CRWR*4100": {
    "title": "Capstone Prose/Narrative Workshop",
    "offered": "Fall and Winter",
    "credit_weight": 1.00,
    "description": '''A development and extension of the creative writing/reading skills
and techniques introduced in the creative writing workshops. This
course will involve the generation and revision of challenging new
work, sophisticated critique of the work of other students, and focused
discussion of the cultural, social, and political issues in which the
practice of creative writing is enmeshed.''',
    "delivery_format": "N/A",
    "preqrequisites": ["CRWR*4100"],
    "preqrequisite_credits": "N/A",
    "corequisites": ["N/A"],
    "department": "School of English and Theatre Studies",
    "location": "Guelph",
    "restrictions": "N/A",
    "equates": ["ENGL*4720"],
    }
}