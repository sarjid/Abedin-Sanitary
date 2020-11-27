@extends('layouts.admin-master')
@section('admin_title') Create New Admin @endsection
@section('admin') active show-sub @endsection
@section('manage-admin') active  @endsection
@section('admin-content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="#">Admin</a>
      <span class="breadcrumb-item active">Show Sub-Admin</span>
    </nav>
    <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40 ">
        <h6 class="card-body-title">Sub Admin List </h6>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap ">
            <thead>
              <tr>
                <th class="wd-15p">Name</th>
                <th class="wd-15p">Email</th>
                <th class="wd-50p">Permitions</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>
               @php
                   $i = 1;
               @endphp
                @foreach ($show_admins as $row)
              <tr>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>
                    @if($row->category == 1)
                    <span class="badge badge-pill badge-success">Category</span>
                    @endif
                    @if($row->delar == 1)
                    <span class="badge badge-pill badge-danger">Delar</span>
                    @endif
                    @if($row->products == 1)
                    <span class="badge badge-pill badge-info">Products</span>
                    @endif
                    @if($row->employee == 1)
                    <span class="badge badge-pill badge-primary">Employee</span>
                    @endif
                    @if($row->our_service == 1)
                    <span class="badge badge-pill badge-secondary">Our Service</span>
                    @endif
                    @if($row->customer_review == 1)
                    <span class="badge badge-pill badge-warning">Review</span>
                    @endif
                    @if($row->about_us == 1)
                    <span class="badge badge-pill badge-success">About Us</span>
                    @endif
                    @if($row->contact == 1)
                    <span class="badge badge-pill badge-danger">Contact</span>
                    @endif
                    @if($row->message == 1)
                    <span class="badge badge-pill badge-info">Message</span>
                    @endif
                    @if($row->settings == 1)
                    <span class="badge badge-pill badge-primary">Settings</span>
                    @endif
                    @if($row->admin_create == 1)
                    <span class="badge badge-pill badge-warning">Create Admin</span>
                    @endif
                </td>               
                <td>
                    <a href=" {{URL::to('admin/edit-sub-admin/'.$row->id)}} " title="edit" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i></a>
                    <a href=" {{URL::to('admin/delete-sub-admin/'.$row->id)}} " title="delete" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                </td>

              </tr>
              @endforeach

            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->


          </div><!--  -->

@endsection
