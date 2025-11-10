
<div class="container py-4">
    <h1 class="text-2xl font-semibold text-center mb-4">📅 Kalender catering</h1>

    {{-- Bagian kalender --}}
    <div id='calendar'></div>




<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: '/events',
            eventDisplay: 'block',
            eventTimeFormat: { hour: '2-digit', minute: '2-digit' },
            eventDidMount: function(info) {
                info.el.setAttribute('title', info.event.extendedProps.description);
            },
            eventClick: function(info) {
                window.location.href = "/preorder/" + info.event.id;
            }
        });

        calendar.render();
    });
</script>
