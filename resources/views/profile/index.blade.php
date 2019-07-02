@extends('layouts.front')

@section('content')

<body>
    <center>
@foreach($posts as $post)
<table border="1" width="400" height="400">
    
 <tr algin="center">
     <th colspan="2">My プロフィール</th>
 </tr>
 <tr algin="center">
     <td>氏名</td>
     <td>{{ $post->name }}</td>
 </tr>
 <tr algin="center">
     <td>性別</td>
     <td>{{ $post->gender }}</td>
 </tr>
 <tr algin="center">
     <td>趣味</td>
     <td>{{ $post->hobby }}</td>
 </tr>
 <tr aligin="center">
     <td>自己紹介欄</td>
     <td>{{ $post->introduction }}</td>
 </tr>
</table>
@endforeach
</center>
</body>
@endsection