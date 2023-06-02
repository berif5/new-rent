// // Upload the selected date to the database
// var selectedDate = new Date(currentYear, currentMonth, this.textContent);
// var formattedDate = selectedDate.toISOString().split('T')[0];

// fetch(saveBookingRoute, {
//   method: 'POST',
//   headers: {
//     'Content-Type': 'application/json',
//     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//   },
//   body: JSON.stringify({ selectedDate: formattedDate }),
// })
// .then(response => response.json())
// .then(data => {
//   console.log(data.message); // Optional: Display success message
// })
// .catch(error => {
//   console.error(error); // Optional: Handle error
// });
