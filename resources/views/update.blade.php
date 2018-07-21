@extends('layout.app')
@section('content')




<?php
$lastname =$emp->LastName ;
$firstname = $emp->FirstName ;
$age = $emp->Age ;
$birthdate = $emp->BirthDate;
$country1 = $emp->Country; 


if(count($errors)>0){
        $lastname =old('lastname') ;
    $firstname = old('firstname') ;
    $age = old('age') ;
    $birthdate = old('birthdate');
    $country1 = old('country');
}

// if(isset($_POST['update'])){

// echo "EEEEEe";

//     $lastname =old('lastname') ;
//     $firstname = old('firstname') ;
//     $age = old('age') ;
//     $birthdate = old('birthdate');
//     $country1 = old('country');
// }

    



?>

<h1>Update Employee</h1>
<hr style="border-bottom:solid 1px #4092b6; margin-top:0 ">
@include('inc.messages')
 
<form action="/employee/{{$emp->Id}}" method="post" style="width:400px; margin-bottom:50px">
<input type="hidden" name="_method" value="PUT" />
    @csrf
    <div class="form-group">
        <label for="">LastName</label>
        <input class="form-control" value="{{ $lastname }}" name="lastname" type="text">
    </div> 
    <div class="form-group">
        <label for="">FirstName</label>
        <input class="form-control" value="{{$firstname  }}" name="firstname" type="text">
    </div>
    <div class="form-group">
        <label for="">Age</label>
        <input class="form-control" value="{{ $age }}" name="age" type="text">
    </div>
    <div class="form-group">
        <label for="">Birthdate</label>
        <input class="form-control" value="{{ $birthdate  }}" name="birthdate" type="date">
    </div>

    <div class="form-group">
        <label for="">Country</label>
        <select name="country" id="" class="form-control">
            <option value=""></option>
            @foreach ($countries as $country) 
            @if ($country1==$country->id)
            <option selected value="{{$country->id}}">{{$country->country_name}}</option>
            @endif
            <option value="{{$country->id}}">{{$country->country_name}}</option>


            @endforeach
        </select>
    </div> 

 
    <input type="submit" name="update" value="Update" class="btn btn-primary">
</form>











@endsection