
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --text-color: #333;
            --light-bg: #f5f5f5;
            --border-color: #ddd;
            --today-color: #e74c3c;
            --hover-color: #eaeaea;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #ecf0f1;
        }

        .calendar-container {
            width: 100vw;
            min-height: calc(100vh - 100px); /* Ajusta los 100px al alto real del footer */
            box-shadow: none;
            border-radius: 0;
        }

        .calendar-header {
            background-color: var(--primary-color);
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .month-year {
            font-size: 24px;
            font-weight: bold;
        }

        .calendar-nav {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .nav-btn {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .nav-btn:hover {
            background-color: #1a5276;
        }

        .weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            background-color: var(--light-bg);
            border-bottom: 1px solid var(--border-color);
        }

        .weekday {
            padding: 12px;
            text-align: center;
            font-weight: bold;
            color: var(--text-color);
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            grid-gap: 1px;
            background-color: var(--border-color);
        }

        .calendar-day {
            min-height: 80px;
            background-color: white;
            padding: 10px;
            position: relative;
            transition: background-color 0.2s;
        }

        .calendar-day:hover {
            background-color: var(--hover-color);
        }

        .day-number {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .current-month .day-number {
            color: var(--text-color);
        }

        .other-month .day-number {
            color: #aaa;
        }

        .today .day-number {
            background-color: var(--today-color);
            color: white;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .event {
            background-color: var(--primary-color);
            color: white;
            padding: 2px 5px;
            font-size: 12px;
            border-radius: 3px;
            margin-bottom: 2px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .calendar-day {
                min-height: 60px;
            }
        }

        @media (max-width: 480px) {
            .weekday {
                padding: 5px;
                font-size: 14px;
            }
            
            .calendar-day {
                min-height: 40px;
                padding: 5px;
            }
            
            .day-number {
                font-size: 14px;
            }
        }

        /* Formulario para añadir eventos */
        .add-event-form {
            margin-top: 20px;
            background-color: var(--light-bg);
            padding: 15px;
            border-radius: 8px;
        }

        .form-title {
            font-size: 18px;
            margin-bottom: 10px;
            color: var(--text-color);
        }

        .form-row {
            display: flex;
            margin-bottom: 10px;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 1;
            margin-right: 10px;
            min-width: 200px;
        }

        .form-group:last-child {
            margin-right: 0;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: var(--text-color);
        }

        .form-input {
            width: 100%;
            padding: 8px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
        }

        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: var(--secondary-color);
        }

        @media (max-width: 600px) {
            .form-group {
                flex: 100%;
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>

    <div class="calendar-container">
        <div class="calendar-header">
            <div class="month-year" id="monthYear"></div>
            <div class="calendar-nav">
                <button class="nav-btn" id="prevBtn">Anterior</button>
                <button class="nav-btn" id="todayBtn">Hoy</button>
                <button class="nav-btn" id="nextBtn">Siguiente</button>
            </div>
        </div>

        <div class="weekdays" id="weekdays">
            <div class="weekday">Lun</div>
            <div class="weekday">Mar</div>
            <div class="weekday">Mié</div>
            <div class="weekday">Jue</div>
            <div class="weekday">Vie</div>
            <div class="weekday">Sáb</div>
            <div class="weekday">Dom</div>
        </div>

        <div class="calendar-grid" id="calendarGrid"></div>

        <div class="add-event-form">
            <div class="form-title">Añadir Evento</div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="eventDate">Fecha</label>
                    <input type="date" id="eventDate" class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label" for="eventTitle">Título</label>
                    <input type="text" id="eventTitle" class="form-input" placeholder="Título del evento">
                </div>
            </div>
            <button class="submit-btn" id="addEventBtn">Añadir Evento</button>
            <button class="submit-btn" id="deleteEventBtn" style="background-color: #e74c3c; margin-left: 10px;">Borrar Evento</button>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Variables para manejar el estado del calendario
            let currentDate = new Date();
            let events = JSON.parse(localStorage.getItem('calendarEvents')) || {};

            // Referencias a elementos del DOM
            const monthYearElement = document.getElementById('monthYear');
            const calendarGrid = document.getElementById('calendarGrid');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const todayBtn = document.getElementById('todayBtn');
            const addEventBtn = document.getElementById('addEventBtn');
            const deleteEventBtn = document.getElementById('deleteEventBtn');
            const eventDateInput = document.getElementById('eventDate');
            const eventTitleInput = document.getElementById('eventTitle');

            // Nombres de los meses en español
            const monthNames = [
                'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ];

            // Inicializar el calendario
            function initCalendar() {
                renderCalendar();
                setupEventListeners();
            }

            // Renderiza el calendario para el mes actual
            function renderCalendar() {
                // Actualizar el título del mes y año
                monthYearElement.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
                
                // Limpiar la cuadrícula anterior
                calendarGrid.innerHTML = '';
                
                // Obtener la fecha del primer día del mes
                const firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
                
                // Obtener el último día del mes
                const lastDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
                
                // Ajustar el día de la semana para que el lunes sea 0 y el domingo sea 6
                let dayOfWeek = firstDayOfMonth.getDay() - 1;
                if (dayOfWeek === -1) dayOfWeek = 6; // Convertir domingo (0) a 6
                
                // Fecha actual para marcar el día de hoy
                const today = new Date();
                
                // Crear días del mes anterior para completar la primera semana
                const prevMonthLastDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 0).getDate();
                
                for (let i = dayOfWeek - 1; i >= 0; i--) {
                    const day = prevMonthLastDay - i;
                    const dateString = formatDateString(new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, day));
                    createDayElement(day, 'other-month', dateString);
                }
                
                // Crear días del mes actual
                for (let day = 1; day <= lastDayOfMonth.getDate(); day++) {
                    const dateString = formatDateString(new Date(currentDate.getFullYear(), currentDate.getMonth(), day));
                    let className = 'current-month';
                    
                    // Verificar si es hoy
                    if (
                        day === today.getDate() && 
                        currentDate.getMonth() === today.getMonth() && 
                        currentDate.getFullYear() === today.getFullYear()
                    ) {
                        className += ' today';
                    }
                    
                    createDayElement(day, className, dateString);
                }
                
                // Calcular cuántos días necesitamos del próximo mes
                const daysFromNextMonth = 42 - (dayOfWeek + lastDayOfMonth.getDate());
                
                // Crear días del mes siguiente
                for (let day = 1; day <= daysFromNextMonth; day++) {
                    const dateString = formatDateString(new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, day));
                    createDayElement(day, 'other-month', dateString);
                }
            }

            // Crear un elemento de día para el calendario
            function createDayElement(day, className, dateString) {
                const dayElement = document.createElement('div');
                dayElement.className = `calendar-day ${className}`;
                dayElement.dataset.date = dateString;
                
                const dayNumber = document.createElement('div');
                dayNumber.className = 'day-number';
                dayNumber.textContent = day;
                
                dayElement.appendChild(dayNumber);
                
                // Añadir eventos para este día si existen
                if (events[dateString]) {
                    events[dateString].forEach(eventTitle => {
                        const eventElement = document.createElement('div');
                        eventElement.className = 'event';
                        eventElement.textContent = eventTitle;
                        dayElement.appendChild(eventElement);
                    });
                }
                
                calendarGrid.appendChild(dayElement);
            }

            // Configurar listeners de eventos
            function setupEventListeners() {
                prevBtn.addEventListener('click', goToPrevMonth);
                nextBtn.addEventListener('click', goToNextMonth);
                todayBtn.addEventListener('click', goToToday);
                addEventBtn.addEventListener('click', addEvent);
                deleteEventBtn.addEventListener('click', deleteEvent);

                
                // Establecer la fecha por defecto en el input de fecha
                const today = new Date();
                eventDateInput.value = formatDateInputValue(today);
            }

            // Ir al mes anterior
            function goToPrevMonth() {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar();
            }

            // Ir al mes siguiente
            function goToNextMonth() {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar();
            }

            // Ir al día de hoy
            function goToToday() {
                currentDate = new Date();
                renderCalendar();
            }

            // Añadir un evento al calendario
            function addEvent() {
                const eventDate = eventDateInput.value;
                const eventTitle = eventTitleInput.value.trim();
                
                if (!eventDate || !eventTitle) {
                    alert('Por favor, introduce una fecha y un título para el evento.');
                    return;
                }
                
                // Convertir la fecha a nuestro formato de string
                const date = new Date(eventDate);
                const dateString = formatDateString(date);
                
                // Añadir evento a nuestro objeto de eventos
                if (!events[dateString]) {
                    events[dateString] = [];
                }
                
                events[dateString].push(eventTitle);
                
                // Guardar en localStorage
                localStorage.setItem('calendarEvents', JSON.stringify(events));
                
                // Limpiar el formulario
                eventTitleInput.value = '';
                
                // Actualizar el calendario
                renderCalendar();
            }

            // Borrar evento del calendario
            function deleteEvent() {
            const eventDate = eventDateInput.value;
            const eventTitle = eventTitleInput.value.trim();

            if (!eventDate || !eventTitle) {
            alert('Por favor, introduce una fecha y el título del evento que deseas borrar.');
            return;
            }

            const date = new Date(eventDate);
            const dateString = formatDateString(date);

            if (events[dateString]) {
            // Buscar y eliminar el evento específico
            events[dateString] = events[dateString].filter(title => title !== eventTitle);

            // Si ya no quedan eventos en esa fecha, eliminar la fecha
            if (events[dateString].length === 0) {
            delete events[dateString];
            }

            // Actualizar el almacenamiento local
            localStorage.setItem('calendarEvents', JSON.stringify(events));

            // Limpiar el formulario
            eventTitleInput.value = '';

            // Actualizar el calendario
            renderCalendar();

            alert('Evento borrado correctamente.');
            } else {
                alert('No se encontró un evento con esa fecha y título.');
                }
            }


            // Formatear la fecha como YYYY-MM-DD para usar como clave en el objeto de eventos
            function formatDateString(date) {
                return `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')}`;
            }

            // Formatear la fecha para el input de fecha
            function formatDateInputValue(date) {
                return `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')}`;
            }

            // Iniciar el calendario
            initCalendar();
        });
    </script>
