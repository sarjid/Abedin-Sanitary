@extends('layouts.admin-master')
@section('message') active show-sub @endsection
@section('trash-list') active  @endsection
@section('admin_title') Trash Message @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Portfolio</a>
        <span class="breadcrumb-item active">Trash Message</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">
              <div class="col-md-12 ">
                  <div class="card">
                      <div class="card-header">Trash Message List<br>
                          <strong class="text-danger">Trash :{{ count($messages) }}</strong>  
                      </div> 
                      
                      <div class="card-body">
                        <div class="table-wrapper">
                          <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                              <tr>
                                <th class="wd-20p">Name</th>
                                <th class="wd-20p">Email</th>
                                <th class="wd-40p">Subject</th>
                                <th class="wd-20p">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                
                              @foreach ($messages as $row)                                   
                                  <tr>
                                      <td>{{ $row->name }}</td>
                                      <td>{{ $row->email }}</td>
                                      <td>{{ $row->subject }}</td>
                                      
                                      <td>
                                          <a href="{{ url('admin/contact/message-view/'.$row->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-eye"></i>
                                          </a>
                                          <a href="{{ url('admin/trash/message-delete/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="seen "><i class="fa fa-trash"></i>
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

