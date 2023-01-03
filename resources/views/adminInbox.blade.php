@extends('layout/template')

@section('title','Inbox Request')

@section('content')

<div class="d-flex justify-content-center my-5">
    <div style="width: 80%">
        <h3 style="color: #3DA43A; font-family: 'Comfortaa'; ">Inbox Request</h3>

        <div class="d-flex flex-row my-4">
            <div class=" me-4 w-25">
                <label class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example">
                    <option value="1">All</option>
                    <option value="2">Waiting for approval</option>
                    <option value="3">Approved</option>
                    <option value="4">Rejected</option>
                </select>
            </div>

            <div class="w-75">
                <label class="form-label">Sender</label>
                <input type="text" class="form-control" placeholder="Search sender...." aria-label="Username">
            </div>
        </div>

        

        <table class="table">
            <tr style="background-color: #EFF5EE; color: #1C651A;">
                <td style="width: 30%;">Sender</td>
                <td style="width: 20%">Sent date</td>
                <td style="width: 25%">Status</td>
                <td >Updated at</td>
            </tr>

            <tr class="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <td>nathalie@gmail.com</td>
                <td>31/12/2022</td>
                <td class="text-success">Approved</td>
                <td>31/12/2022 20:00:01</td>
            </tr>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            asd
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                </div>
            </div>

            <tr>
                <td>nathalie@gmail.com</td>
                <td>31/12/2022</td>
                <td class="text-danger">Rejected</td>
                <td>31/12/2022 20:00:01</td>
            
            </tr>

            <tr>
                <td>nathalie@gmail.com</td>
                <td>31/12/2022</td>
                <td>Waiting for approval</td>
                <td>31/12/2022 20:00:01</td>
            </tr>

        </table>
    </div>
</div>


@endsection

