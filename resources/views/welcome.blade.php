<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kejanihub | Your Rental Companion</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #EEAECA;
background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
        }
        .glass {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 1rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>
<body class=" min-h-screen flex items-center justify-center">

    <div class="max-w-6xl w-full px-6 py-12 glass text-black">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold mb-2">🏠 Kejani hub</h1>
            <p class="text-lg text-black/80">Your trusted solution for rental and tenant management</p>
        </div>

        <div class="flex justify-center space-x-4 mb-8">
            @auth
                <a href="{{ url('/home') }}" class="bg-white text-red-600 font-semibold px-6 py-2 rounded-full hover:bg-red-100 transition">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="bg-white text-red-600 font-semibold px-6 py-2 rounded-full hover:bg-red-100 transition">Log In</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-white text-red-600 font-semibold px-6 py-2 rounded-full hover:bg-red-100 transition">Register</a>
                @endif
            @endauth
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-10">
            <div class="bg-white/10 p-6 rounded-xl text-center hover:scale-105 transition">
                <svg class="mx-auto mb-3 w-10 h-10 text-black" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 7l9-4 9 4-9 4-9-4z"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 17l9 4 9-4"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l9 4 9-4"/>
                </svg>
                <h3 class="text-xl font-semibold">Tenant Records</h3>
                <p class="text-sm text-black/80">Add, edit, and view tenant profiles with ease.</p>
            </div>

            <div class="bg-white/10 p-6 rounded-xl text-center hover:scale-105 transition">
                <svg class="mx-auto mb-3 w-10 h-10 text-black" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 8c-2.21 0-4 1.79-4 4a4 4 0 108-0c0-2.21-1.79-4-4-4z"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 2v2m0 16v2m10-10h-2M4 12H2"/>
                </svg>
                <h3 class="text-xl font-semibold">Payments</h3>
                <p class="text-sm text-black/80">Track monthly payments and generate receipts.</p>
            </div>

            <div class="bg-white/10 p-6 rounded-xl text-center hover:scale-105 transition">
                <svg class="mx-auto mb-3 w-10 h-10 text-black" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <h3 class="text-xl font-semibold">Units</h3>
                <p class="text-sm text-black/80">Manage units and track availability efficiently.</p>
            </div>

            <div class="bg-white/10 p-6 rounded-xl text-center hover:scale-105 transition">
                <svg class="mx-auto mb-3 w-10 h-10 text-black" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12h6m-6 4h6m-7 4h8a2 2 0 002-2v-2a2 2 0 00-2-2H5a2 2 0 00-2 2v2a2 2 0 002 2h1zm0-8h10M4 6h16"/>
                </svg>
                <h3 class="text-xl font-semibold">Reports</h3>
                <p class="text-sm text-black/80">Export financial or occupancy reports anytime.</p>
            </div>
        </div>

        <p class="mt-12 text-center text-black/70 text-sm">
            Kejahub &copy; {{ now()->year }} • Built with ❤️ by Wairimu
        </p>
    </div>

</body>
</html>
