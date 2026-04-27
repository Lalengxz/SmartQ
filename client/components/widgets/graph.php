<?php
/**
 * Line Graph Widget
 * 
 * Usage:  <div data-component="graph"></div>
 * 
 * Displays a student enrollment trend line graph.
 * Structure prevents layout overlap by:
 * - Separating header, graph, labels, and summary into distinct flex children
 * - Using min-height: 0 on flex containers to allow proper sizing
 * - Wrapping SVG in dedicated container for aspect ratio control
 */
?>

<div class="graph-card">
  <!-- Header: Title + Period Badge -->
  <div class="widget-header">
    <h3>Student Validation Trend</h3>
    <span class="graph-period">Last 7 months</span>
  </div>

  <!-- Graph Container: Takes remaining space -->
  <div class="graph-container">
    <!-- Canvas: SVG Chart -->
    <div class="graph-canvas" id="lineGraphCanvas">
      <svg viewBox="0 0 600 260" preserveAspectRatio="xMidYMid meet" class="line-chart-svg">
        <!-- Grid lines -->
        <line x1="0" y1="52" x2="600" y2="52" class="grid-line" />
        <line x1="0" y1="104" x2="600" y2="104" class="grid-line" />
        <line x1="0" y1="156" x2="600" y2="156" class="grid-line" />
        <line x1="0" y1="208" x2="600" y2="208" class="grid-line" />

        <!-- Area fill -->
        <path d="M0,208 L100,170 L200,140 L300,100 L400,120 L500,70 L600,40 L600,260 L0,260 Z" class="line-area" />

        <!-- Line stroke -->
        <polyline points="0,208 100,170 200,140 300,100 400,120 500,70 600,40" class="line-stroke" />

        <!-- Data points -->
        <circle cx="0" cy="208" r="5" class="line-dot" />
        <circle cx="100" cy="170" r="5" class="line-dot" />
        <circle cx="200" cy="140" r="5" class="line-dot" />
        <circle cx="300" cy="100" r="5" class="line-dot" />
        <circle cx="400" cy="120" r="5" class="line-dot" />
        <circle cx="500" cy="70" r="5" class="line-dot" />
        <circle cx="600" cy="40" r="5" class="line-dot" />
      </svg>
    </div>

    <!-- X-Axis Labels -->
    <div class="graph-x-labels">
      <span>Oct</span>
      <span>Nov</span>
      <span>Dec</span>
      <span>Jan</span>
      <span>Feb</span>
      <span>Mar</span>
      <span>Apr</span>
    </div>
  </div>

  <!-- Summary Stats -->
  <div class="graph-summary">
    <div class="graph-stat">
      <span class="graph-stat-value">+18%</span>
      <span class="graph-stat-label">vs last period</span>
    </div>
    <div class="graph-stat">
      <span class="graph-stat-value">250</span>
      <span class="graph-stat-label">Total students</span>
    </div>
  </div>
</div>