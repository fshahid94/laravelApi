<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
 <table class="table table-bordered table-striped hover">
     <tr>
         <th>Id</th><th>Title</th><th>Body</th><th>Created At</th><th>Updated At</th>
     </tr>
     @foreach($posts as $post)
     <tr>
<td>{{$post->id}}</td>
<td>{{$post->title}}</td>
<td>{{$post->body}}</td>
<td>{{$post->created_at}}</td>
<td>{{$post->updated_at}}</td>
     </tr>
     @endforeach
     
 </table>
</div>






</body>
</html>