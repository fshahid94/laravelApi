@extends('layout.app') @section('content') @include('inc.messages')


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

                </div>
                <!-- End div with id=details -->


            </div>
            <!-- End Modal body -->

            <div class="modal-footer" style="margin-top:20px;">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>

</div>

<!-- End Detail-View modal ==================================================== -->




<a href="/employee/create">Add Employee</a>
<table class="table table-bordered table-striped table-hover">
    <tr>
        <th>Id</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Age</th>
        <th>Birthdate</th>
        <th>Country</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
    </tr>
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
            <button class="btn btn-link" style="padding:0" onclick="test2({{$emp->Id}});">delete</button>

        </td>

    </tr>

    @endforeach




</table>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<script>
    function test2(id) {
        $.ajax({
            url: "/employee/" + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            data: {
               "_method": 'delete'
            },
            success: function (e) {
               // alert("deleted");
                location.reload();
            }
        });

    }

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


    //    function test2(id){
    //     $.ajax({
    //          url: "/employee/"+id,
    //          headers: {
    //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //               },
    //          type: "delete",
    //          data: {
    //                     //"id": id,
    //                     "_method": 'delete'
    //                 },
    //          success: function(e){
    //              alert("deleted");
    //              console.log("deleted");
    //          }
    //         });

    //      }
</script>

@endsection