@extends('layout/template')

@section('title','Inbox Request')
@section('border', 'border-bottom')
            
@section('logo', '#3DA43A')
@section('cart', 'black')
@section('profile', 'black')
@section('login', 'text-black')
@section('register', 'text-black')
@section('navHome', 'text-black')
@section('navTour', 'text-black')
@section('navReq', 'text-black')
@section('navGuide', 'text-black')
@section('navAbout', 'text-black')

@section('content')

<div class="d-flex justify-content-center my-5">
    <div style="width: 80%">
        <h3 style="color: #3DA43A; font-family: 'Comfortaa'; " class="mb-4">Inbox Request</h3>

        <div class="mb-3 mt-4 d-flex flex-row justify-content-between border-top border-bottom">
            <button  class="w-100 border-0 text-start bg-transparent py-2 d-flex justify-content-between flex-row" id="filter-btn" data-bs-toggle="collapse"  data-bs-target="#filter"  >
                <div class="left">Filter</div>
                <i class="bi bi-chevron-down rotate" ></i>
            </button>
        </div>

        <form class="collapse" id="filter" action="/inbox/{{Auth::user()->id}}/filter" method="POST" >
            @csrf
            <div class="d-flex flex-row mb-3">
                <div class=" me-4 col form-floating">
                    <select {{$disabled}} class="form-select form-control" name="status">
                        <option selected value="all">All</option>
                        @foreach($status as $s)
                            @php
                                $selected = "";
                            @endphp
                            @if ($s->id == $selectedStatus)
                                @php
                                    $selected = "selected";
                                @endphp
                            @endif
                            <option value="{{$s->id}}" {{$selected}}>{{$s->status_name}}</option>
                        @endforeach
                    </select>
                    <label>Status</label>
                </div>

                <div class=" me-4 col form-floating">
                    
                    <select {{$disabled}} class="form-select form-control" name="send">
                        @if ($selectedSend == "desc")
                            @php
                                $selectedNew = "selected";
                                $selectedOld = "";
                            @endphp
                        @else   
                            @php
                                $selectedNew = "";
                                $selectedOld = "selected";
                            @endphp
                        @endif
                        <option {{$selectedNew}} value="desc">Newest</option>
                        <option {{$selectedOld}} value="asc">Oldest</option>
                    </select>
                    <label>Sent Date</label>
                </div>

                <div class="col form-floating">
                    @if(Auth::user()->is_admin == true)
                        <input {{$disabled}} type="text" class="form-control" name="email" value="{{$email}}" placeholder="Search sender...">
                        <label>Sender</label>
                    @else
                     
                        <select {{$disabled}} class="form-select form-control" name="destination">
                            <option selected value="all">All</option>
                            @foreach($province as $d)
                                @php
                                    $selected = ""
                                @endphp
                                @if ($d->id == $selectedDestination)
                                    @php
                                        $selected = "selected"
                                    @endphp
                                @endif
                                <option value="{{$d->id}}" {{$selected}}>{{$d->province_name}}</option>
                            @endforeach
                        </select>
                        <label>Destination</label>
                    @endif
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button {{$disabled}} name="search" class="btn form-control text-white" style="width: 100px; background-color: #3DA43A;" type="submit">Search</button>
            </div>
        </form>
        
        <table class="table mt-4">
            <tr style="background-color: #EFF5EE; color: #1C651A;">
                @if(Auth::user()->is_admin == true)
                    <td>Sender</td>
                    <td>Sent date</td>
                    <td>Status</td>
                    <td>Updated at</td>
                    <td>Action</td>
                @else
                    <td>Request Destination</td>
                    <td>Sent date</td>
                    <td>Status</td>
                    <td>Updated at</td>
                    <td>Note</td>
                @endif
            </tr>

            @if(count($inbox) > 0)

                @foreach ($inbox as $i)
                <tr>
                    @if(Auth::user()->is_admin == true)
                        <td>{{$i->user->email}}</td>
                    @else 
                        <td>{{$i->province->province_name}}</td>
                    @endif

                    <td>{{$i->request_date}}</td>

                    @if($i->status_id == 2)
                        @php
                            $color = "green";
                        @endphp
                    @elseif($i->status_id == 3)
                        @php
                            $color = "red";
                        @endphp
                    @else
                        @php
                            $color = "";
                        @endphp
                    @endif
                
                    <td style="color: {{$color}}">{{$i->status->status_name}}</td>
                    <td>
                        @if (!$i->approval_time)
                            -
                        @else
                            {{$i->approval_time}}
                        @endif
                    </td>
                    @if(Auth::user()->is_admin == false)
                        <td>
                        @if (!$i->note)
                            -
                        @else
                            {{$i->note}}
                        @endif
                        </td>
                    @else 
                    <td>
                        <a class="btn p-0 me-2 bg-transparent border-0 bi bi-eye"></a>
                        <button class="btn p-0 me-2 bg-transparent border-0 bi bi-check-lg" data-bs-toggle="modal" data-bs-target="#modal{{$i->id}}"></button>
                        <a class="btn p-0 m-0 bg-transparent border-0 bi bi-bag-plus"></a>
                    </td>
                    @endif 
                </tr>

                <div class="modal fade modal" id="modal{{$i->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                    <div class="modal-dialog modal-dialog-scrollable ">
                        <div class="modal-content">
                            <form  action="/inbox/{{Auth::user()->id}}/filter" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Approval</h1>
                                </div>

                                <div class="mt-3 mx-3" >
                                    <div class="form-floating w-100">
                                        <textarea {{$i->status->id == 2 || $i->status->id == 3  ? "disabled" : ""}} class="form-control mb-3 note" id="note" style="height: 100px"  placeholder="Note" name="note"></textarea>
                                        <label for="additional">Note</label>
                                    </div>
                                    <div class="form-floating w-100">
                                        <select {{$i->status->id == 2 || $i->status->id == 3  ? "disabled" : ""}}  class="form-select form-control mb-3 text-black status" id="statusUp" placeholder="status" name="statusUp">
                                        @foreach($status as $s)
                                                <option class="text-black" {{$i->status->id == $s->id ? "selected" : ""}} value="{{$s->id}}">{{$s->status_name}}</option>
                                        @endforeach
                                        </select>
                                        
                                        <label for="additional">Status</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-white bg-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="inboxId" class="btn text-white update" value="{{$i->id}}" style="background-color: #3DA43A; {{$i->status->id == 2 || $i->status->id == 3  ? 'display: none' : ''}}">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @endforeach
            @else
                <tr>
                    <td colspan="5">There's nothing here</td>
                </tr>
            @endif
        </table>
    </div>
</div>
@endsection

