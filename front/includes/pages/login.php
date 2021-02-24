<?php
require_once('../commons/header.php');
?>

<!-- Put your code here my friend ;) -->


<div class="container-connexion">
    <h1>Connexion</h1>7
    <form action="" method="post">
        <svg width="128" height="128" viewBox="0 0 128 128" fill="white" xmlns="http://www.w3.org/2000/svg">
            <path d="M64 0C28.672 0 0 28.672 0 64C0 99.328 28.672 128 64 128C99.328 128 128 99.328 128 64C128 28.672 99.328 0 64 0ZM64 19.2C74.624 19.2 83.2 27.776 83.2 38.4C83.2 49.024 74.624 57.6 64 57.6C53.376 57.6 44.8 49.024 44.8 38.4C44.8 27.776 53.376 19.2 64 19.2ZM64 110.08C48 110.08 33.856 101.888 25.6 89.472C25.792 76.736 51.2 69.76 64 69.76C76.736 69.76 102.208 76.736 102.4 89.472C94.144 101.888 80 110.08 64 110.08Z" fill="white" />
        </svg>
        <div class="form-group">
            <input type="input" placeholder="Rechercher un article...">
            <label>Pseudo ou mail<label>
        </div>
        <div class="form-group">
            <input type="password" placeholder="Rechercher un article...">
            <label>Mot de passe<label>
        </div>
    </form>
</div>
<?php
require_once('../commons/footer.php');
?>