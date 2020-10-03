<html>
<?php include(__DIR__ . '/../../components/header.php') ?>

<body>
    <main id="app">
        <l-public message="Se connecter">
            <?php if (isset($params['message'])) {
                include(__DIR__ . '/../../components/auth/register/alreadyExistsAlert.php');
            } ?>

            <form action="/login" method="POST" class="space-y-6">
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

                <div class="flex items-center justify-between">
                    <div class="text-sm leading-5">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Mot de passe oublié ?</a>
                    </div>
                </div>

                <div>
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">Se connecter</button>
                    </span>
                </div>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm leading-5">
                        <span class="px-2 bg-white text-gray-500">
                            Ou
                        </span>
                    </div>
                </div>

                <a href="/register" class="block mt-4 w-full text-center items-center px-6 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-50 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                    S'inscrire
                </a>
            </div>
        </l-public>
    </main>

    <script src="js/app.js"></script>
</body>

</html>