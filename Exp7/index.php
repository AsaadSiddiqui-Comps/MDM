<?php

session_start();

// STEP 1: Count visits using SESSION
if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 0;
}
$_SESSION['visits']++;

// STEP 2: Save theme using COOKIE
if (isset($_POST['theme'])) {
    setcookie("theme", $_POST['theme'], time() + (30 * 24 * 60 * 60), "/");
    $_COOKIE['theme'] = $_POST['theme'];
}

$theme   = $_COOKIE['theme'] ?? "light"; 
$visits  = $_SESSION['visits'];
$isDark  = $theme === "dark";

// Theme colors
$bg      = $isDark ? "#1a1a2e"  : "#f0f4ff";
$card    = $isDark ? "#16213e"  : "#ffffff";
$text    = $isDark ? "#e2e8f0"  : "#1e293b";
$muted   = $isDark ? "#94a3b8"  : "#64748b";
$accent  = $isDark ? "#7c3aed"  : "#4f46e5";
$border  = $isDark ? "#2d3748"  : "#e2e8f0";
$badge   = $isDark ? "#0f3460"  : "#ede9fe";
$badgeTx = $isDark ? "#a78bfa"  : "#4f46e5";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Visit & Theme Tracker</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      background: <?= $bg ?>;
      color: <?= $text ?>;
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.3s;
    }

    .card {
      background: <?= $card ?>;
      border: 1px solid <?= $border ?>;
      border-radius: 20px;
      padding: 48px 40px;
      width: 100%;
      max-width: 420px;
      text-align: center;
      box-shadow: 0 8px 40px rgba(0,0,0,0.12);
    }

    .icon { font-size: 52px; margin-bottom: 16px; }

    h1 {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 8px;
    }

    .subtitle {
      color: <?= $muted ?>;
      font-size: 0.9rem;
      margin-bottom: 32px;
      line-height: 1.6;
    }

    /* Visit counter badge */
    .visit-box {
      background: <?= $badge ?>;
      border-radius: 14px;
      padding: 20px;
      margin-bottom: 28px;
    }
    .visit-label {
      font-size: 0.8rem;
      font-weight: 600;
      letter-spacing: 1px;
      color: <?= $badgeTx ?>;
      text-transform: uppercase;
      margin-bottom: 8px;
    }
    .visit-number {
      font-size: 3rem;
      font-weight: 800;
      color: <?= $accent ?>;
      line-height: 1;
    }
    .visit-note {
      font-size: 0.78rem;
      color: <?= $muted ?>;
      margin-top: 6px;
    }

    /* Divider */
    .divider {
      border: none;
      border-top: 1px solid <?= $border ?>;
      margin: 28px 0;
    }

    /* Theme toggle */
    .theme-label {
      font-size: 0.85rem;
      color: <?= $muted ?>;
      margin-bottom: 14px;
    }

    .theme-buttons {
      display: flex;
      gap: 12px;
      justify-content: center;
    }

    .theme-btn {
      flex: 1;
      padding: 12px;
      border-radius: 12px;
      border: 2px solid <?= $border ?>;
      background: transparent;
      color: <?= $muted ?>;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s;
    }
    .theme-btn.active {
      border-color: <?= $accent ?>;
      color: <?= $accent ?>;
      background: <?= $badge ?>;
    }
    .theme-btn:hover { border-color: <?= $accent ?>; }

    /* Info section */
    .info {
      margin-top: 28px;
      text-align: left;
      background: <?= $isDark ? '#0f172a' : '#f8faff' ?>;
      border-radius: 12px;
      padding: 16px 18px;
      font-size: 0.82rem;
      color: <?= $muted ?>;
      line-height: 1.9;
    }
    .info code {
      background: <?= $isDark ? '#1e293b' : '#e2e8f0' ?>;
      color: <?= $isDark ? '#a78bfa' : '#4f46e5' ?>;
      padding: 2px 7px;
      border-radius: 5px;
      font-size: 0.8rem;
    }
    strong { color: <?= $text ?>; }
  </style>
</head>
<body>
<div class="card">

  <div class="icon"><?= $isDark ? '🌙' : '☀️' ?></div>
  <h1>Visit & Theme Tracker</h1>
  <p class="subtitle">Uses <strong>SESSION</strong> to count your visits<br>and <strong>COOKIE</strong> to remember your theme.</p>

  <!-- SESSION-->
  <div class="visit-box">
    <div class="visit-label"> Session Visits</div>
    <div class="visit-number"><?= $visits ?></div>
    <div class="visit-note">Refreshing this page increases the count.<br>Closing the browser will reset it to 0.</div>
  </div>

  <hr class="divider">

  <!-- COOKIE -->
  <div class="theme-label"> Theme Preference (saved in cookie for 30 days)</div>
  <div class="theme-buttons">
    <form method="POST">
      <button name="theme" value="light"
        class="theme-btn <?= !$isDark ? 'active' : '' ?>">
        ☀️ Light
      </button>
    </form>
    <form method="POST">
      <button name="theme" value="dark"
        class="theme-btn <?= $isDark ? 'active' : '' ?>">
        🌙 Dark
      </button>
    </form>
  </div>

  <!-- Think About it hehe -->
  <div class="info">
    <strong>What's happening:</strong><br>
    Visit count stored in <code>$_SESSION['visits']</code><br>
    Theme stored in <code>$_COOKIE['theme']</code><br>
    Cookie expires: <code><?= date('d M Y', time() + 30*24*60*60) ?></code><br>
    Session ID: <code><?= substr(session_id(), 0, 16) ?>...</code>
  </div>

</div>
</body>
</html>
