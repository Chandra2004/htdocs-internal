<?php require __DIR__ . '/../partials/top-bottom/header.php'; ?>
<style>
    .error-container {
        height: 50vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        background-color: black;
    }

    h1 {
        color: white;
    }
    .error-container h1 {
        font-size: 10rem;
        font-weight: 700;
    }

    .error-container p {
        font-size: 1.5rem;
    }
</style>

<div class="error-container">
    <div>
        <h1>404</h1>
        <p class="p-4">Oops! The page you are looking for does not exist.</p>
        <a href="<?= BASE_URL ?>/" class="btn btn-primary">Go Back Home</a>
    </div>
</div>

<!-- Section List -->
<?php require  __DIR__ . '/../partials/section/car-list.php'; ?>

<?php require __DIR__ . '/../partials/top-bottom/footer.php'; ?>