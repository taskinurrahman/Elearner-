<table class="table align-content-center">
    <thead>
    <tr>
        <th scope="col">Enroll ID</th>
        <th scope="col">Course ID</th>
        <th scope="col">Course Name</th>
        <th scope="col">User ID</th>
        <th scope="col">User Name</th>
    </tr>
    </thead>
    <tbody id="enroll-info">
    @foreach($data as $enroll)
        <tr id="data-row">
            <td> {{$enroll->id}}</td>
            <td>{{$enroll->course_id}}</td>
            <td>{{$enroll->course_name}}</td>
            <td>{{$enroll->user_id}}</td>
            <td>{{$enroll->user_name}}</td>

        </tr>
    @endforeach
    </tbody>
</table>

<div class="col-md-2 mx-auto">
    {{$data->links()}}
</div>
</div>


