@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">E-commerce</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="card card-solid">
        <div class="card-body">
            {{-- Button Show Create --}}
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary my-3" id="btnAdd"><i class="fas fa-plus" id="iconBtnAdd"></i></button>
            </div>
            {{-- End Button Show Create --}}

            {{-- Create Category --}}
            <div class="mb-4 NoDisp" id="layoutCreate">
                <div class="border border-secondary rounded ">
                    <div class="d-flex justify-content-between mt-3 px-2">
                        <h3 class="text-uppercase text-primary">create Category</h3>
                        <button id="btnReset" class="btn btn-sm btn-warning text-uppercase">Reset</button>
                    </div>
                    <hr width="96%">
                    <form action="{{ route('categories.store') }}" id="txtFormCreate" method="post" class="p-2">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Category</label>
                            </div>

                            <select class="custom-select" name="parent_id">
                                <option value="0">New Parent Category</option>
                                @foreach ($categories as $category)
                                    @if (empty($category->parent_id))
                                        <option value="{{ $category->id }}">---{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">&nbsp;&nbsp;Name:&nbsp;&nbsp;</span>
                            </div>
                            <input class="form-control" type="text" id="txtName" name="name" value="{{ old('name') }}"
                                   placeholder="Insert Name Category Here"
                                   required>
                        </div>

                        <hr width="96%">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-sm btn-success text-uppercase" data-toggle="modal"
                                    data-target="#createConfirm">
                                Create
                            </button>
                            <!-- Button trigger modal -->

                            <!-- Modal -->
                            <div class="modal fade" id="createConfirm" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Alert!!!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to <span class="text-success text-uppercase">add</span> new Category?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger text-uppercase" data-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary text-uppercase">Okay</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                        </div>
                    </form>

                </div>
            </div>
            {{-- End Create Category --}}

            {{-- Table Category --}}
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr data-widget="expandable-table" aria-expanded="true">
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('categories.show',$category->id) }}" class="btn btn-sm btn-warning text-uppercase">Edit</a>

                                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="button" class="btn btn-sm btn-danger text-uppercase" data-toggle="modal" data-target="#delConfirm{{ $category->id }}">
                                        Delete
                                    </button>
                                    <!-- Button trigger modal -->

                                    <!-- Modal -->
                                    <div class="modal fade" id="delConfirm{{ $category->id }}" tabindex="-1" role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Alert!!!</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to <span class="text-danger text-uppercase">delete</span> this
                                                    category?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary text-uppercase">Okay</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal --}}
                                </form>
                            </div>
                        </td>
                    </tr>
                    @if($category->subCategories)
                        <tr class="expandable-body">
                            <td colspan="3" class="p-3">
                                <table class="table table-bordered">
                                    <thead>
                                    <th scope="col">Name</th>
                                    <th scope="col">Total Products</th>
                                    <th scope="col">Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($category->subCategories as $subCategory)
                                        <tr>
                                            <td>{{ $subCategory->name }}</td>
                                            <td>{{ $subCategory->parent_id }}</td>
                                            <td class="">
                                                <form action="{{ route('categories.show',$subCategory->id) }}" method="get"><button class="btn btn-sm btn-warning text-uppercase">Edit</button>
                                                </form>

                                                <form action="{{ route('categories.destroy',$subCategory->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="button" class="btn btn-sm btn-danger text-uppercase" data-toggle="modal" data-target="#delConfirm{{ $subCategory->id }}">
                                                        Delete
                                                    </button>
                                                    <!-- Button trigger modal -->

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="delConfirm{{ $category->id }}" tabindex="-1" role="dialog"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Alert!!!</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do you want to <span class="text-danger text-uppercase">delete</span> this
                                                                    category?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary text-uppercase">Okay</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- End Modal --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </td>


                        </tr>
                    @endif
                @empty
                    <tr>
                        <td>Data Not Found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@stop
