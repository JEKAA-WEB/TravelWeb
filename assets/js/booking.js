document.getElementById('bookingForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
  
    // Get form data
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var destination = document.getElementById('destination').value;
    var date = document.getElementById('date').value;
  
    // Perform validation
    if (name === '' || email === '' || destination === '' || date === '') {
      alert('Please fill in all fields.');
      return;
    }
  
    // Proceed with booking
    bookTravel(name, email, destination, date);
  });
  function bookTravel(name, email, destination, date) {
    // You can make an AJAX request to your server to handle the booking
    // Example using fetch API:
    fetch('/api/bookings', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        name: name,
        email: email,
        destination: destination,
        date: date
      })
    })
    .then(function(response) {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error('Booking failed.');
      }
    })
    .then(function(data) {
      // Display booking success message or perform other actions
      document.getElementById('bookingStatus').textContent = 'Booking successful!';
    })
    .catch(function(error) {
      // Display error message or perform other error handling
      document.getElementById('bookingStatus').textContent = 'Booking failed. Please try again later.';
      console.error(error);
    });
  }