<?php
$total_sql = "SELECT COUNT(*) FROM products";
$total_result = $conn->query($total_sql);
$total_rows = $total_result->fetch_row()[0];
$total_pages = ceil($total_rows / $results_per_page);

for ($page = 1; $page <= $total_pages; $page++) {
    echo '<li class="page-item ' . ($page == $current_page ? 'active' : '') . '">
            <a class="page-link" href="?page=' . $page . '">' . $page . '</a>
          </li>';
}
?>
  