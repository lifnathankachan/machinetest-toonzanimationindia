<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
        </h2>
        <style>
    table{
    width:100%;
}
#example_filter{
    float:right;
}
#example_paginate{
    float:right;
}
label {
    display: inline-flex;
    margin-bottom: .5rem;
    margin-top: .5rem;
   
}

</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<div class="container">
	<div class="row">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
               
                <th>Task</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Total Time</th>
                <th>User Name</th>
                <th colspan=2>Action</th>


               
            </tr>
        </thead>
        <tbody>
            @foreach($record as $re)
            
            <tr>
            @php
            $start = date_create($re->start_time);
            $end = date_create($re->end_time);
            $diff=date_diff($end,$start);
            $time=$diff->h."h:".$diff->i."m";
            @endphp
                <td>{{$re->title}}</td>
                <td>{{date('d-m-Y',strtotime($re->date))}}</td>
                <td>{{date("g:i a", strtotime("$re->start_time"))}}</td>
                <td>{{date("g:i a", strtotime("$re->end_time"))}}</td>
                <td>{{ $time }}</td>
                <td>  {{ $re->user->name}}</td>
                <td>
                <form  class="" action="/approved" method="post" >
                                                    @csrf
                                                        <input type="hidden" value="{{$re->id}}" name= "id" id="id">
                                                        <input type="submit" value="Approve" class="btn btn-primary">
                                                    </form>  
                                                </td>
                                               
												<td> 
                                                    <form  class="" action="/reject" method="POST" >
                                                    @csrf
                                                        <input type="hidden" value="{{$re->id}}" name= "id" id="id">
                                                        <input type="submit" value="Reject" class="btn btn-danger">
            </form> 
            </tr>
            @endforeach
           
            
          
    </tbody>
    </table>
	</div>
</div>
    </x-slot>

<script>
    $(document).ready(function() {
    $('#example').DataTable(
        
         {     

      "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
        "iDisplayLength": 5
       } 
        );
} );


function checkAll(bx) {
  var cbs = document.getElementsByTagName('input');
  for(var i=0; i < cbs.length; i++) {
    if(cbs[i].type == 'checkbox') {
      cbs[i].checked = bx.checked;
    }
  }
}
</script>
</x-app-layout>
