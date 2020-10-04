<html>
<?php include(__DIR__ . '/../components/header.php') ?>

<body class="bg-gray-300">
  <main id="app" class="">
    <l-private :user="<?= $params['user'] ?>">
      <div class="grid grid-row-2 xl:grid-rows-1 xl:grid-cols-3 gap-4">
        <div class="bg-white overflow-hidden shadow rounded-lg xl:col-span-2">
          <div class="border-b border-gray-200 px-4 py-3 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
              Informations du compte
            </h3>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <?php if (isset($params['category']) && $params['category'] === 'general') {
              include(__DIR__ . '/../components/account/accountMessage.php');
            } ?>

            <form action="/account/general" method="POST" class="space-y-6">
              <div>
                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">Prénom</label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input id="first_name" name="first_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
              </div>
              <div>
                <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Nom</label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input id="last_name" name="last_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
              </div>
              <div>
                <label for="username" class="block text-sm font-medium leading-5 text-gray-700">Nom d'utilisateur</label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input id="username" name="username" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
              </div>

              <div>
                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email</label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input id="email" name="email" type="email" ƒ class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
              </div>

              <span class="inline-flex rounded-md shadow-sm">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                  Sauvegarder
                </button>
              </span>
            </form>
          </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg self-start">
          <div class="border-b border-gray-200 px-4 py-3 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
              Mot de passe
            </h3>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <?php if (isset($params['category']) && $params['category'] === 'password') {
              include(__DIR__ . '/../components/account/accountMessage.php');
            } ?>

            <form action="/account/password" method="POST" class="space-y-6">
              <div>
                <label for="password_current" class="block text-sm font-medium leading-5 text-gray-700">Mot de passe</label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input id="password_current" name="password_current" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
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

              <span class="inline-flex rounded-md shadow-sm">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                  Sauvegarder
                </button>
              </span>
            </form>
          </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg xl:col-span-3">
          <div class="border-b border-gray-200 px-4 py-3 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
              Biographie
            </h3>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <?php if (isset($params['category']) && $params['category'] === 'bio') {
              include(__DIR__ . '/../components/account/accountMessage.php');
            } ?>

            <form action="/account/bio" method="POST" class="space-y-6">
              <textarea id="bio" name="bio" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>

              <span class="inline-flex rounded-md shadow-sm">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                  Sauvegarder
                </button>
              </span>
            </form>
          </div>
        </div>
      </div>
    </l-private>
  </main>

  <script src="js/app.js"></script>
</body>

</html>