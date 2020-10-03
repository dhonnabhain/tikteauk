<html>
<?php include(__DIR__ . '/../components/header.php') ?>

<body class="bg-gray-300">
    <main id="app" class="h-screen w-screen">
        <l-private :user="<?= $params['user'] ?>"></l-private>
    </main>

    <script src="js/app.js"></script>
</body>

</html>