@extends('layout.app') 
@section('content') 
@include('inc.messages')


<!-- Start Detail-View  modal==================================================== -->

<div id="EmpMainDetailModal" class="modal fade" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width:600px;">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="modaltitle" class="modal-title">Employee Details</h4>
            </div>

            <div id="EmpMainDetailModalBody" class="modal-body" style="padding-bottom:0">
                <!-- 0 -->


                <div id="details" style="margin-left:0px;">
                    <div class="row">
                
                        <div class="col-sm-9">
                            <dl class="dl-horizontal" style="margin-top:0; margin-bottom:0px;">

                            <dt>Id</dt>
                            <dd id="ddId"></dd>
                            <dt>Lastname</dt>
                            <dd id="ddLastName"></dd>
                            <dt>Firstname</dt>
                            <dd id="ddFirstName"></dd>
                            <dt>Age</dt>
                            <dd id="ddAge"> </dd>
                            <dt>BirthDate</dt>
                            <dd id="ddBirthDate"></dd>
                            <dt>Country</dt>
                            <dd id="ddCountry"></dd>
                            <dt>Created At</dt>
                            <dd id="ddCreatedAt"></dd>
                            <dt>Updated At</dt>
                            <dd id="ddUpdatedAt"></dd>

                            </dl>
                
                        </div>
                    </div>
                
                </div> <!-- End div with id=details -->


            </div>
            <!-- End Modal body -->

            <div class="modal-footer" style="margin-top:20px;">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>

</div>

<!-- End Detail-View modal ==================================================== -->



<h1 style="">Employee List</h1>

<a href="/employee/create"  class="pull-right" style="margin-top:-20px"><i class="fas fa-plus"></i> Add Employee</a>
<hr style="border-bottom:solid 1px #4092b6; margin-top:0 ">
<table class="table table-bordered table-striped table-hover">
    <thead style="background-color: #0f7faf; color:white">
        <th>Id</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Age</th>
        <th>Birthdate</th>
        <th>Country</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
    </thead>
    @foreach($farhan as $emp)
    <tr>
        <td>{{$emp->Id}}</td>
        <td>{{$emp->LastName}}</td>
        <td>{{$emp->FirstName}}</td>
        <td>{{$emp->Age}}</td>
        <td>{{$emp->BirthDate}}</td>
        <td>{{$emp->country_name}}</td>
        <td>{{$emp->created_at}}</td>
        <td>{{$emp->updated_at}}</td>
        <td style="width:150px;">
            <a class="btn btn-link" style="float:left;padding:0" href="/employee/{{$emp->Id}}/edit"> Edit |</a>
            <!-- <a class="btn btn-link" onclick="test({{$emp->Id}});" style="padding:0" href="">Delete</a> -->

            <button class="btn btn-link" onclick="test({{$emp->Id}});" style="float:left;padding:0"  data-toggle="modal" data-target="#EmpMainDetailModal">View |</button>

            <form action="/employee/{{$emp->Id}}" method="POST">

                <!-- {{ method_field('DELETE') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

                
                <input type="hidden" name="_method" value="DELETE" />
                <input id="btn" type="submit" value="Delete" class="btn btn-link" style="padding:0;">
            </form>
        </td>

    </tr>

    @endforeach




</table>


{{ $farhan->links() }}


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<script>
    //function test(id){
    // $.ajax({
    //      url: "/employee/"+id,
    //      headers: {
    //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //           },
    //      type: "post",
    //      dataType: "JSON",
    //      data: {
    //         "id": id,
    //                 "_method": 'delete',
    //             },
    //      success: function(e){
    //          alert(e);
    //      }
    //     });
    //  }

    function test(id) {

        $.ajax({
            url: "/employee/" + id,
            type: "GET",
            success: function (e) {
                $('#ddId').html(e[0].Id);
                $('#ddLastName').html(e[0].LastName);
                $('#ddFirstName').html(e[0].FirstName);
                $('#ddAge').html(e[0].Age);
                $('#ddBirthDate').html(e[0].BirthDate);
                $('#ddCountry').html(e[0].country_name);
                $('#ddCreatedAt').html(e[0].created_at);
                $('#ddUpdatedAt').html(e[0].updated_at);
            },


        });

    }
</script>

@endsection