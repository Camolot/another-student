<?php

Class Student

{
    //properties for class
    private $name;
    private $enrollment_date;
    private $id;

    //construct

    function __construct($name, $enrollment_date, $id = null)
    {
        $this->name = $name;
        $this->enrollment_date = $enrollment_date;
        $this->id = $id;
    }

    // get set name

    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

    function getName()
    {
        return $this->name;
    }
    // get set id

    function getId()
    {
        return $this->id;
    }

    function setId()
    {
        $this->id = (int) $id;
    }

    // get set enrllment date

    function setEnrollmentDate()
    {
        $this->enrollment_date = $enrollment_date;

    }

    function getEnrollmentDate()
    {
        return $this->enrollment_date;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO students (name, enrollment_date) VALUES ('{$this->getName()}', '{$this->getEnrollmentDate()}');");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_students = $GLOBALS['DB']->query("SELECT * FROM students");

        $students = array();
        foreach($returned_students as $student) {
            $name = $student['name'];
            $enrollment_date = $student['enrollment_date'];
            $id = $student['id'];
            $new_student = new Student($name, $enrollment_date, $id);
            array_push($students, $new_student);
        }
        return $students;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM students;");
    }

    static function find($search_id)
    {
        $found_student = null;
        $students = Student::getAll();
        foreach($students as $student) {
          $student_id = $student->getId();
          if ($student_id == $search_id) {
              $found_student = $student;
          }
        }
        return $found_student;
    }

    function addCourse($course)
    {
        $GLOBALS['DB']->exec("INSERT INTO categories_tasks (category_id, task_id) VALUES ({$category->getId()}, {$this->getId()});");
    }


    function getCourses()
    {
        $query = $GLOBALS['DB']->query("SELECT course_id FROM courses_students WHERE student_id = {$this->getId()};");
        $course_ids = $query->fetchAll(PDO::FETCH_ASSOC);
        $courses = array();
        foreach($courses_ids as $id) {
            $course_id = $id['course_id'];
            $result = $GLOBALS['DB']->query("SELECT * FROM courses WHERE id = {$course_id};");
            $returned_course = $result->fetchAll(PDO::FETCH_ASSOC);
            $name = $returned_course[0]['name'];
            $enrollment_date = $returned_course[0]['enrollment_date'];
            $id = $returned_category[0]['id'];
            $new_course = new Course($name, $enrollment_date, $id);
            array_push($courses, $new_course);
        }
        return $courses;
    }

    function delete()
    {
        $GLOBALS['DB']->exec("DELETE FROM students WHERE id = {$this->getId()};");
        $GLOBALS['DB']->exec("DELETE FROM courses_students WHERE task_id = {$this->getId()};");
    }

}

?>
