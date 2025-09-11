          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
              id="layout-navbar">
              <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                  <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                      <i class="ti ti-menu-2 ti-sm"></i>
                  </a>
              </div>

              <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


                  <ul class="navbar-nav flex-row align-items-center ms-auto">
                      <!-- Realtime Clock -->
                      <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                          <div id="real-time-clock"></div>
                      </li>
                      <!-- User -->
                      <li class="nav-item navbar-dropdown dropdown-user dropdown">
                          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                              data-bs-toggle="dropdown">
                              <div class="avatar avatar-online">
                                  @if (auth()->user()->image)
                                      <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="user-image"
                                          width="100" height="100" class="rounded-circle" />
                                  @else
                                      @php
                                          $avatarName = urlencode(auth()->user()->name);
                                          $avatarUrl = "https://ui-avatars.com/api/?name={$avatarName}&background=random";
                                      @endphp
                                      <img src="{{ $avatarUrl }}" alt="user-image" class="h-auto rounded-circle" />
                                  @endif
                              </div>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-end">
                              <li>
                                  <a class="dropdown-item" href="pages-account-settings-account.html">
                                      <div class="d-flex">
                                          <div class="flex-shrink-0 me-3">
                                              <div class="avatar avatar-online">
                                                  @if (auth()->user()->image)
                                                      <img src="{{ asset('storage/uploads/profile' . auth()->user()->image) }}"
                                                          alt="user-image" width="100" height="100"
                                                          class="rounded-circle" />
                                                  @else
                                                      @php
                                                          $avatarName = urlencode(auth()->user()->name);
                                                          $avatarUrl = "https://ui-avatars.com/api/?name={$avatarName}&background=random";
                                                      @endphp
                                                      <img src="{{ $avatarUrl }}" alt="user-image"
                                                          class="h-auto rounded-circle" />
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="flex-grow-1">
                                              <span class="fw-medium d-block">{{ auth()->user()->name }}</span>
                                              <small class="text-muted">{{ auth()->user()->role->name }}</small>
                                          </div>
                                      </div>
                                  </a>
                              </li>
                              @can('edit-profile')
                                  <li>
                                      <div class="dropdown-divider"></div>
                                  </li>
                                  <li>
                                      <!-- <a class="dropdown-item" href=route('profile.index') > }} -->
                                      <a class="dropdown-item" href="{{ url('pengaturan-akun') }}">
                                          <i class="ti ti-user-check me-2 ti-sm"></i>
                                          <span class="align-middle">My Profile</span>
                                      </a>
                                  </li>
                              @endcan
                              <li>
                                  <div class="dropdown-divider"></div>
                              </li>
                              <li>
                                  <a class="dropdown-item text-danger" href="/logout">
                                      <i class="ti ti-logout me-2 ti-sm"></i>
                                      <span class="align-middle">Log Out</span>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <!--/ User -->
                  </ul>
              </div>

              <!-- Search Small Screens -->
              <div class="navbar-search-wrapper search-input-wrapper d-none">
                  <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..."
                      aria-label="Search..." />
                  <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
              </div>
          </nav>

          <script>
              //realtime clock
              function updateDateTime() {
                  const clockElement = document.getElementById("real-time-clock");
                  const currentTime = new Date();

                  const daysOfWeek = [
                      "Minggu",
                      "Senin",
                      "Selasa",
                      "Rabu",
                      "Kamis",
                      "Jumat",
                      "Sabtu",
                  ];
                  const dayOfWeek = daysOfWeek[currentTime.getDay()];

                  const months = [
                      "Januari",
                      "Februari",
                      "Maret",
                      "April",
                      "Mei",
                      "Juni",
                      "Juli",
                      "Agustu",
                      "September",
                      "Oktober",
                      "November",
                      "Desember",
                  ];
                  const month = months[currentTime.getMonth()];

                  const day = currentTime.getDate();
                  const year = currentTime.getFullYear();

                  const hours = currentTime.getHours().toString().padStart(2, "0");
                  const minutes = currentTime.getMinutes().toString().padStart(2, "0");
                  const seconds = currentTime.getSeconds().toString().padStart(2, "0");

                  const dateTimeString =
                      `<i class="ti ti-calendar ti-md"></i> ${dayOfWeek}, ${day} ${month} ${year}  <i class="ti ti-clock ti-md"></i> ${hours}:${minutes}:${seconds} `;
                  clockElement.innerHTML = dateTimeString;
              }

              setInterval(updateDateTime, 1000);

              updateDateTime();
          </script>
