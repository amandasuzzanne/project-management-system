<!DOCTYPE html>  
<html>  
<head>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>  
<script>  
 $(document).ready(function() {  
  var date = new Date();  
  var d = date.getDate();  
  var m = date.getMonth();  
  var y = date.getFullYear(); 

  var calendar = $('#calendar').fullCalendar({  
   editable: true,  
   header: {  
    left: 'prev,next today',  
    center: 'title',  
    right: 'month,agendaWeek,agendaDay'  
   },  
  
   events: "events.php",  
  
   eventRender: function(event, element, view) {   
   alert('render')  
    if (event.allDay === 'true') {  
     event.allDay = true;  
    } else {  
     event.allDay = false;  
    }  
   },  
   selectable: true,  
   selectHelper: true,  
   select: function(start, end, allDay) {  
       var title = prompt('Event Title:');  
      
       if (title) {  
           var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");  
           var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");  
           $.ajax({  
               url: 'add_events.php',  
               data: 'title='+ title+'&start='+ start +'&end='+ end,  
               type: "POST",  
               success: function(json) {  
               alert('Added Successfully');  
               }  
           });  
           calendar.fullCalendar('renderEvent',  
           {  
               title: title,  
               start: start,  
               end: end,  
               allDay: allDay  
           },  
           true  
           );  
       }  
       calendar.fullCalendar('unselect');  
   },  
  
   editable: true,  
   eventDrop: function(event, delta) {  
       var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");  
       var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");  
       $.ajax({  
           url: 'update_events.php',  
           data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,  
           type: "POST",  
           success: function(json) {  
            alert("Updated Successfully");  
           }  
       });  
   },  
   eventClick: function(event) {  
        var decision = confirm("Do you really want to do that?");   
        if (decision) {  
            $.ajax({  
                type: "POST",  
                url: "delete_event.php",  
                data: "&id=" + event.id,  
                 success: function(json) {  
                     $('#calendar').fullCalendar('removeEvents', event.id);  
                      alert("Updated Successfully");}  
            });  
        }  
    },  
   eventResize: function(event) {  
       var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");  
       var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");  
       $.ajax({  
        url: 'update_events.php',  
        data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,  
        type: "POST",  
        success: function(json) {  
         alert("Updated Successfully");  
        }  
       });  
    }  
     
  });  
    
 });  
</script>  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">

<style>
body{
    font-family: "Lato", sans-serif;
    background-color:#767c82;
    margin-left: 300px;
    margin-top: 40px;  
    text-align: center;  
}

.container{
    margin-top:3%;
}
    
button, a:hover{
    opacity: 0.8;
}

a{
    display: inline-block;
    padding: 8px 16px;
}

.sidenav {
  height: 100%;
  width: 300px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
  
 #calendar {  
  width: 650px;  
  margin: 0 auto;  
  background-color: white;
  }  
</style>  
</head>  
  
<body>  
 <h2> Event Calendar </h2>  
 <br/>  
 <div id='calendar'></div>  
</body>  

</html> 