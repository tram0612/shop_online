@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title">Update Blog</h4>
               @if(session('success'))
               <div class="alert alert-success alert-dismissible">
                    <button type="button"class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                   {{session('success')}}
               </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                     <ul>
                         @foreach($errors->all() as $error)
                             <li>{{$error}}</li>
                         @endforeach
                     </ul>
                 </div>
                @endif  

                <form action="{{route('admin.blog.edit',[$item->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal m-t-30">
                    @csrf 
                    
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{$item->title}}">
                         @error('title')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Image</label>
                        <div class="col-md-12">
                            <input name="image" type="file" class="form-control form-control-line">
                        </div>
                        @error('image')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" value="{{$item->description}}">
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="ckeditor" id="editor1" name="content" class="form-control" rows="5">{!!$item->content!!}</textarea>
                    </div>
                    
                   
                    <div class="form-group">
                        <button class="btn btn-success" name="submit" type="submit" >Edit</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
@endsection
@section('ckfinder')
<script type="text/javascript">
    /* editor1 laf id cuar textarea ma chung ta muon chen ckfinder */
    CKEDITOR.replace( 'editor1',

    {

    
    filebrowserBrowseUrl: '/libraries/ckfinder/ckfinder.html',

    filebrowserImageBrowseUrl: '/libraries/ckfinder/ckfinder.html?type=Images',

    filebrowserUploadUrl: '/libraries/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

    filebrowserImageUploadUrl: '/libraries/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'

    });

</script>
@endsection
                           
