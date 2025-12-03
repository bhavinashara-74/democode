<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CI3 Sample Project</title>
</head>
<body>
    <h1>Welcome to CodeIgniter 3 Sample Project</h1>
    <p>Routes available:</p>
    <ul>
        <li><a href="<?php echo site_url('thirdparty/github_user/octocat'); ?>">/thirdparty/github_user/{username}</a></li>
        <li>/thirdparty/weather/{city}</li>
        <li>POST /thirdparty/mock_charge (amount, currency, card[last4])</li>
    </ul>
    <p>This project contains sample integrations with third-party APIs for tooling checks (structure, deprecations, standards).</p>
</body>
</html>
