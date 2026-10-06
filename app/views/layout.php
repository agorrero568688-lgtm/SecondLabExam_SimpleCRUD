<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Healthcare Patient Record System</title>
<style>
*{box-sizing:border-box}
body
{
    font-family:system-ui,sans-serif;
    margin:0;
    background:#f1f5f9;
    color:#0f172a
}

header
{
    background:#0f766e;
    color:#fff;
    padding:14px 24px
}

header a
{
    color:#fff;
    text-decoration:none;
    font-weight:600;
    font-size:1.15rem
}

main
{
    max-width:1000px;
    margin:24px auto;
    padding:0 16px
}

.card
{
    background:#fff;
    border-radius:10px;
    padding:20px;
    box-shadow:0 1px 3px #0002
}

table
{
    width:100%;
    border-collapse:collapse
}

th,td
{
    padding:10px;
    text-align:left;
    border-bottom:1px solid #e2e8f0
}

th
{
    background:#f8fafc;
    font-size:.85rem
}

.btn
{
    display:inline-block;
    padding:7px 13px;
    border:0;
    border-radius:6px;
    background:#0f766e;
    color:#fff;
    text-decoration:none;
    cursor:pointer;
    font-size:.9rem
}

.btn.blue
{
    background:#2563eb
}

.btn.red
{
    background:#dc2626
}

.btn.gray
{
    background:#64748b
}

.top
{
    display:flex;
    justify-content:space-between;
    gap:10px;
    margin-bottom:14px;
    flex-wrap:wrap
}

input,select,textarea
{
    width:100%;
    padding:8px;
    border:1px solid #cbd5e1;
    border-radius:6px;
    font:inherit
}

.grid
{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:14px}label{font-size:.85rem;
    font-weight:600
}

.flash
{
    background:#dcfce7;
    color:#166534;
    padding:10px 14px;
    border-radius:6px;
    margin-bottom:14px
}

.err
{
    background:#fee2e2;
    color:#991b1b;
    padding:10px 14px;
    border-radius:6px;
    margin-bottom:14px
}

form.inline
{
    display:inline
}
    
dl
{
    display:grid;
    grid-template-columns:160px 1fr;
    gap:8px
}

dt
{
    font-weight:600;color:#475569
}
</style>
</head>
<body>
<header>
    <a href="index.php">Healthcare Patient Record System</a>
</header>
<main>
<?php if (!empty($_SESSION['flash'])): ?><div class="flash"><?= h($_SESSION['flash']) ?></div><?php unset($_SESSION['flash']); endif; ?>
<?= $content ?>
</main>
</body>
</html>
