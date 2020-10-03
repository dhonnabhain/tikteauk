<html>
<?php include(__DIR__ . '/../components/header.php') ?>

<body class="bg-gray-300">
    <main id="app" class="">
        <l-private :user="<?= $params['user'] ?>">
            <p>Hello profil ?</p>
        </l-private>
    </main>

    <script src="js/app.js"></script>
</body>

</html>