<?php
session_start();
session_destroy();
echo "<script>alert('Anda telah keluar dari Halaman Web Administrator & Staff'); window.location = 'index.php'</script>";
?>
