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
    class CourseTest extends PHPUnit_Framework_TestCase
    {


        protected function tearDown()
        {
           Student::deleteAll();
           //Course::deleteAll();
        }


        function test_getName()
        {
           //Arrange
           $name = "Chris";
           $enrollment_date = "04-04-04";
           $id = 5;
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
              $result = $test_enrollment_date->getEnrollmentDate();
              //Assert
              $this->assertEquals($enrollment_date, $result);
          }

          function test_save()
          {
              //Arrange
              $name = "Bob";
              $enrollment_date = "2015-06-06";
              $id = 1;
              $test_student = new Student($name, $enrollment_date, $id);

              //Act
              $test_student->save();

              //Assert
              $result = Student::getAll();
              $this->assertEquals($test_student, $result[0]);
          }

          function testGetAll()
          {
              //Arrange
              $name = "Bob";
              $enrollment_date = "2015-06-06";
              $id = 1;
              $test_student = new Student($name, $enrollment_date, $id);
              $test_student->save();

              $name2 = "John";
              $enrollment_date2 = "2015-06-06";
              $id2 = 2;
              $test_student2 = new Student($name2, $enrollment_date2, $id2);
              $test_student2->save();

              //Act
              $result = Student::getAll();

              //Assert
              $this->assertEquals([$test_student, $test_student2], $result);
          }

          function testDeleteAll()
          {
              //Arrange
              $name = "Bob";
              $enrollment_date = "2015-06-06";
              $id = 1;
              $test_student = new Student($name, $enrollment_date, $id);
              $test_student->save();

              $name2 = "John";
              $enrollment_date2 = "2015-06-06";
              $id2 = 1;
              $test_student2 = new Student($name2, $enrollment_date2, $id2);
              $test_student2->save();

              //Act
              Student::deleteAll();
              $result = Student::getAll();

              //Assert
              $this->assertEquals([], $result);
          }

          function testFind()
          {
              //Arrange
              $name = "Bob";
              $enrollment_date = "2015-06-06";
              $id = 1;
              $test_student = new Student($name, $enrollment_date, $id);
              $test_student->save();

              $name2 = "John";
              $enrollment_date2 = "2015-06-06";
              $id2 = 1;
              $test_student2 = new Student($name2, $enrollment_date2, $id2);
              $test_student2->save();

              //Act
              $result = Student::find($test_student->getId());

              //Assert
              $this->assertEquals($test_student, $result);
          }

          function testUpdate()
          {
              //Arrange
              $name = "Bob";
              $enrollment_date = "2015-06-06";
              $id = 1;
              $test_student = new Student($name, $enrollment_date, $id);
              $test_student->save();

              $new_name = "Billy Bob";

              //Act
              $test_student->update($new_name);

              //Assert
              $this->assertEquals("Billy Bob", $test_student->getName());
          }

        //   function testAddCourse()
        //   {
        //       //Arrange
        //       $name = "Psychology";
        //       $id = 1;
        //       $test_student = new Course($name, $id);
        //       $test_student->save();
          //
        //       $name2 = "Rick";
        //       $enrollment_date = "2015-06-06";
        //       $id2 = 2;
        //       $test_student2 = new Student($name2, $enrollment_date, $id2);
        //       $test_student->save();
          //
        //       //Act
        //       $test_student->addStudent($test_course);
          //
        //       //Assert
        //       $this->assertEquals($test_student->getCourses(), [$test_course]);
        //   }


     }
?>
