<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();

    require_once __DIR__ . '/db.inc.php';
    connect_db($db);

    $username = isset($_SESSION['login_user']) ? trim($_SESSION['login_user']) : '';
    $isLoggedIn = false;

    if (!empty($username)) {
        $username = mysqli_real_escape_string($db, $username);
        
        $sqlstr = "SELECT u.username FROM users u WHERE u.username = '$username' LIMIT 1";
        $hasil = mysqli_query($db, $sqlstr);
        
        if ($hasil && mysqli_num_rows($hasil) > 0) {
            $isLoggedIn = true;
        }
    }

    if ($isLoggedIn) {
        // Logged in - show CMS menu
        echo '<a href="#" onclick="event.preventDefault(); this.parentElement.classList.toggle(\'open\');">CMS</a>';
        echo '<ul class="dropNav">';
        echo '    <li><a href="CMS/userCMS.php">CMS User</a></li>';
        echo '    <li><a href="logs/logout.php">Logout</a></li>';
        echo '</ul>';
    } else {
        // Logged out - show login form
        echo '<a href="#" onclick="event.preventDefault(); this.parentElement.classList.toggle(\'open\');">Login</a>';
        echo '<ul class="dropNav-login">';
        echo '    <li style="padding: 10px 15px; background-color: #f9f9f9; border-radius: 4px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">';
        echo '        <form class="login-form" action="logs/login.php" method="post" style="display:flex;flex-direction:column;gap:8px;min-width:240px;">';
        echo '            <input type="text" name="username" placeholder="Username" required>';
        echo '            <input type="password" name="password" placeholder="Password" required>';
        echo '            <button type="submit" name="submit" style="background:var(--crimson);color:#fff;border:none;padding:8px 10px;border-radius:6px;cursor:pointer">Login</button>';
        echo '        </form>';
        echo '    </li>';
        echo '</ul>';
    }
?>
