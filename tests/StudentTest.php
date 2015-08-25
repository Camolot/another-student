<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Course.php";
    require_once "src/Student.php";


    $server = 'mysql:host=localhost;dbname=registrar_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    // php unit test
    class CategoryTest extends PHPUnit_Framework_TestCase
    {

        //  tear down
        // protected function tearDown()
        // {
        //    Student::deleteAll();
        //    Course::deleteAll();
        // }

    //    getstudent name test in students
        function test_getName()
        {
           //Arrange
           $name = "Chris";
           $enrollment_date = "04-04-04";
           $id = "5";
           $test_student = new Student ($name, $enrollment_date, $id);
            //Act
           $result = $test_student->getName();
           //Assert
           $this->assertEquals($name, $result);
         }


         // test get student id #
         function test_getId()
         {
            //Arrange
            $name = "John";
            $enrollment_date = "05-05-05";
            $id = 55;

            $test_id = new Student ($name, $enrollment_date, $id);
             //Act
            $result = $test_id->getId();
            //Assert
            $this->assertEquals($id, $result);
          }

          function test_getEnrollment_date()
          {
              //Arrange
              $name = "John";
              $enrollment_date = "05-05-05";
              $id = 56;
              $test_enrollment_date = new Student ($name, $enrollment_date, $id);
              //Act
              $result = $test_enrollment_date->getEnrollment_date();
              //Assert
              $this->assertEquals($enrollment_date, $result);
          }

          function test_save()
          {
              //Arrange
              $name = "Bob";
              $enrollment_date = "06-06-06";
              $id = 57;
              $test_student = new Student ($name, $enrollment_date, $id);
              $test_student->save();
              //Act
              $result = Student::getAll();
              //Assert
              $this->assertEquals($test_student, $result[0]);

            }


         //
        //  // getstudent course ID test in students
        //  function test_getCourse_number()
        //  {
        //     //Arrange
        //     $name = "Bob";
        //     $enrollment_date = "05-05-05";
        //     $course_number = 23;
        //     $id = 47;
        //     $test_course_number = new Student ($name, $enrollment_date, $course_number, $id);
        //      //Act
        //     $result = $test_course_number->getCourse_number();
        //     //Assert
        //     $this->assertEquals(23, $result);
        //   }
         //
         //
         //








     }





?>
