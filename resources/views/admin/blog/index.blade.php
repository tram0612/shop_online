@extends('admin.layouts.master')
@section('content')                  
  <div class="col-12">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title">Country</h4>
              
          </div>
          <div class="table-responsive">
              <table class="table">
                  <thead class="thead-light">
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Image</th>
                          <th scope="col">Author</th>
                          <th scope="col">Description</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($items as $item)
                      @php
                        $id = $item->id;
                        $urlEdit = route('admin.blog.edit',[$id]);
                        $urlDel = route('admin.blog.del',[$id]);
                      @endphp
                      <tr>
                          <th scope="row">{{$id}}</th>
                          <td>{{$item->title}}</td>
                          <td><img width="100" height="100" src="/upload/user/blog/{{$item->image}}"></td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->description}}</td>
                          <td>
                            <a class="" href="{{$urlEdit}}" aria-expanded="false">
                                <i class="mdi mdi-account-edit"></i>
                                <span class="hide-menu">Edit</span>
                            </a>
                            <a class="" href="{{$urlDel}}" aria-expanded="false">
                                <i class="mdi mdi-delete"></i>
                                <span class="hide-menu">Del</span>
                            </a>
                          </td>
                          
                      </tr>
                      @endforeach
                      
                  </tbody>
                 {{$items->links()}} 
              </table>
          </div>
          
      </div>
  </div>
  <div class="col-12"><a href="{{route('admin.blog.add')}}" class="btn btn-success" role="button" aria-pressed="true">Add Country</a></div>
@endsection