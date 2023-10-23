# F23_CIS3760_303

# SPRINT 1

Goal: Find the pre-requisites for all undergraduate courses offered by the
University of Guelph and store them in an Excel spreadsheet.

# What's New

Several modules were introduced in this sprint to accomplish the various tasks:

1. Preprocessing the data
2. Parsing the preprocessed data into courses that are appended to a course_list dictionary
3. Saving the course_list dictionary to an excel spread sheet
4. Creating a command line menu to search through various courses located in the excel spread sheet

# Usage

This will run the main application logic 

```python3 app.py```


# SPRINT 2

Goal: Please create an Excel spreadsheet where a person can write in their completed and in
progress courses in different cells. One course per cell. Given the courses, use VBA to
generate courses they can take next (have the pre-requisites for) and show them in the
Excel spreadsheet.


# Usage

Refer to [wiki](https://gitlab.socs.uoguelph.ca/cis3760_f23/f23_cis3760_303/-/wikis/Microsoft-VBA-Handbook) for instructions on how to use the application


# SPRINT 3

Goal: You have a team VM hosted on a SoCS server. The Debian Linux VM has NGINX, PHP,
and MySQL installed. The web server is configured and is already running with HTTPS
enabled. The website PHP directory is /var/www/html
Please update the homepage to host and describe your Excel spreadsheet.

# Usage

[Website](https://cis3760f23-11.socs.uoguelph.ca/)

Contains three main pages

- Home: main landing page
- How It Works: describes the product's functionality
- Meet the team: Individual team's introductions
    - PHP Scripts located within each team member's profile

# SPRINT 4

Goal: store your course data in the VM MySQL database. Create a server side REST
API, 100% in PHP, to access and modify the course data in the database. Document
how to use your API on the VM website, along with some examples showing it working.

# Usage

[Website](https://cis3760f23-11.socs.uoguelph.ca/)


refer to the [sprint 4 wiki](https://gitlab.socs.uoguelph.ca/cis3760_f23/f23_cis3760_303/-/wikis/Sprint-4) for to see documentation on sprint 4 activities
refer to the [Wiki Handbook](https://gitlab.socs.uoguelph.ca/cis3760_f23/f23_cis3760_303/-/wikis/Team-Handbook/Using-Postman-for-REST-API-testing) for how to use postman for rest API testing

Contains a new additional page & new functionallity

- API Access: provides and interface to interact with the SQL database through GET PUT POST and DELETE
    - (NOTE: currently only GET is working on the vm - DELETE & POST work on localhost)
    - working methods also work by navigating to their URL
- SQL database is running on the vm
    - created a reset button for the sql database that will return it to its original state

