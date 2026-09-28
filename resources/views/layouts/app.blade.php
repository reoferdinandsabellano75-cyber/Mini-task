<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Personal Task Manager')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 antialiased min-h-screen flex flex-col">

    <nav class="bg-indigo-600 text-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/tasks" class="text-xl font-bold tracking-wide">
                Task Manager
            </a>
            <a href="/tasks/create" class="bg-indigo-700 hover:bg-indigo-800 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                + Add Task
            </a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-8 flex-grow w-full">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-white border-t mt-auto py-4 text-center text-sm text-gray-500">
        WST21-PM-2026-SF | Personal Task Manager
    </footer>

</body>
</html>