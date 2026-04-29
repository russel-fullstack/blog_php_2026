<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogPHP2026 -<?= $pageTitle ?></title>
    <link rel="stylesheet" href="/resources/css/footer.css">
    <link rel="stylesheet" href="/resources/css/blog.css">
    <link rel="stylesheet" href="/resources/css/forms.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <?php include 'blog-header_html.php'; ?>
    <main>
        <?= $pageContent ?>
    </main>
    <?php include 'blog-footer_html.php'; ?>
</body>

</html>