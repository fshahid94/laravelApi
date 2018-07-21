@extends('layout.app')
@section('content')


<h1>Add Employee</h1>
<hr style="border-bottom:solid 1px #4092b6; margin-top:0 ">
@include('inc.messages')
<form action="/employee" method="post" style="width:400px; margin-bottom:50px">
    @csrf
    <div class="form-group">
        <label for="">LastName</label>
        <input class="form-control" value="{{ old('lastname') }}" name="lastname" type="text">
    </div> 
    <div class="form-group">
        <label for="">FirstName</label>
        <input class="form-control" value="{{ old('firstname') }}" name="firstname" type="text">
    </div>
    <div class="form-group">
        <label for="">Age</label>
        <input class="form-control" value="{{ old('age') }}" name="age" type="text">
    </div>
    <div class="form-group">
        <label for="">Birthdate</label>
        <input class="form-control" value="{{ old('birthdate') }}" name="birthdate" type="date">
    </div>

    <div class="form-group">
        <label for="">Country</label>
        <select name="country" id="" class="form-control">
            <option value=""></option>
            @foreach ($countries as $country) 
            @if (old('country')==$country->id)
            <option selected value="{{$country->id}}">{{$country->country_name}}</option>
            @endif
            <option value="{{$country->id}}">{{$country->country_name}}</option>


            @endforeach
        </select>
    </div> 

    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
</form>



@endsection