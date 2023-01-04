@extends('layout/template')

@section('title','Inbox Request')

@section('content')

<style>

/* .animate-icon {
  transition: 0.4s;
}
.rotate {
  transform:rotate(180deg);
} */
/* .rotate{
    -moz-transition: all 2s linear;
    -webkit-transition: all 2s linear;
    transition: all 2s linear;
}

.rotate.down{
    -ms-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
} */

</style>

<div class="d-flex justify-content-center my-5">
    <div style="width: 80%">
        <h3 style="color: #3DA43A; font-family: 'Comfortaa';">Inbox Request</h3>

        <div class="mb-3 mt-4 d-flex flex-row justify-content-between border-bottom border-top">
            <button  class="w-100 border-0 text-start bg-transparent py-2 d-flex justify-content-between flex-row" id="filter-btn" data-bs-toggle="collapse"  data-bs-target="#filter"  >
                <div class="left">Filter</div>
                <i class="bi bi-chevron-down rotate" ></i>
            </button>
        </div>

        <form class="collapse" id="filter" action="/inbox/1/filter" method="POST" >
            @csrf
            <div class="d-flex flex-row mb-3">
                <div class=" me-4 col">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status">
                        <option selected value="all">All</option>
                        @foreach($status as $s)
                            @php
                                $selected = ""
                            @endphp
                            @if ($s->id == $selectedStatus)
                                @php
                                    $selected = "selected"
                                @endphp
                            @endif
                            <option value="{{$s->id}}" {{$selected}}>{{$s->status_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class=" me-4 col">
                    <label class="form-label">Sent Date</label>
                    <select class="form-select" name="send">
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
                </div>

                <div class="col">
                    <label class="form-label" name="sender" >Sender</label>
                    <input type="text" class="form-control" name="email" value="{{$email}}" placeholder="Search sender...">
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button class="btn form-control bg-dark text-white" style="width: 100px;" type="submit">Search</button>
            </div>
        </form>
        
        <table class="table mt-4">
            <tr style="background-color: #EFF5EE; color: #1C651A;">
                <td>Sender</td>
                <!-- user -->
                <!-- <td style="width: 30%; ">Request Destination</td>  -->
                <!-- user end -->
                <td>Sent date</td>
                <td>Status</td>
                <td>Updated at</td>
                <!-- <td>Note</td> -->
            </tr>

            @foreach ($inbox as $i)
            <tr>
                <td>{{$i->user->email}}</td>
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
            </tr>
            @endforeach

        </table>
    </div>
</div>

@endsection

