<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul }}</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('/bootstrap-5.3.3/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Flatpickr CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <x-navbar/>

{{ $slot }}

<!-- Bootstrap JS Bundle (popper.js included) -->
<script src="{{ asset('/bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}"></script>
<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(".flatpickr", {
            dateFormat: "Y-m-d",
            allowInput: true
        });
    });
</script>
</body>

</html>