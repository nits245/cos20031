<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Header" />
    <meta name="keywords" content="Header" />
    <meta name="author" content="nits" />
    <link href="styles/style.css" rel="stylesheet"/> 
</head>
<div class="header">
    <header>
        <div class="timeline-header">
            <div class="timeline-header_title">
                <h2>Diversity</h2>
            </div>
            <?php
            $current_page = basename($_SERVER['PHP_SELF']);
            if ($current_page != 'login.php') { ?>
            <nav class="timeline-header_nav">
                <a href="archer.php">Home</a>
                <a href="timeline.php">Timeline</a>
            </nav>
            <?php } ?>
        </div>
    </header>
</div>
