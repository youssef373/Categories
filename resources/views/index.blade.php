<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cascaded Category</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>


<header class="text-center p-4 bg-dark text-white" style="font-size: 40px;">Dependent Select Box In Laravel</header>
<div class="container mt-4">
    <div class="row">

        <div class="col-md-4">
            <h3>Category<span class="gcolor"></span> </h3>
            <div class="form-s2">
                <div>
                    <select id="sub_category_name" class="form-control  required" placeholder="Select Category"
                           name="category">
                        <option value="0" disabled selected>Select
                            Main Category*</option>
                        @foreach($data as $categories)
                            <option value="{{ $categories->id }}">
                                {{ ucfirst($categories->name) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <h3>Sub Category*</h3>
            <select class="form-control forms elect required" placeholder="Select Sub Category" id="sub_category">

            </select>
        </div>

        <div class="col-md-4">
            <h3>Sub sub Category*</h3>
            <select class="form-control forms elect required" placeholder="Select Sub sub Category" id="sub_sub_category">

            </select>
        </div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $("document").ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#sub_category_name').on('change', function () {
            let id = $(this).val();
            $('#sub_sub_category').empty();
            $('#sub_sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
            $.ajax({
                type: 'GET',
                url: 'sub_category/' + id,
                success: function (response) {
                    var response = JSON.parse(response);

                    $('#sub_category').empty();
                    $('#sub_category').append(`<option value="0" disabled selected>Select Sub Category*</option>`);
                    response.forEach(element => {
                        $('#sub_category').append(`<option value="${element['id']}">${element['name']}</option>`);
                    });
                }
            });
        });
        $('#sub_category').on('change', function () {
            let id = $(this).val();
            $('#sub_sub_category').empty();
            $('#sub_sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
            $.ajax({
                type: 'GET',
                url: 'sub_of_sub_category/' + id,
                success: function (response) {
                    var response = JSON.parse(response);
                    console.log(response);
                    $('#sub_sub_category').empty();
                    $('#sub_sub_category').append(`<option value="0" disabled selected>Select Sub Sub Category*</option>`);
                    response.forEach(element => {
                        $('#sub_sub_category').append(`<option value="${element['id']}">${element['name']}</option>`);
                    });
                }
            });
        });
    });
</script>
</body>

</html>
