<?php
require_once('./Person.php');
/**
 * Description of Employee
 *
 * @author feher
 */
class Employee extends Person
{
    public function vacation()
    {
        print('Szabadság :)');
    }
    
    public function payroll()
    {
        //parent::payroll();
        print('Kis fizetés :(');
    }
        
}

//$employee = new Employee();
//$employee->payroll();
//var_dump($employee instanceof Person);


