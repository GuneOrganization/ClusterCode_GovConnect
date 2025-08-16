(() => {
  const HOLIDAYS = new Set([
    "2025-01-14", 
    "2025-02-04", 
    "2025-04-13", "2025-04-14", 
    "2025-05-01", 
    "2025-05-12", 
    "2025-06-11",
  ]);

 
  const BASE_SLOTS = [
    "09:00-10:00",
    "10:00-11:00",
    "11:00-12:00",
    "14:00-15:00",
    "15:00-16:00",
  ];

  
  const BOOKED_BY_DATE = {
    // "2025-02-05": ["10:00-11:00", "15:00-16:00"],
  };

  let selectedDate = null;  
  let selectedSlot = null;  

  const modal = document.getElementById('appointmentModal');
  const openBtn = document.getElementById('openModal');
  const closeBtn = document.getElementById('closeModal');
  const timeSlotsEl = document.getElementById('timeSlots');
  const selectedDateText = document.getElementById('selectedDateText');
  const selectedTimeText = document.getElementById('selectedTimeText');
  const queueNumberEl = document.getElementById('queueNumber');
  const form = document.getElementById('appointmentForm');
  const submitBtn = document.getElementById('submitBtn');

  const pad = n => String(n).padStart(2, '0');
  const toYMD = (d) => `${d.getFullYear()}-${pad(d.getMonth()+1)}-${pad(d.getDate())}`;

  function isHoliday(ymd) {
    return HOLIDAYS.has(ymd);
  }

  function isPast(ymd) {
    const today = new Date(); today.setHours(0,0,0,0);
    const d = new Date(ymd);  d.setHours(0,0,0,0);
    return d < today;
  }

  function hashStr(str) {
    let h = 2166136261 >>> 0;
    for (let i = 0; i < str.length; i++) {
      h ^= str.charCodeAt(i);
      h = Math.imul(h, 16777619);
    }
    return (h >>> 0);
  }

  function estimateQueue(ymd, slot) {
    if (!ymd || !slot) return "-";
    const h = hashStr(ymd + "|" + slot);
    return (h % 25) + 1; 
  }

  function toast(icon, title) {
    Swal.fire({
      toast: true, position: 'top-end', showConfirmButton: false,
      timer: 1800, timerProgressBar: true, icon, title
    });
  }

  function alertWarn(text) {
    Swal.fire({ icon: 'warning', title: 'Heads up', text });
  }

  function alertError(text) {
    Swal.fire({ icon: 'error', title: 'Missing details', text });
  }

  function alertSuccess(text) {
    Swal.fire({ icon: 'success', title: 'Appointment Created', text });
  }


  function renderTimeSlots(ymd) {
    timeSlotsEl.innerHTML = "";
    selectedSlot = null;
    selectedTimeText.textContent = "—";
    queueNumberEl.textContent = "-";
    submitBtn.disabled = true;

    if (!ymd) return;

    if (isHoliday(ymd)) {
      timeSlotsEl.innerHTML = `<p class="text-sm text-red-600">No slots: holiday.</p>`;
      return;
    }
    if (isPast(ymd)) {
      timeSlotsEl.innerHTML = `<p class="text-sm text-gray-500">Past date.</p>`;
      return;
    }

    const booked = new Set(BOOKED_BY_DATE[ymd] || []);

    const randomUnavailableIdx = hashStr(ymd) % BASE_SLOTS.length;

    BASE_SLOTS.forEach((slot, idx) => {
      const unavailable = booked.has(slot) || idx === randomUnavailableIdx;

      const btn = document.createElement('button');
      btn.type = "button";
      btn.dataset.time = slot;
      btn.className = [
        "px-3 py-2 rounded border text-sm transition",
        unavailable
          ? "bg-red-100 text-gray-500 cursor-not-allowed border-red-200"
          : "bg-green-100 hover:bg-green-200 border-green-200"
      ].join(" ");
      btn.textContent = slot.replace("-", " - ");

      if (!unavailable) {
        btn.addEventListener('click', () => {
          // Unselect previous
          [...timeSlotsEl.querySelectorAll('button')].forEach(b => {
            b.classList.remove("ring-2","ring-sky-400","bg-sky-100");
            if (!b.classList.contains("cursor-not-allowed")) {
              b.classList.remove("bg-green-200");
              b.classList.add("bg-green-100");
            }
          });
          // Select this
          btn.classList.add("ring-2","ring-sky-400","bg-sky-100");
          selectedSlot = slot;
          selectedTimeText.textContent = slot.replace("-", " - ");
          queueNumberEl.textContent = estimateQueue(ymd, slot);
          submitBtn.disabled = false;
          toast('info', `Time selected: ${slot}`);
        });
      } else {
        btn.disabled = true;
      }

      timeSlotsEl.appendChild(btn);
    });

    const anyEnabled = !!timeSlotsEl.querySelector('button:not([disabled])');
    if (!anyEnabled) {
      timeSlotsEl.innerHTML = `<p class="text-sm text-red-600">No available slots for ${ymd}.</p>`;
      alertWarn("No available time slots for the selected date.");
    }
  }

  
  let calendar = null;

  function buildCalendar() {
    const calendarEl = document.getElementById('calendar2');

    calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      height: 520,
      selectable: true,
      weekends: true,
      stickyHeaderDates: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: ''
      },
      validRange: (nowDate) => ({ start: toYMD(new Date()) }),
      dateClick: (info) => {
        const ymd = info.dateStr;
        if (isHoliday(ymd)) {
          alertWarn("This date is a holiday. Please choose another date.");
          selectedDate = null;
          selectedDateText.textContent = "—";
          renderTimeSlots(null);
          return;
        }
        if (isPast(ymd)) return;

        selectedDate = ymd;
        selectedDateText.textContent = ymd;
        toast('success', `Date selected: ${ymd}`);
        renderTimeSlots(ymd);
      },
      
      events: Array.from(HOLIDAYS).map(d => ({
        start: d,
        end: d,
        display: 'background',
        className: 'is-holiday'
      })),
      
      dayCellDidMount: (arg) => {
        const ymd = toYMD(arg.date);
        if (isHoliday(ymd)) {
          arg.el.classList.add('is-holiday');
        }
      }
    });

    calendar.render();
  }

  
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const service = document.getElementById('service').value.trim();
    const department = document.getElementById('department').value.trim();
    const branch = document.getElementById('branch').value.trim();

    if (!service || !department || !branch || !selectedDate || !selectedSlot) {
      alertError("Please fill all fields and select date & time.");
      return;
    }

    
    alertSuccess(`Your appointment is set for ${selectedDate} at ${selectedSlot}. Queue No: ${queueNumberEl.textContent}`);
    
    setTimeout(() => hideModal(), 700);
  });

  
  function showModal() { modal.classList.add('show'); modal.classList.remove('hidden'); }
  function hideModal() { modal.classList.remove('show'); modal.classList.add('hidden'); }

  if (openBtn) openBtn.addEventListener('click', showModal);
  if (closeBtn) closeBtn.addEventListener('click', hideModal);
  modal.addEventListener('click', (e) => { if (e.target === modal) hideModal(); });

  
  document.addEventListener('DOMContentLoaded', () => {
    buildCalendar();
    
    const today = toYMD(new Date());
    if (!isHoliday(today)) {
      selectedDate = today;
      selectedDateText.textContent = today;
      renderTimeSlots(today);
    }
  });

})();