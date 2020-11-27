@extends('layouts.admin-master')
@section('products') active show-sub @endsection
@section('comments') active @endsection
@section('admin_title') Product Comments @endsection
@section('admin-content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <a class="breadcrumb-item" href="index.html">Product</a>
          <span class="breadcrumb-item active">Comments</span>
        </nav>

        <div class="sl-pagebody">
          <div class="row row-sm">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">Comment List <br>
                            <strong class="text-danger"> Total Comments:{{ count($comments) }}</strong>  
                        </div> 
                        
                        <div class="card-body">
                          <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                              <thead>
                                <tr>
                                  <th class="wd-15p">Image</th>
                                  <th class="wd-20p">Product Name</th>
                                  <th class="wd-15p">Name</th>
                                  <th class="wd-15p">Email</th>
                                  <th class="wd-25p">Comments</th>
                                  <th class="wd-10p">Action</th>
                                </tr>
                              </thead>
                              <tbody>

                                @foreach ($comments as $row)                                   
                                    <tr>
                                        <td>
                                            <img src="{{ asset($row->product->image_one) }}" height="50px;" width="50px;" alt="">
                                        </td>
                                        <td>
                                            {{ $row->product->product_name }}
                                        </td>
                                        <td>{{ $row->your_name }}
                                        </td>
                                    </td>
                                    <td>
                                        {{ $row->email }}
                                    </td>

                                    <td>
                                        {{ Str::limit($row->comment,20, '...') }}
                                    </td>
                                        <td>
                                            <a href="{{ url('admin/product/comments-view/'.$row->id) }}" class="btn btn-sm btn-primary" title="view data"> <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ url('admin/product/comments-delete/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>                       
                                @endforeach
                               
                            </tbody>
                            </table>
                        </div><!-- table-wrapper -->
                        </div>

                    </div>
                </div>
        

        
            </div>
          </div><!-- row -->

          
        </div><!-- sl-pagebody -->
        
      </div><!-- sl-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->
      
@endsection

