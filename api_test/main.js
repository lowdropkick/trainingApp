const apiKey = 'sandbox-wZrvSFSWWI9X_0d4oCwmIuWEXI8p-Y9fhM0vFRSOHbo';
const apiUrl = 'https://api.sandbox.breathehr.info:443/v1/employees?page=1';

// Make a request to get all employees
const employeeListElement = document.getElementById('employeeList');

// Make a request to get all employees
fetch(apiUrl, {
  method: 'GET',
  headers: {
    'X-Api-Key': apiKey
  }
})
.then(response => {
  console.log(response.status); 
  console.log(response.headers.get('Content-Type')); 
  console.log(response.headers.get('Link'));
  console.log(response.headers.get('Total')); 
  return response.json();
})
.then(data => {
  data.employees.forEach(e => {
    const employeeName = e.first_name + ' ' + e.last_name + ' email: ' + e.email;
    const listItem = document.createElement('li');
    listItem.textContent = employeeName;
    employeeListElement.appendChild(listItem);
  });
})
.catch(error => console.error(error));