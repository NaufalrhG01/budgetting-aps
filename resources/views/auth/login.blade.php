<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6" x-data="{ showPassword: false }">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Login</h2>

        @if ($errors->any())
            <div class="my-4 p-4 bg-red-100 text-red-700 rounded-lg">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <div class="relative">
                    <input :type="showPassword ? 'text' : 'password'" id="password" name="password" required
                        class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <button type="button" @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 px-3 text-gray-600 focus:outline-none">
                        <!-- Eye icons -->
                        <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12m0 0a3 3 0 11-6 0 3 3 0 016 0zm-3 9c-4.418 0-8-4.03-8-9s3.582-9 8-9 8 4.03 8 9-3.582 9-8 9z" />
                        </svg>
                        <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.418 0-8-4.03-8-9s3.582-9 8-9c1.03 0 2.02.18 2.938.525M15 12m0 0a3 3 0 11-6 0 3 3 0 016 0zm6.121 6.121l-4.242-4.242m0 0l-4.242-4.242m4.242 4.242l4.242-4.242" />
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Login
            </button>
        </form>
    </div>

    <!-- Floating Chat Toggle (WhatsApp + Tawk.to) -->
    <div class="fixed bottom-4 left-4" x-data="{ open: false }">
        <button @click="open = !open"
            class="bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-700 transition">
            Chat Admin
        </button>

        <div x-show="open" x-transition class="mt-2 space-y-2 bg-white rounded-lg shadow-xl p-3 w-56">
            <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20saya%20butuh%20bantuan" target="_blank"
                class="flex items-center px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 32 32">
                    <path
                        d="M16.001 3.2c-7.06 0-12.8 5.741-12.8 12.8 0 2.274.598 4.5 1.735 6.45L3.2 28.8l6.514-1.705a12.749 12.749 0 0 0 6.287 1.62h.001c7.06 0 12.8-5.741 12.8-12.8 0-3.417-1.331-6.632-3.747-9.049-2.417-2.417-5.632-3.748-9.049-3.748zm0 23.2a11.469 11.469 0 0 1-5.869-1.591l-.421-.248-3.866 1.012 1.033-3.768-.273-.433a11.505 11.505 0 1 1 9.396 5.028zm6.479-8.469c-.355-.178-2.102-1.038-2.429-1.157-.327-.12-.565-.178-.803.178s-.92 1.157-1.129 1.394c-.208.237-.417.267-.772.089-.355-.178-1.501-.553-2.86-1.764-1.056-.942-1.77-2.105-1.978-2.46-.208-.355-.022-.547.156-.725.16-.159.356-.414.534-.621.178-.208.237-.356.356-.593.119-.237.06-.445-.03-.623s-.802-1.938-1.099-2.652c-.29-.698-.586-.604-.803-.614l-.682-.012a1.311 1.311 0 0 0-.951.445c-.326.355-1.25 1.22-1.25 2.976s1.279 3.449 1.456 3.692c.178.237 2.516 3.839 6.099 5.384.853.368 1.517.587 2.037.751.855.273 1.63.235 2.243.143.684-.102 2.102-.859 2.399-1.688.296-.83.296-1.542.207-1.688-.089-.148-.326-.237-.681-.415z" />
                </svg>
                WhatsApp
            </a>

            <button onclick="Tawk_API.maximize();"
                class="w-full text-left flex items-center px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 8h2a2 2 0 0 1 2 2v8.5a1.5 1.5 0 0 1-1.5 1.5H5.5A1.5 1.5 0 0 1 4 18.5V10a2 2 0 0 1 2-2h2m6 0V6a2 2 0 1 0-4 0v2h4z" />
                </svg>
                Live Chat (Tawk.to)
            </button>
        </div>
    </div>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/688dbc7905ae931924ad8c13/1j1kqgenp';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

</body>
</html>
