<?php
require_once('./Person.php');
require_once('./Employee.php');

/**
 * Description of TeamLeader
 *
 * @author feher
 */
class TeamLeader extends Person 
{
    private array $employees = [];

    public function addEmployee(Employee $employee) {
        $this->employees[] = $employee;
    }

    public function getEmployees() {
        $employeeNames = [];
        foreach ($this->employees as $employee) {
            $employeeNames[] = $employee->getName();
        }
        return $employeeNames;
    }
    
}


$teamleader = new TeamLeader("Jay Doe");

$employee1 = new Employee("Kay Oh");
$employee2 = new Employee("May Woe");

$teamleader->addEmployee($employee1);
$teamleader->addEmployee($employee2);

var_dump($teamleader->getEmployees());




