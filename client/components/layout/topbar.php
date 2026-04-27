<?php
/**
 * Topbar Component
 * 
 * Usage:  <div data-component="topbar" data-props='{"title":"Dashboard"}'></div>
 * 
 * Accepts:
 *   - title : The page heading displayed in the topbar
 */

$title = isset($_GET['title']) ? htmlspecialchars($_GET['title']) : 'Dashboard';
$description = isset($_GET['description']) ? htmlspecialchars($_GET['description']) : '';

function get_icon($filename)
{
  // Try sidebar folder first, then base icons folder
  $sidebar_path = __DIR__ . '/../../assets/icons/sidebar/' . $filename;
  $base_path = __DIR__ . '/../../assets/icons/' . $filename;

  $path = file_exists($sidebar_path) ? $sidebar_path : (file_exists($base_path) ? $base_path : '');

  if ($path === '')
    return '';

  $svg = file_get_contents($path);
  // Inject the icon class into the <svg> tag
  $svg = preg_replace('/<svg\b/', '<svg class="topbar-icon"', $svg, 1);
  // Strip the XML declaration
  $svg = preg_replace('/<\?xml[^?]*\?>/', '', $svg);
  return $svg;
}
?>

<header class="topbar" id="topbar">

  <!-- Hamburger toggle for mobile -->
  <button class="topbar-toggle" id="sidebar-toggle" aria-label="Toggle sidebar">
    <span></span>
    <span></span>
    <span></span>
  </button>

  <!-- Page title -->
  <div class="topbar-title-area">
    <h1 class="topbar-title">
      <?= $title ?>
    </h1>
    <p class="topbar-subtitle">
      <?= $description ?>
    </p>
  </div>

  <!-- Right-side actions -->
  <div class="topbar-actions">
    <!-- Search -->
    <div class="topbar-search">
      <input type="text" id="global-search" placeholder="Search…" autocomplete="off">
    </div>

    <!-- Notifications -->
    <button class="topbar-btn" id="notifications-btn" aria-label="Notifications">
      <?php echo get_icon('notification.svg'); ?>
      <span class="badge" id="notif-count">3</span>
    </button>

    <!-- User avatar -->
    <div class="topbar-user" id="user-menu">
      <span class="topbar-avatar"></span>
      <span class="topbar-username">Admin</span>
    </div>
  </div>

</header>