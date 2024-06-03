CREATE TABLE salaries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    salary FLOAT,
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);
