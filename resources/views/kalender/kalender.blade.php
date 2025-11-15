<div class="container py-4">
    <h1 class="text-2xl font-semibold text-center mb-4">Kalender Dapur Ibu</h1>

    <div class="mb-4" style="position: relative;">
        <input type="text" id="search" placeholder="Cari nama acara..." class="form-control" style="border-radius: 20px;">
        <ul id="results" class="list-group position-absolute z-10"></ul>
    </div>

    <div class="mt-2">
        <button class="btn btn-sm btn-primary filter-btn" data-status="all">Semua</button>
        <button class="btn btn-sm btn-warning filter-btn" data-status="DP">DP</button>
        <button class="btn btn-sm btn-success filter-btn" data-status="Lunas">Lunas</button>
    </div>

    <div id='calendar'></div>

<script src="https://cdn.jsdelivr.net/npm/fuse.js@6.6.2"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', async function() {
    const calendarEl = document.getElementById('calendar');
    const searchInput = document.getElementById('search');
    const resultsEl = document.getElementById('results');

    // Ambil data event dari server
    const res = await fetch('/events');
    const events = await res.json();
    let filteredEvents = [...events]; // Salin semua event

    // Inisialisasi kalender
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: filteredEvents,
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

    // Fungsi render ulang kalender dengan filter
    function renderCalendar(eventsToShow) {
        calendar.removeAllEvents();
        eventsToShow.forEach(e => calendar.addEvent(e));
    }

// Toggle state untuk masing-masing
let showDP = true;
let showLunas = true;

// Fungsi untuk filter berdasarkan toggle
function applyFilter() {
    const eventsToShow = events.filter(e => {
        if(e.extendedProps.status === 'dp' && showDP) return true;
        if(e.extendedProps.status === 'lunas' && showLunas) return true;
        return false;
    });
    renderCalendar(eventsToShow);
}

// Pasang listener toggle untuk masing-masing tombol
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const status = btn.dataset.status.toLowerCase(); // dp / lunas / all
        if(status === 'lunas') {
            showDP = !showDP;
            btn.classList.toggle('active', showDP);
        } else if(status === 'dp') {
            showLunas = !showLunas;
            btn.classList.toggle('active', showLunas);
        } else if(status === 'all') {
            showDP = true;
            showLunas = true;
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        }
        applyFilter();
    });
});



    // Fuse.js untuk search nama acara
    const fuse = new Fuse(events, { keys: ['title'], threshold: 0.3 });

    searchInput.addEventListener('input', function() {
        const query = searchInput.value.trim();
        if(!query) {
            resultsEl.innerHTML = '';
            return;
        }

        const results = fuse.search(query).slice(0, 5);
        resultsEl.innerHTML = results.map(r => 
            `<li class="list-group-item-action" data-date="${r.item.start}">${r.item.title}</li>`
        ).join('');

        resultsEl.querySelectorAll('li').forEach(li => {
            li.addEventListener('click', function() {
                calendar.gotoDate(li.dataset.date);
                resultsEl.innerHTML = '';
                searchInput.value = li.textContent;
            });
        });
    });

});
</script>
