@extends('layouts.admin-master')
@section('employee') active show-sub @endsection
@section('manage-employee') active @endsection
@section('admin_title') Manage Employee @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="#">Admin</a>
          <span class="breadcrumb-item active">Manage Employee</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">
                <div class="col-md-12 m-auto">
                    <div class="card">
                        <div class="card-header">Employee List</div>      
                        <div class="card-body">
                          <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                              <thead>
                                <tr>
                                  <th class="wd-20p">Image </th>
                                  <th class="wd-20p">Employee Name </th>
                                  <th class="wd-20p">Position</th>
                                  <th class="wd-15p">Status </th>
                                  <th class="wd-25p">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($employees as $row)                                  
                                <tr>
                                  <td>
                                    <img src="{{ asset($row->image) }}" height="50px;" width="50px;" alt="">
                                  </td>
                                  <td>{{ $row->employee_name }}</td>
                                  <td>{{ $row->position }}</td>
                                  <td> 
                                    @if ($row->status == 1)
                                    <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                    @endif
                                  </td>                    
                                  <td>
                                    <a href="{{ url('admin/employee-edit/'.$row->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil-square-o"></i></a>
                                    <a href="{{ url('admin/employee-delete/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
                                    @if ($row->status == 1)
                                    <a href="{{ url('admin/employee-inactive/'.$row->id) }}" class="btn btn-sm btn-danger" title="Inactive Now "><i class="fa fa-arrow-down"></i></a>
                                    @else
                                    <a href="{{ url('admin/employee-active/'.$row->id) }}" class="btn btn-sm btn-success" title="Active Now "><i class="fa fa-arrow-up"></i></a>
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

