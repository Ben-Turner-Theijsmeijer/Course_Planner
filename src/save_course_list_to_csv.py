# Module that saves the course_list to a desired csv file
import csv

def save_course_list_to_csv(course_list, output_path):
    header = [
        'Course Code', 
        'Title',
        'Offered',
        'Credit Weight',
        'Description',
        'Format',
        'Prerequisites',
        'Prerequisite Credits',
        'Corequisites',
        'Department',
        'Location'  
        ]
    
    with open(output_path, 'w', encoding='UTF8', newline='') as file:
        writer = csv.DictWriter(file, fieldnames=header)
        
        writer.writeheader()
        
        for course in course_list:
            course_code = list(course.keys())[0]
            data = course[course_code]
            
            writer.writerow({
                'Course Code': course_code,
                'Title': data['title'],
                'Offered': data['offered'],
                'Credit Weight': data['credit_weight'],
                'Description': data['description'],
                'Format': data['format'],
                'Prerequisites': ','.join(data['prerequisites']),
                'Prerequisite Credits': data['prerequisite_credits'],
                'Corequisites': ','.join(data['corequisites']),
                'Department': data['department'],
                'Location': data['location']
            })