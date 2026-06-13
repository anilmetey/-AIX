<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
  <defs>
    <linearGradient id="logo-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#2dd4bf" />
      <stop offset="50%" stop-color="#06b6d4" />
      <stop offset="100%" stop-color="#3b82f6" />
    </linearGradient>
    <style>
      .logo-pulse { animation: logo-pulse-anim 2s ease-in-out infinite alternate; }
      .logo-spin-slow { animation: logo-spin-anim 10s linear infinite; transform-origin: center; }
      @keyframes logo-spin-anim { 100% { transform: rotate(360deg); } }
      @keyframes logo-pulse-anim { 0% { transform: scale(1); opacity: 0.8; } 100% { transform: scale(1.3); opacity: 1; filter: drop-shadow(0 0 8px rgba(34,211,238,0.8)); } }
    </style>
  </defs>
  <g class="logo-spin-slow">
    <path stroke="url(#logo-gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="8 4" d="M12 2a10 10 0 100 20 10 10 0 000-20z"/>
  </g>
  <path stroke="url(#logo-gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 6v12M8 10l8 4M8 14l8-4"/>
  <circle class="logo-pulse" cx="12" cy="12" r="2.5" fill="#fff" stroke="none" style="transform-origin: center;"/>
</svg>
