@extends('layout/template')

@section('title','Add Destination')

@section('content')

<form class="d-flex flex-column justify-content-center align-items-center my-5" method="POST" action="" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
      <p class="text-danger">{{ $errors->first() }}</p>
    @endif
    <div style="width: 50%">
        <div style="text-align:center">
            <p style="font-family: Comfortaa; font-size:30px; color: #3DA43A;">Add Destination</p>
            <p>Please Provide the Following Information</p>
        </div>

        <div class="form-floating mb-3 w-100" >
            <select class="form-select form-control" id="floatingSelect" name="province_id">
                @foreach ($province as $prov )
                    <option value="{{ $prov->id }}">{{ $prov->province_name }}</option>
                @endforeach
            </select>
            <label for="floatingSelect">Choose Province Destination</label>
          </div>


        <table class="table w-100 border-0" id="addMore">
            <tr>
                <th style="width: 30%;" class="border-0">Add New Place</th>
                <th style="width: 30%;" class="border-0">Add Place Image</th>
                <th style="width: 20%" class="border-0"></th>
            </tr>
            <tr>
                <td class="border-0 m-0 ps-0"><input type="text" name="place_name[]" class="form-control" id="place" /></td>
                <td class="border-0 m-0 ps-0"><input type="file" name="place_image[]" class="form-control" id="place_image" /></td>
                <td class="border-0 m-0 pe-0"><button type="button" name="add" id="addMoreButton" class="btn btn-outline-primary w-100">Add More</button></td>

            </tr>
        </table>


        <button class="btn text-white mb-3 w-100" type="submit" style="background-color: #3DA43A;">Save</button>
    </div>
</form>


<script type="text/javascript">
    var i = 0;
    $("#addMoreButton").click(function() {
        ++i;
        $("#addMore").append('<tr><td class="border-0 m-0 ps-0"><input type="text" name="place_name[]" class="form-control" /></td><td class="border-0 m-0 ps-0"><input type="file" name="place_image[]" class="form-control" id="image" /></td><td class="border-0 m-0 pe-0"><button type="button" class="btn btn-outline-danger w-100 removeInput">Delete</button></td></tr>');
    });
    $(document).on('click', '.removeInput', function() {
        $(this).parents('tr').remove();
    });

</script>


@endsection
