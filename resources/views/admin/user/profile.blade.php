 @extends('admin.layouts.master')
 @section('content')
  <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Profile</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="/upload/user/avatar/{{$user->avarta}}" class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10">{{$user->name}}</h4>
                                    <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6>{{$user->email}}</h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6>{{$user->phone}}</h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6>{{$user->address}}</h6>
                                <div class="map-box">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div> <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><i class="mdi mdi-facebook"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="mdi mdi-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="mdi mdi-youtube-play"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('admin.profile')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-material">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" class="form-control form-control-line" value="{{$user->name}}">
                                        </div>
                                        @error('name')
                                            <div class="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="email" id="email" value="{{$user->email}}" readonly>
                                        </div>
                                        @error('email')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input name="password" type="password" value="" class="form-control form-control-line">
                                        </div>
                                        @error('password')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input name="phone" type="text" placeholder="123 456 7890" class="form-control form-control-line" value="{{$user->phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <input name="address" type="text" class="form-control form-control-line" value="{{$user->address}}">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-md-12">Message</label>
                                        <div class="col-md-12">
                                            <textarea name="address" rows="5" class="form-control form-control-line"></textarea>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-sm-12">Select Country</label>
                                        <div class="col-sm-12">
                                            <select name="id_country" class="form-control form-control-line">
                                                @foreach($countrys as $c)
                                                @if($c->id == $user->id_country)
                                                <option selected value="{{$c->id}}">{{$c->name}}</option>
                                                @else
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Avatar</label>
                                        <div class="col-md-12">
                                            <input name="avarta" type="file" class="form-control form-control-line">
                                        </div>
                                        @error('avarta')
                                            <div class="alert">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" name="submit" type="submit">Update Profile</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
@endsection