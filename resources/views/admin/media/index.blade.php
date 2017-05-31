@extends('layouts.admin')

@section('content')

    @if(session('photo_deleted'))
        <div class="alert alert-success">{{session()->pull('photo_deleted')}}</div>
    @endif

    @if(session('photo_uploaded'))
        <div class="alert alert-success">{{session()->pull('photo_uploaded')}}</div>
    @endif

    @if(session('media_deleted'))
        <div class="alert alert-success">{{session()->pull('media_deleted')}}</div>
    @endif


    <h1>Media</h1>
    <p>Section contains list of images. You can delete them.</p>
    <hr>

    @if(count($photos) > 0)
    <div class="col-md-12">
    <form action="delete/media" method="POST" class="form-inline">
        {{csrf_field()}}
        {{method_field('delete')}}
        <div class="form-group">
            <select name="checkBoxArray" class="form-control" id="">
                <option value="">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-danger" name="delete_all" value="Delete">
        </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th><input type="checkbox" id="options"></th>
            <th>#Id</th>
            <th>Photo</th>
            <th>Created</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($photos as $photo)
                <tr>
                    <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                    <td>{{$photo->id}}</td>
                    <td><img src="{{asset($photo->file)}}" alt="" width="100px" height="70px" /></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    <td>
                        <input type="hidden" name="photo" value="{{$photo->id}}">
                        <input type="submit" class="btn btn-danger" name="delete_single" value="Delete">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </form>
    </div>
    @else
        <h2>No media files for display</h2>
    @endif
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#options").click(function(){
                if(this.checked) {
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    });
                } else {
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    });
                }
            })
        });
    </script>
@stop