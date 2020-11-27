@extends('layouts.admin-master')
@section('delars') active show-sub @endsection
@section('company-products') active @endsection
@section('admin_title') Delar Product Add @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="#">Admin</a>
          <span class="breadcrumb-item active">Delar-products</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">
                <div class="col-md-8 m-auto">
                    <div class="card">
                        <div class="card-header">Delar Products List</div>      
                        <div class="card-body">
                          <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                              <thead>
                                <tr>
                                  <th class="wd-10p">SL</th>
                                  <th class="wd-25p">Product Name </th>
                                  <th class="wd-25p">Under Company </th>
                                  <th class="wd-20p">Status </th>
                                  <th class="wd-20p">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php 
                                 $i = 1;
                                @endphp
                                @foreach ($delar_products as $row)                                  
                                <tr>
                                  <td>{{ $i++ }}</td>
                                  <td>{{ $row->delar_product_name }}</td>
                                  <td>{{ $row->company->company_name }} -> {{ $row->delar_product_name }}</td>
                                  <td> 
                                    @if ($row->status == 1)
                                    <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                    @endif
                                  </td>                    
                                  <td>
                                    <a href="{{ url('admin/delar/products-edit'.$row->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil-square-o"></i></a>
                                    <a href="{{ url('admin/delar/products-delete/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
                                    @if ($row->status == 1)
                                    <a href="{{ url('admin/delar/products-inactive/'.$row->id) }}" class="btn btn-sm btn-danger" title="Inactive Now "><i class="fa fa-arrow-down"></i></a>
                                    @else
                                    <a href="{{ url('admin/delar/products-active/'.$row->id) }}" class="btn btn-sm btn-success" title="Active Now "><i class="fa fa-arrow-up"></i></a>
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

                <div class="col-md-4 mt-1">
                  <div class="card">
                      <div class="card-body">
                        <h5 class="text-danger text-center">Add New Delar Service</h5>
                        <hr>
                          <form action="{{ route('store.delar.products') }}" method="POST">
                              @csrf
                              <div class="form-group">
                                <label for="exampleInputEmail1">Select Company Name: <span class="text-danger">*</span></label>
                                <select class="form-control select2-show-search  @error('company_id') is-invalid  @enderror" name="company_id" data-placeholder="Choose Company">
                                  <option label="Choose one"></option>
                                  @foreach ($companies as $row)                             
                                    <option value="{{ $row->id }}">{{ $row->company_name }}</option>
                                  @endforeach
                                </select>
                                @error('company_id')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                              </div><!-- col-4 -->
                              <div class="form-group">
                                <label for="exampleInputEmail1">Delar Product Name(Bangla): <span class="text-danger">*</span></label>
                                <input type="text" name="delar_product_name" class="form-control @error('delar_product_name') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('delar_product_name') }}"  aria-describedby="emailHelp" placeholder="Delar Product Name Bangla"> 
                                @error('delar_product_name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                            </div>
                             <button type="submit" class="btn btn-primary">Add</button>
                            </form> 
                      </div>
                  </div>
               </div>       
            </div>
          </div><!-- row -->         
        </div><!-- sl-pagebody -->       
      </div><!-- sl-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->      
@endsection

