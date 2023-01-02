@extends('layout/template')

@section('title','Inbox Request')

@section('content')

<div class="d-flex justify-content-center my-5">
    <div style="width: 80%">
        <h3 style="color: #3DA43A; font-family: 'Comfortaa'; ">Inbox Request</h3>

        <div class="d-flex flex-row justify-content-between my-4">
            <select class="form-select me-4 w-25" aria-label="Default select example">
                <option selected>Status</option>
                <option value="1">All</option>
                <option value="2">Waiting for approval</option>
                <option value="3">Approved</option>
                <option value="4">Rejected</option>
            </select>
            <input type="text" class="form-control" placeholder="Search sender...." aria-label="Username">
        </div>

        <table class="table">
            <tr style="background-color: #EFF5EE; color: #1C651A;">
                <td style="width: 30%;">Sender</td>
                <td style="width: 20%">Sent date</td>
                <td style="width: 25%">Status</td>
                <td >Updated at</td>
            </tr>
                <td>nathalie@gmail.com</td>
                <td>31/12/2022</td>
                <td class="text-success">Approved</td>
                <td>31/12/2022 20:00:01</td>
            <tr>
            </tr>
                <td>nathalie@gmail.com</td>
                <td>31/12/2022</td>
                <td class="text-danger">Rejected</td>
                <td>31/12/2022 20:00:01</td>
            <tr>
            </tr>
                <td>nathalie@gmail.com</td>
                <td>31/12/2022</td>
                <td>Waiting for approval</td>
                <td>31/12/2022 20:00:01</td>
            <tr>
        </table>
    </div>
</div>


@endsection

