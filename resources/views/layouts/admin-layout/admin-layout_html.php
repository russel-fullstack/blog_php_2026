<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogPHP <?= $pageTitle ?></title>
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="/resources/css/blog.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php include 'admin-header_html.php'; ?>
    <?= $pageContent ?>
    <?php include 'admin-footer_html.php' ?>
    <script src="/resources/js/script.js"></script>
</body>
</html>