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
        $GLOBALS['DB']->exec("INSERT INTO students (name) VALUES('{$this->getName()}', $this->id = $GLOBALS['DB']->lastInsertId()");
      }

        // MUST make a get all pass and save pass BEFORE running more tests!!!! good luck! 
  }

 ?>
