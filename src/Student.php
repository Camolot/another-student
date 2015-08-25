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

      function setEnrollment_date()
      {
        $this->enrollment_date = $enrollment_date;

      }

      function getEnrollment_date()
      {
        return $this->enrollment_date;
      }

      function save()
      {
          array_push($_SESSION['list_of_students'], $this);
      }

      static function getAll() {

        $returned_students = $GLOBALS['DB']->query("SELECT * FROM students");
        $students = array();
        foreach($returned_students as $student) {
          $name = $student['name'];
          $enrollment_date = $student['enrollment_date'];
          $id = $student['id'];

          $new_student = new Student($name, $enrollment_date, $id);
                array_push($student, $new_student);
        }
        return $students;
      }

        // MUST make a get all pass and save pass BEFORE running more tests!!!! good luck!
  }

 ?>
