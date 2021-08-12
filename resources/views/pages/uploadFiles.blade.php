

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>uploadFile</title>


    <link rel="stylesheet" href="{{ asset('assets/css/filepond.css') }}">
    <script src="{{ asset('assets/js/filepond.js') }}"></script>

    <style>
      
        .filepond--credits{
            display: none;
        }
    </style>
</head>
<body>
    

    <input type="file" id="file_" name="file_" />

    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="file_"]');
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            allowMultiple: true,
            server: {
                url: '/file',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'accept': 'application/json'
                },
            }
        });
    </script>


</body>
</html>