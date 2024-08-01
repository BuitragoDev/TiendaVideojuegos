<?php
    if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {
        $selectedCategories = [];
        $i = 1;
        foreach ($_POST['categoria'] as $value) {
          $selectedCategories[$i] = $value;
          $i++;
        }
      
        echo "Selected Categories: " . implode(', ', $selectedCategories);
    }
?>