<?php
/**
 * Colleges List Widget
 * 
 * Usage:  <div data-component="colleges"></div>
 * 
 * Displays a list of colleges with their total student count.
 * In production, this data would come from the database.
 */

// Static sample data (replace with DB query later)
$colleges = [
  ['name' => 'College of Technologies', 'abbr' => 'COT', 'students' => 30, 'color' => '#ff7d04ff'],
  ['name' => 'College of Arts & Sciences', 'abbr' => 'CAS', 'students' => 10, 'color' => '#10b981'],
  ['name' => 'College of Nursing', 'abbr' => 'CON', 'students' => 65, 'color' => '#ec57eeff'],
  ['name' => 'College of Business', 'abbr' => 'COB', 'students' => 50, 'color' => '#fac800ff'],
  ['name' => 'College of Education', 'abbr' => 'COE', 'students' => 35, 'color' => '#1c5adf'],
  ['name' => 'College of Public Administrarion and Governance', 'abbr' => 'CPAG', 'students' => 35, 'color' => '#23c7c7ff'],
];

$maxStudents = max(array_column($colleges, 'students'));
?>

<div class="colleges-card">
  <div class="widget-header">
    <h3>Colleges</h3>
    <span class="colleges-total"><?= array_sum(array_column($colleges, 'students')) ?> total</span>
  </div>
  <ul class="colleges-items" id="colleges-list">
    <?php foreach ($colleges as $college): ?>
      <?php $pct = round(($college['students'] / $maxStudents) * 100); ?>
      <li class="college-item">

        <div class="college-info">
          <span class="college-badge" style="background:<?= $college['color'] ?>1a; color:<?= $college['color'] ?>">
            <?= $college['abbr'] ?>
          </span>
          <span class="college-name"><?= htmlspecialchars($college['name']) ?></span>
        </div>

        <div class="college-stats">
          <div class="college-bar-track">
            <div class="college-bar-fill" style="width:<?= $pct ?>%; background:<?= $college['color'] ?>"></div>
          </div>
          <span class="college-count"><?= $college['students'] ?></span>
        </div>

      </li>
    <?php endforeach; ?>
  </ul>
</div>