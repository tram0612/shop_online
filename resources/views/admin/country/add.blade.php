@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-body">
                            <h4 class="card-title">Add Country</h4>
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

                            <form action="{{route('admin.country.add')}}" method="post" enctype="multipart/form-data" class="form-horizontal m-t-30">
                                @csrf 
                                <div class="form-group">
                                    <label>Country <!-- <span class="help"> e.g. "George deo"</span> --></label>
                                    <input type="text" name="name" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" name="submit" type="submit" >Add</button>
                                    
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
                               
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
