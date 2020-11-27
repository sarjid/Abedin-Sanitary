@extends('layouts.admin-master')
@section('products') active show-sub @endsection
@section('manage-products') active @endsection
@section('admin_title') All-Products @endsection
@section('admin-content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <a class="breadcrumb-item" href="index.html">Products</a>
          <span class="breadcrumb-item active">Manage Products</span>
        </nav>

        <div class="sl-pagebody">
          <div class="row row-sm">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">Products List <br>
                            <strong class="text-danger"> Total Products:{{ count($products) }}</strong>  
                        </div> 
                        
                        <div class="card-body">
                          <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                              <thead>
                                <tr>
                                  <th class="wd-15p">Image</th>
                                  <th class="wd-20p">Name</th>
                                  <th class="wd-20p">Category</th>
                                  <th class="wd-15p">Delar</th>
                                  <th class="wd-15p">Status</th>
                                  <th class="wd-25p">Action</th>
                                </tr>
                              </thead>
                              <tbody>

                                @foreach ($products as $row)                                   
                                    <tr>
                                        <td>
                                            <img src="{{ asset($row->image_one) }}" height="50px;" width="50px;" alt="">
                                        </td>
                                        <td>
                                            {{ $row->product_name }}
                                        </td>
                                        <td>{{ $row->category->category_name }} => {{ $row->subcategory->subcategory_name }}
                                        </td>
                                    </td>
                                    <td>
                                        @if ($row->company_id == NULL)
                                            <span class="text-danger">No Delars Found</span>
                                        @else
                                        {{ $row->company->company_name }} => {{ $row->service->delar_product_name }}
                                        @endif
                                    </td>
                                        <td>
                                            @if($row->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">Inactive</span>      
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/products-view/'.$row->id.'/'.$row->product_slug) }}" class="btn btn-sm btn-primary" title="view data"> <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ url('admin/products-edit/'.$row->id.'/'.$row->product_slug) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="{{ url('admin/products-delete/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i>
                                            </a>
                                            @if($row->status == 1)
                                            <a href="{{ url('admin/products-inactive/'.$row->id) }}" class="btn btn-sm btn-danger" title="Click to Inactive"><i class="fa fa-arrow-down"></i>
                                            </a>
                                            @else 
                                            <a href="{{ url('admin/products-active/'.$row->id) }}" class="btn btn-sm btn-success" title="click to active"><i class="fa fa-arrow-up"></i>
                                            </a>
                                            @endif
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

