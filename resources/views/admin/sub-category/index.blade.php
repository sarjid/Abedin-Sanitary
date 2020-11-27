@extends('layouts.admin-master')
@section('categories') active show-sub @endsection
@section('sub-category') active @endsection
@section('admin_title') Sub-Category @endsection
@section('admin-content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="#">Admin</a>
          <span class="breadcrumb-item active">Sub-Category</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">
                <div class="col-md-8 m-auto">
                    <div class="card">
                        <div class="card-header">Sub-Category List</div>        
                        <div class="card-body">
                          <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                              <thead>
                                <tr>
                                  <th class="wd-10p">SL</th>
                                  <th class="wd-20p">Subcategory Name </th>
                                  <th class="wd-20p">Under Category </th>
                                  <th class="wd-20p">Status </th>
                                  <th class="wd-30p">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php 
                                 $i = 1;
                                @endphp
                                @foreach ($subcategories as $row)                                  
                                <tr>
                                  <td>{{ $i++ }}</td>
                                  <td>{{ $row->subcategory_name }}</td>
                                  <td>{{ $row->category->category_name }} -> {{ $row->subcategory_name }}</td>
                                  <td> 
                                    @if ($row->status == 1)
                                    <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                    @endif
                                  </td>                    
                                  <td>
                                    <a href="{{ url('admin/sub/categories-edit/'.$row->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil-square-o"></i></a>
                                    <a href="{{ url('admin/sub/categories-delete/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
                                    @if ($row->status == 1)
                                    <a href="{{ url('admin/sub/categories-inactive/'.$row->id) }}" class="btn btn-sm btn-danger" title="Inactive Now "><i class="fa fa-arrow-down"></i></a>
                                    @else
                                    <a href="{{ url('admin/sub/categories-active/'.$row->id) }}" class="btn btn-sm btn-success" title="Active Now "><i class="fa fa-arrow-up"></i></a>
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
                        <h5 class="text-danger text-center">Add New Sub-Category</h5>
                        <hr>
                          <form action="{{ route('store.sub.category') }}" method="POST">
                              @csrf
                              <div class="form-group">
                                <select class="form-control select2-show-search  @error('category_id') is-invalid @enderror" name="category_id" data-placeholder="Choose one (with searchbox)">
                                  <option label="Choose one"></option>
                                  @foreach ($categories as $row)                             
                                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                  @endforeach
                                </select>
                                @error('category_id')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                              </div><!-- col-4 -->
                              <div class="form-group">
                                <label for="exampleInputEmail1">Category Name(Bangla): <span class="text-danger">*</span></label>
                                <input type="text" name="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('subcategory_name') }}"  aria-describedby="emailHelp" placeholder="Sub Category Name Bangla">     
                                @error('subcategory_name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                            </div>
                             <button type="submit" class="btn btn-primary">Add Sub-Category</button>
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

