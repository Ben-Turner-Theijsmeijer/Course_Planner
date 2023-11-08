<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\CoursesTaken;

class CourseController extends Controller
{

    /*
    ======================================================================
    ||                        Course Functions                          ||
    ======================================================================
    */

    public function getCourse(string $courseCode)
    {
        $course = Courses::select('*')
            ->where('CourseCode', $courseCode)
            ->get();
        return response()->json($course, 200);
    }

    public function deleteCourse(string $courseCode)
    {
        if(Courses::where('CourseCode', $courseCode)->exists()) {
            $course = Courses::find($courseCode);
            $course->delete();

            return response()->json([
                'message' => "Record deleted."
            ],  202);
        } else {
            return response()->json([
                'message' => 'Course not found.'
            ],  404);
        }
    }

    public function createCourse(Request $request)
    {
        $courseData = $request::json()->all();

        Courses::insert([
            'CourseCode' => $courseData[0]['CourseCode'],
            'CourseName' => $courseData[0]['CourseName'],
            'CourseOffering' => $courseData[0]['CourseOffering'],
            'CourseWeight' => $courseData[0]['CourseWeight'],
            'CourseDescription' => $courseData[0]['CourseDescription'],
            'CourseFormat' => $courseData[0]['CourseFormat'],
            'Prerequisites' => $courseData[0]['Prerequisites'],
            'PrerequisiteCredits' => $courseData[0]['PrerequisiteCredits'],
            'Corequisites' => $courseData[0]['Corequisites'],
            'Restrictions' => $courseData[0]['Restrictions'],
            'Equates' => $courseData[0]['Equates'],
            'Department' => $courseData[0]['Department'],
            'Location' => $courseData[0]['Location']
        ]);
    }

    public function updateCourse(Request $request)
    {
        $courseData = $request->json()->all();

        if(Courses::where('CourseCode', $courseData[0]['CourseCode'])->exists()) {
            $course = Courses::find($courseData[0]['CourseCode']);
            $course->update([
                'CourseName' => $courseData[0]['CourseName'],
                'CourseOffering' => $courseData[0]['CourseOffering'],
                'CourseWeight' => $courseData[0]['CourseWeight'],
                'CourseDescription' => $courseData[0]['CourseDescription'],
                'CourseFormat' => $courseData[0]['CourseFormat'],
                'Prerequisites' => $courseData[0]['Prerequisites'],
                'PrerequisiteCredits' => $courseData[0]['PrerequisiteCredits'],
                'Corequisites' => $courseData[0]['Corequisites'],
                'Restrictions' => $courseData[0]['Restrictions'],
                'Equates' => $courseData[0]['Equates'],
                'Department' => $courseData[0]['Department'],
                'Location' => $courseData[0]['Location']
            ]);

            return response()->json([
                'message' => 'Course updated.'
            ],  202);
        } else {
            return response()->json([
                'message' => 'Course not found.'
            ],  404);
        }
    }

    /*
    ======================================================================
    ||                      Prerequisites Functions                     ||
    ======================================================================
    */

    public function getPrereqs(string $courseCode)
    {
        $prereqs = Courses::select('Prerequisites')
            ->where('CourseCode', $courseCode)
            ->get();
        return response()->json([
            $prereqs
        ],  200);
    }

    public function getFuturePrereqs(string $courseCode)
    {
        $courses = Courses::select('*')
            ->where('Prerequisites', 'like', '%'.$courseCode.'%')
            ->get();
        return response()->json([
            $courses
        ],  200);
    }

    public function postFuturePrereqs(Request $request)
    {
        $input = $request->input('*.CourseCode');

        $courses = Courses::select('*')
            ->where(function($query) use ($input) {
                for($i=0; $i < count($input); $i++) {
                    $query->orWhere('Prerequisites', 'like', '%'.$input[$i].'%');
                }
            })
            ->get();

        return response()->json([
            $courses,
        ],  200);
    }

    /*
    ======================================================================
    ||                        Subject Functions                         ||
    ======================================================================
    */

    public function getSubjectAll()
    {
        $subjects = Courses::select('CourseCode');
        return response()->json([
            $subjects
        ],  200);
    }

    public function getSubject(string $subjectCode) 
    {
        $course = Courses::select('CourseCode')
                            ->where('CourseCode', 'like', '%'.$subjectCode.'%s');
        return response()->json([
            $course
        ],  200);
    }

    /*
    ======================================================================
    ||                  Student Course_Taken Functions                  ||
    ======================================================================
    */

    public function getCourseTable()
    {
        $courses = CoursesTaken::select('*')
            ->get();
        return response()->json([
            $courses
        ],  200);
    }

    public function deleteCourseTable($courseCode)
    {
        if(CoursesTaken::where('CourseCode', $courseCode)->exists()) {
            $course = CoursesTaken::find($courseCode);
            $course->delete();

            return response()->json([
                'message' => "Record deleted."
            ],  202);
        } else {
            return response()->json([
                'message' => 'Course not found.'
            ],  404);
        }
    }

    public function postCourseTable($courseCode)
    {
        if(Courses::where('CourseCode', $courseCode)->exists()) {
            $course = Courses::select('*')
                ->where('CourseCode', $courseCode)
                ->get();
            CoursesTaken::insertUsing([
                'CourseCode',
                'CourseName',
                'Prerequisites'],
                $course
            );

            return response()->json([
                'message' => "Record created."
            ],  202);
        } else {
            return response()->json([
                'message' => 'Course not found.'
            ],  404);
        }
    }

    public function putCourseTable($courseCode, $grade)
    {
        if(Courses::where('', $courseCode)->exists()) {
            $course = Courses::find($courseCode);
            $course->update([
                'Grade' => $grade
            ]);
        } else {
            return response()->json([
                'message' => 'Course not found.'
            ],  404); 
        }
    }
}
