<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link href='fullcalendar/packages/core/main.css' rel='stylesheet' />
  <link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">

  <title>Calendar</title>
</head>

<body>

  <!-- navbar  -->
  <?php include "../student/studentHeadNavbar.php" ?>

  <!-- For logout session -->
  <?php
  session_start();
  if (isset($_SESSION['roll'])) {
    //echo ' Welcome!Roll: ' . $_SESSION['roll'] . '<br/>';
    //echo ' Welcome!class: ' . $_SESSION['class'] . '<br/>';
  } else {
    header("location:../studentLogin/login.php");
  }
  ?>


  <div class="content">
    <div id='calendar'></div>
  </div>



  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script src='fullcalendar/packages/core/main.js'></script>
  <script src='fullcalendar/packages/interaction/main.js'></script>
  <script src='fullcalendar/packages/daygrid/main.js'></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid'],
        defaultDate: '2022-09-20',
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [{
            title: 'All Day Event',
            start: '2022-09-01'
          },
          {
            title: 'Mid Exam Start',
            start: '2022-09-11',
            end: '2022-09-16'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2022-09-09T16:00:00'
          },
          {
            groupId: 999,
            title: 'Exam Start',
            start: '2022-09-16T16:00:00'
          },
          {
            title: 'Conference',
            start: '2022-09-11',
            end: '2022-09-13'
          },
          {
            title: 'Meeting',
            start: '2022-09-12T10:30:00',
            end: '2022-09-12T12:30:00'
          },
          {
            title: 'Meeting',
            start: '2022-09-12T14:30:00'
          },
          {
            title: 'Happy Hour',
            start: '2022-09-12T17:30:00'
          },
          {
            title: 'Dinner',
            start: '2022-09-12T20:00:00'
          },
          {
            title: 'Birthday Party',
            start: '2022-09-13T07:00:00'
          },
          {
            title: 'Saad Birthday Party',
            start: '2022-09-28T07:00:00'
          }
        ]
      });

      calendar.render();
    });
  </script>

  <script src="js/main.js"></script>
</body>

</body>

</html>
