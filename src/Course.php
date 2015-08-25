<?php

  Class Course

  {
  //properties for course
  private $course_number;
  private $course_name;
  private $teacher_name;


  function __construct($course_number, $course_name)
        {
            $this->course_name = $course_name;
            $this->course_number = $course_number;
        }

        //getters and setters
        // set course name
        function setCourse_name($new_course_name)
        {
            return $this->course_name = (string) $new_course_name;
        }

        function setCourse_number()
        {
            return $this->course_number = (int) $new_course_number;
        }

        // get course name

        function getCourse_name($course_name)
        {
            return $this->course_name;
        }

        // get course number

        function getCourse_number()
        {
            return $this->course_number;
        }

        // set teacher name

        function setTeacher_name()
        {
            return $this->teacher_name = (string) $new_teacher_name;
        }

        // get teacher name

        function getTeacher_name($teacher_name)
        {
            return $this->teacher_name;
        }




//
// //
//
// get all
// delete
// delete all
// save
// find?

}

 ?>
