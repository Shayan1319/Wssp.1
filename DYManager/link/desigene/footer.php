<?php
$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<script>
    let message = '';
    message = '<?php echo $message; ?>';

    $(document).ready(function() {
        // $('[data-toggle=confirmation]').confirmation();

        if (message !== '') {
            showCustomMessage("Information!", message, "success");
        }
    });
</script>