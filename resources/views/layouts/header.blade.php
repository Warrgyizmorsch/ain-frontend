<!--begin::Header-->
<div id="kt_header" class="header align-items-stretch">
	<div class="container-fluid d-flex align-items-stretch justify-content-between">

		<!--begin::Aside toggle (mobile)-->
		<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
			<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
				id="kt_aside_mobile_toggle">
				<!-- SVG Icon -->
				<span class="svg-icon svg-icon-2x mt-1">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
							fill="black" />
						<path opacity="0.3"
							d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
							fill="black" />
					</svg>
				</span>
			</div>
		</div>
		<!--end::Aside toggle-->
		
		<!--begin::Logo (mobile)-->
		<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
			<a href="{{ route('dashboard') }}" class="d-lg-none">
				<img alt="Logo" src="{{ asset('assets/media/avatars/assignment_logo.png') }}" class="h-50px" />
			</a>
		</div>
		<!--end::Logo-->

		<!--begin::Navigation + User Info-->
		<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">

			<!--begin::Navbar-->
			<div class="d-flex align-items-stretch" id="kt_header_nav">
				<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
					data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
					data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
					data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
					data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">

					<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 
                                menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary 
                                menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu"
						data-kt-menu="true">

						<!-- Dashboard Link -->
						<div class="menu-item me-lg-1">
							<a class="menu-link active py-3" href="{{ route('dashboard') }}">
								<span class="menu-title">Dashboard</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!--end::Navbar-->
			@php
    $todaySeconds = \DB::table('user_working_times')
        ->where('user_id', Auth::id())
        ->where('date', date('Y-m-d'))
        ->value('active_seconds') ?? 0;
@endphp
			<!--begin::User Menu-->
			<div class="d-flex align-items-stretch flex-shrink-0">
				<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">

					<div class="d-flex align-items-center ms-3 me-4">
    <div class="bg-light-primary rounded-pill px-4 py-2 border border-primary">
        <span class="fs-7 fw-bold text-gray-700">Working Time: </span>
        <span id="working-timer" class="fs-6 fw-bolder text-primary">00:00:00</span>
    </div>
</div>

					<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
						data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">

						<!-- User Avatar -->
						<img src="{{ asset(Auth::user()->photo ?? 'assets/media/avatars/blank.png') }}" alt="user" />
					</div>

					<!-- User Dropdown Menu -->
					<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 
                                menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">

						<!-- User Info -->
						<div class="menu-item px-3">
							<div class="menu-content d-flex align-items-center px-3">
								<div class="symbol symbol-50px me-5">
									<img src="{{ asset(Auth::user()->photo ?? 'assets/media/avatars/blank.png') }}"
										alt="Logo" />
								</div>

								<div class="d-flex flex-column">
									<div class="fw-bolder d-flex align-items-center fs-5">
										{{ Auth::user()->name }}
										<span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">
											{{ getUserRoleName(Auth::user()->role_id) }}
										</span>
									</div>
									<a href="#" class="fw-bold text-muted text-hover-primary fs-7">
										{{ Auth::user()->email }}
									</a>
								</div>
							</div>
						</div>

						<div class="separator my-2"></div>

						<!-- Profile -->
						<div class="menu-item px-5">
							<a href="/profile" class="menu-link px-5">My Profile</a>
						</div>

						<div class="separator my-2"></div>

						<!-- Sign Out -->
						<div class="menu-item px-5">
							<a href="{{ route('logout') }}" class="menu-link px-5"
								onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								Sign Out
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>

						<div class="separator my-2"></div>
					</div>
				</div>

				<!-- Mobile Menu Toggle -->
				
			</div>
			<!--end::User Menu-->
		</div>
		<!--end::Navigation + User Info-->
	</div>
</div>
<!--end::Header-->
<script>
    let timerInterval;
    // DB se fetch kiye hue seconds yahan pass karein
    let totalSeconds = parseInt("{{ $todaySeconds }}") || 0; 
    let idleTime = 0;
    const IDLE_LIMIT = 20; 

    const timerDisplay = document.getElementById('working-timer');

    function formatTime(seconds) {
        let hrs = Math.floor(seconds / 3600);
        let mins = Math.floor((seconds % 3600) / 60);
        let secs = seconds % 60;
        return `${hrs.toString().padStart(2, '0')}:${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    }

    // Initial Display
    timerDisplay.innerText = formatTime(totalSeconds);

    function syncTabs() {
        const lastTime = localStorage.getItem('active_working_time');
        if (lastTime) {
            // LocalStorage se tabhi lein jab wo DB wale time se zyada ho (Multi-tab sync fix)
            let storageTime = parseInt(lastTime);
            if(storageTime > totalSeconds) {
                totalSeconds = storageTime;
                timerDisplay.innerText = formatTime(totalSeconds);
            }
        }
    }

    function saveTimeToDB() {
        $.ajax({
            url: "{{ route('user.update-time') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                seconds: totalSeconds
            }
        });
    }

    function startTimer() {
        if (timerInterval) return;
        
        timerInterval = setInterval(() => {
            if (idleTime < IDLE_LIMIT) {
                totalSeconds++;
                idleTime++;
                
                const timeStr = formatTime(totalSeconds);
                timerDisplay.innerText = timeStr;
                
                localStorage.setItem('active_working_time', totalSeconds);
                
                // Har 30 seconds mein save
                if (totalSeconds % 30 === 0) saveTimeToDB();
            } else {
                stopTimer();
            }
        }, 1000);
    }

    function stopTimer() {
        clearInterval(timerInterval);
        timerInterval = null;
        saveTimeToDB();
    }

    function resetIdleTimer() {
        idleTime = 0;
        if (!timerInterval) startTimer();
    }

    // Listen to mouse/key events
    ['mousemove', 'keydown', 'scroll', 'click'].forEach(evt => 
        window.addEventListener(evt, resetIdleTimer)
    );

    // Multi-tab Sync listener
    window.addEventListener('storage', (e) => {
        if (e.key === 'active_working_time') {
            totalSeconds = parseInt(e.newValue);
            timerDisplay.innerText = formatTime(totalSeconds);
        }
    });

    // Start on load
    syncTabs();
    startTimer();

    // Tab close save
    window.onbeforeunload = saveTimeToDB;
</script>