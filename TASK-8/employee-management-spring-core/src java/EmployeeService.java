package com.example.service;

import com.example.model.Employee;
import com.example.repository.EmployeeRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;

@Component
public class EmployeeService {

    @Autowired
    private EmployeeRepository repository;

    public void createEmployee(int id, String name, String dept) {
        Employee emp = new Employee(id, name, dept);
        repository.addEmployee(emp);
    }

    public List<Employee> listEmployees() {
        return repository.getAllEmployees();
    }
}
