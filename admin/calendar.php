`<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Appointment Calendar</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css' rel='stylesheet' />
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        #calendar {
            max-width: 900px;
            margin: 40px auto;
        }
        .fc-day {
            position: relative;
        }
        .appointment-count {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: rgba(255, 0, 0, 0.7);
            color: white;
            border-radius: 5px;
            padding: 2px 5px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div id='calendar'></div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Sample appointment data
            const appointments = [
                { title: 'General Checkup', start: '2024-10-31' },
                { title: 'Vaccination', start: '2024-10-31' },
                { title: 'Grooming', start: '2024-11-01' },
                { title: 'Follow-up', start: '2024-11-01' },
                { title: 'Dental Cleaning', start: '2024-11-01' },
                { title: 'Emergency Visit', start: '2024-11-03' },
                { title: 'Annual Checkup', start: '2024-11-04' }
            ];

            // Initialize FullCalendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: appointments,
                dayRender: function(info) {
                    const dateStr = info.dateStr; // Date in 'YYYY-MM-DD' format
                    const count = appointments.filter(app => app.start === dateStr).length;

                    // If there are appointments, show the count
                    if (count > 0) {
                        const countDiv = document.createElement('div');
                        countDiv.className = 'appointment-count';
                        countDiv.textContent = count;
                        info.el.appendChild(countDiv);
                    }
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>
