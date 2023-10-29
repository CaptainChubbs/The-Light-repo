// Prepare the event data (replace this with your actual event data)
  const eventData = [
    {
      title: 'Event 1',
      start: '2023-10-10T14:00:00',
      end: '2023-10-10T16:00:00',
    },
    {
      title: 'Event 2',
      start: '2023-10-15T15:00:00',
      end: '2023-10-15T17:00:00',
    },
    // Add more event objects as needed
  ];

  // Initialize FullCalendar
  document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth', // Display the calendar in month view
      events: eventData, // Use the prepared event data
      eventColor: '#007bff', // Set the background color of events
      eventTextColor: '#fff', // Set the text color of events
      eventBorderColor: '#0056b3', // Set the border color of events
    });
    calendar.render();
  });