@extends('layouts.admin-master')
@section('services') active  @endsection
@section('admin_title') Our Services @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="#">Admin</a>
          <span class="breadcrumb-item active">Our-Services</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">
                <div class="col-md-8 m-auto">
                    <div class="card">
                        <div class="card-header">Service List</div>      
                        <div class="card-body">
                          <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                              <thead>
                                <tr>
                                  <th class="wd-10p">SL</th>
                                  <th class="wd-20p">Service Name </th>
                                  <th class="wd-20p">Status </th>
                                  <th class="wd-30p">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php 
                                 $i = 1;
                                @endphp
                                @foreach ($services as $row)                                  
                                <tr>
                                  <td>{{ $i++ }}</td>
                                  <td>{{ $row->service_name }}</td>
                                  <td> 
                                    @if ($row->status == 1)
                                    <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                    @endif
                                  </td>                    
                                  <td>
                                    <a href="{{ url('admin/services-edit/'.$row->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil-square-o"></i></a>
                                    <a href="{{ url('admin/services-delete/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
                                    @if ($row->status == 1)
                                    <a href="{{ url('admin/services-inactive/'.$row->id) }}" class="btn btn-sm btn-danger" title="Inactive Now "><i class="fa fa-arrow-down"></i></a>
                                    @else
                                    <a href="{{ url('admin/services-active/'.$row->id) }}" class="btn btn-sm btn-success" title="Active Now "><i class="fa fa-arrow-up"></i></a>
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
                        <h5 class="text-danger text-center">Add New Service</h5>
                        <hr>
                          <form action="{{ route('store.services') }}" method="POST">
                              @csrf
                              <div class="form-group">
                                <label for="exampleInputEmail1">Service Name(Bangla): <span class="text-danger">*</span></label>
                                <input type="text" name="service_name" class="form-control @error('service_name') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('service_name') }}"  aria-describedby="emailHelp" placeholder="service name"> 
                                @error('service_name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service Details: <span class="text-danger">*</span></label>
                                {{-- <textarea name="service_details" id="summernote2"></textarea> --}}
                                <textarea name="service_details" id="" cols="40" rows="5"></textarea>
                                @error('service_details')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror        
                            </div>
                             <button type="submit" class="btn btn-primary">Add Service</button>
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

