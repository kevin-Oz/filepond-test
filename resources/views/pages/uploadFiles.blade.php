

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

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>



    <div id="app">

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-header">Example Upload files</div>

                        <div class="card-body">
                            <upload-component token= "{{ csrf_token() }}"></upload-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="{{ asset('js/app.js') }}"></script>
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