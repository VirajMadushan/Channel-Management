{{-- resources/views/public/components/sidebar.blade.php --}}
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li class="menu-title">HOTEL ADMIN</li>

            {{-- Dashboard --}}
            <li class="{{ request()->routeIs('home') ? 'mm-active' : '' }}">
                <a href="{{ route('home') }}" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect x="3" y="3" width="8" height="8" rx="1.5" fill="var(--primary)" />
                            <rect x="13" y="3" width="8" height="8" rx="1.5" fill="var(--primary)"
                                opacity="0.4" />
                            <rect x="3" y="13" width="8" height="8" rx="1.5" fill="var(--primary)"
                                opacity="0.4" />
                            <rect x="13" y="13" width="8" height="8" rx="1.5" fill="var(--primary)"
                                opacity="0.4" />
                        </svg>
                    </div>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            {{-- Properties --}}
            <li class="{{ request()->routeIs('properties', 'add_property') ? 'mm-active' : '' }}">
                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M3 9.5L12 3l9 6.5V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5z" fill="#90959F" />
                            <rect x="9" y="13" width="6" height="8" rx="1" fill="white"
                                opacity="0.6" />
                        </svg>
                    </div>
                    <span class="nav-text">Properties</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{ request()->routeIs('properties') ? 'mm-active' : '' }}">
                        <a href="{{ route('properties') }}">All Properties</a>
                    </li>
                    <li class="{{ request()->routeIs('add_property') ? 'mm-active' : '' }}">
                        <a href="{{ route('add_property') }}">Add Property</a>
                    </li>
                </ul>
            </li>

            {{-- Rooms --}}
            <li class="{{ request()->routeIs('rooms', 'add_room') ? 'mm-active' : '' }}">
                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect x="2" y="8" width="20" height="13" rx="2" fill="#90959F" />
                            <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2" stroke="#90959F" stroke-width="1.5" />
                            <rect x="6" y="12" width="5" height="4" rx="1" fill="white"
                                opacity="0.6" />
                            <rect x="13" y="12" width="5" height="4" rx="1" fill="white"
                                opacity="0.6" />
                        </svg>
                    </div>
                    <span class="nav-text">Rooms</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{ request()->routeIs('rooms') ? 'mm-active' : '' }}">
                        <a href="{{ route('rooms') }}">All Rooms</a>
                    </li>
                    <li class="{{ request()->routeIs('add_room') ? 'mm-active' : '' }}">
                        <a href="{{ route('add_room') }}">Add Room</a>
                    </li>
                </ul>
            </li>

            {{-- Channels (OTAs) --}}
            <li class="{{ request()->routeIs('channels', 'connect_channel') ? 'mm-active' : '' }}">
                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="9" stroke="#90959F" stroke-width="1.5"
                                fill="none" />
                            <path d="M2 12h20M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18" stroke="#90959F"
                                stroke-width="1.5" fill="none" />
                        </svg>
                    </div>
                    <span class="nav-text">Channels (OTAs)</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{ request()->routeIs('channels') ? 'mm-active' : '' }}">
                        <a href="{{ route('channels') }}">Connected Channels</a>
                    </li>
                    <li class="{{ request()->routeIs('connect_channel') ? 'mm-active' : '' }}">
                        <a href="{{ route('connect_channel') }}">Connect Channel</a>
                    </li>
                </ul>
            </li>

            {{-- Rates & Availability --}}
            <li class="{{ request()->routeIs('rates') ? 'mm-active' : '' }}">
                <a href="{{ route('rates') }}" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect x="3" y="4" width="18" height="17" rx="2" fill="#90959F" />
                            <line x1="3" y1="9" x2="21" y2="9" stroke="white"
                                stroke-width="1.5" />
                            <line x1="8" y1="2" x2="8" y2="6" stroke="#90959F"
                                stroke-width="2" stroke-linecap="round" />
                            <line x1="16" y1="2" x2="16" y2="6" stroke="#90959F"
                                stroke-width="2" stroke-linecap="round" />
                            <rect x="7" y="13" width="3" height="3" rx="0.5" fill="white"
                                opacity="0.7" />
                            <rect x="12" y="13" width="3" height="3" rx="0.5" fill="white"
                                opacity="0.7" />
                        </svg>
                    </div>
                    <span class="nav-text">Rates &amp; Availability</span>
                </a>
            </li>

            {{-- Reservations --}}
            <li class="{{ request()->routeIs('reservations') ? 'mm-active' : '' }}">
                <a href="{{ route('reservations') }}" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"
                                fill="#90959F" />
                            <rect x="9" y="3" width="6" height="4" rx="1" fill="#90959F"
                                opacity="0.6" />
                            <line x1="9" y1="12" x2="15" y2="12" stroke="white"
                                stroke-width="1.5" stroke-linecap="round" />
                            <line x1="9" y1="16" x2="13" y2="16" stroke="white"
                                stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </div>
                    <span class="nav-text">Reservations</span>
                </a>
            </li>

            {{-- Booking --}}
            <li class="{{ request()->routeIs('booking') ? 'mm-active' : '' }}">
                <a href="{{ route('booking') }}" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect x="3" y="3" width="18" height="18" rx="2" fill="#90959F"
                                opacity="0.15" />
                            <polyline points="7,17 10,13 13,15 17,9" stroke="#90959F" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" fill="none" />
                            <circle cx="17" cy="9" r="1.5" fill="#90959F" />
                        </svg>
                    </div>
                    <span class="nav-text">Booking</span>
                </a>
            </li>

            {{-- Reports --}}
            <li class="{{ request()->routeIs('reports') ? 'mm-active' : '' }}">
                <a href="{{ route('reports') }}" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect x="3" y="3" width="18" height="18" rx="2" fill="#90959F"
                                opacity="0.15" />
                            <polyline points="7,17 10,13 13,15 17,9" stroke="#90959F" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" fill="none" />
                            <circle cx="17" cy="9" r="1.5" fill="#90959F" />
                        </svg>
                    </div>
                    <span class="nav-text">Reports</span>
                </a>
            </li>

            {{-- Settings --}}
            <li class="{{ request()->routeIs('settings') ? 'mm-active' : '' }}">
                <a href="{{ route('settings') }}" aria-expanded="false">
                    <div class="menu-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="3" fill="#90959F" />
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"
                                stroke="#90959F" stroke-width="1.5" fill="none" />
                        </svg>
                    </div>
                    <span class="nav-text">Settings</span>
                </a>
            </li>

        </ul>

        <div class="copyright">
            <p>Hotel Admin &copy; {{ date('Y') }} All Rights Reserved</p>
        </div>
    </div>
</div>
