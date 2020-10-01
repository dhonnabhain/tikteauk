<html>
<?php include(__DIR__ . '/../../components/header.php') ?>

<body>
    <main id="app">
        <l-public message="Rejoindre Tikteauk">
            <form action="/register" method="POST" class="space-y-6">
                <div>
                    <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">Prénom</label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="first_name" name="first_name" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
                <div>
                    <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Nom</label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="last_name" name="last_name" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium leading-5 text-gray-700">Nom d'utilisateur</label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="username" name="username" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email</label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="email" name="email" type="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-5 text-gray-700">Mot de passe</label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password" name="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">Confirmation mot de passe</label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div>
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">C'est parti</button>
                    </span>
                </div>
            </form>
        </l-public>
    </main>

    <script src="js/app.js"></script>
</body>

</html>