<div class="calendar-container">
  <div class="calendar-header">
    <button id="prev-month" class="nav-button">«</button>
    <span id="month-year" class="month-year"></span>
    <button id="next-month" class="nav-button">»</button>
  </div>
  <table id="calendar" class="calendar-table">
    <thead>
      <tr>
        <th>D</th>
        <th>L</th>
        <th>M</th>
        <th>M</th>
        <th>J</th>
        <th>V</th>
        <th>S</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</div>

<!-- Modal para agregar eventos -->
<div id="event-modal" style="display:none;">
  <div>
    <h3>Agregar Evento</h3>
    <input type="text" id="event-title" placeholder="Título del evento" />
    <textarea id="event-description" placeholder="Descripción del evento"></textarea>
    <button id="save-event">Guardar Evento</button>
    <button id="close-modal">Cerrar</button>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const calendarContainer = document.getElementById('calendar');
    const monthYearLabel = document.getElementById('month-year');
    const prevMonthButton = document.getElementById('prev-month');
    const nextMonthButton = document.getElementById('next-month');
    const tbody = calendarContainer.querySelector('tbody');
    const eventModal = document.getElementById('event-modal');
    const eventTitleInput = document.getElementById('event-title');
    const eventDescriptionInput = document.getElementById('event-description');
    const saveEventButton = document.getElementById('save-event');
    const closeModalButton = document.getElementById('close-modal');
  
    let currentDate = new Date();
    let events = []; // Array para almacenar eventos
  
    function renderCalendar(date) {
      const currentMonth = date.getMonth();
      const currentYear = date.getFullYear();
  
      // Set the month-year label
      monthYearLabel.textContent = `${getMonthName(currentMonth)} ${currentYear}`;
  
      // Get the first day of the month
      const firstDayOfMonth = new Date(currentYear, currentMonth, 1);
      const lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);
  
      // Get the number of days in the month
      const totalDays = lastDayOfMonth.getDate();
  
      // Get the first day of the week (0 = Sunday)
      const firstDayOfWeek = firstDayOfMonth.getDay();
  
      // Clear previous rows
      tbody.innerHTML = '';
  
      // Generate the rows for the calendar
      let row = document.createElement('tr');
      let dayCount = 1;
  
      // Create empty cells for the days before the start of the month
      for (let i = 0; i < firstDayOfWeek; i++) {
        row.appendChild(document.createElement('td'));
      }
  
      // Create cells for the days in the month
      for (let i = firstDayOfWeek; i < 7; i++) {
        const cell = document.createElement('td');
        cell.textContent = dayCount;
        
        // Add the "today" class to today's date
        if (dayCount === new Date().getDate() && currentMonth === new Date().getMonth() && currentYear === new Date().getFullYear()) {
          cell.classList.add('today');
        }
        
        cell.addEventListener('click', function() {
          // Open the event modal when a date is clicked
          openEventModal(dayCount, currentMonth, currentYear);
        });
  
        row.appendChild(cell);
        dayCount++;
      }
      tbody.appendChild(row);
  
      // Create the rest of the rows
      while (dayCount <= totalDays) {
        row = document.createElement('tr');
  
        for (let i = 0; i < 7; i++) {
          if (dayCount <= totalDays) {
            const cell = document.createElement('td');
            cell.textContent = dayCount;
            
            // Optionally add a class for selected dates
            // cell.classList.add('selected');
  
            row.appendChild(cell);
            dayCount++;
          } else {
            row.appendChild(document.createElement('td'));
          }
        }
  
        tbody.appendChild(row);
      }
    }
  
    // Helper function to get the name of the month
    function getMonthName(monthIndex) {
      const months = [
        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
      ];
      return months[monthIndex];
    }
  
    // Event listeners for navigation buttons
    prevMonthButton.addEventListener('click', function() {
      currentDate.setMonth(currentDate.getMonth() - 1);
      renderCalendar(currentDate);
    });
  
    nextMonthButton.addEventListener('click', function() {
      currentDate.setMonth(currentDate.getMonth() + 1);
      renderCalendar(currentDate);
    });
  
    // Initial render of the calendar
    renderCalendar(currentDate);
  });
</script>
