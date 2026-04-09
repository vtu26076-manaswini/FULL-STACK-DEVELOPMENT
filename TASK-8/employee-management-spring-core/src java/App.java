package com.example;

import com.example.config.AppConfig;
import com.example.service.EmployeeService;
import org.springframework.beans.factory.BeanFactory;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;

public class App {
    public static void main(String[] args) {

        BeanFactory factory = new AnnotationConfigApplicationContext(AppConfig.class);

        EmployeeService service = factory.getBean(EmployeeService.class);

        // Adding Employees
        service.createEmployee(1, "Sneha", "IT");
        service.createEmployee(2, "Rahul", "HR");

        // Display Employees
        service.listEmployees().forEach(System.out::println);
    }
}
