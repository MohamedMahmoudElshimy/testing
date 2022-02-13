@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="alert alert-success" id="success-mg"  style="display: none">
                تم الحذف بنجاح
            </div>

            <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('messages.profile name')}}</th>
                <th scope="col">{{__('messages.profile price')}}</th>
                <th scope="col">{{__('messages.profile details')}}</th>
                <th scope="col">{{__('messages.profile operation')}}</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($profiles as $profile)

                <tr class="rowId{{$profile -> id}}">
                    <th scope="row">{{$profile -> id}}</th>
                    <td>{{$profile -> name}}</td>
                    <td>{{$profile -> price}}</td>
                    <td>{{$profile -> details}}</td>
                    <td>

                        <img style="width: 50px; height: 50px;" src="{{asset('images/offers/'. $profile->photo)}}">
                    </td>
                    <td class="td-actions">
                        <a href="" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                    <td class="td-actions">
                        <a href="" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                        </a>
                    </td>
                    <td class="td-actions">
                        <a href="" profile_id="{{$profile ->id}}" type="button" title="Remove Ajax" class="delete_btn btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close Ajax</i>
                        </a>
                    </td>
                   <td class="td-actions">
                    <a href="{{route('ajax.profiles.edit', $profile ->id)}}" type="button" title="Edit Ajax" class=" btn btn-danger btn-link btn-sm">
                        <i class="material-icons">Edit Ajax</i>
                    </a>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
@stop

@section('script')
    <script>

        $(document).on('click' , '.delete_btn', function (e) {
            e.preventDefault();

            var profile_id = $(this).attr('profile_id');
            $.ajax({
                type:'post',
                url:"{{route('ajax.profiles.delete')}}",
                data: {
                    '_token' : "{{csrf_token()}}",
                    'id' : profile_id,
                },
                success: function(data){
                    if(data.status == true){
                        $('#success-mg').show();
                    }
                    $('.rowId'+data.id).remove();
                },error: function (reject) {

                }

            });
        });


    </script>

@stop