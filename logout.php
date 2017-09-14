<?php
session_start();
session_destroy();
echo "<script>alert('Anda telah Berhasil Logout '); window.location = 'index.php'</script>";
?>
