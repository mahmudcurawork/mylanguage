@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-danger">
                                    <img src="/images/trash.svg" alt="trash icon" width="25" height="25">
                                </button>
                                <button class="btn btn-info">
                                    <img src="/images/eye.svg" alt="trash icon" width="25" height="25">
                                </button>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="/images/plus.svg" alt="trash icon" width="25" height="25">
                                </button>

                            </div>
                            <div class="col-6 d-flex">
                                <input type="text" name="search" id="search" class="form-control"
                                    placeholder="Search for words">
                                <button class="btn btn-primary">
                                    <img src="/images/search.svg" alt="search icon">
                                </button>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">

                            </div>
                            <div class="col-6 d-flex">
                                <input type="text" name="startDate" id="startDate" class="form-control datepicker"
                                    placeholder="Start date">
                                <input type="text" name="endDate" id="endDate" class="form-control datepicker"
                                    placeholder="End date">
                                <button class="btn btn-primary">
                                    <img src="/images/search.svg" alt="search icon">
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-6 d-flex">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>No of times read</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                                <button class="btn btn-primary">
                                    <img src="/images/search.svg" alt="search icon">
                                </button>
                            </div>
                        </div>

                        <br><br>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <input type="checkbox" name="multipleDelete" id="multipleDelete">
                                    </th>
                                    <th scope="col">Word</th>
                                    <th scope="col">Definition</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <input type="checkbox" name="select" id="select1">
                                        <label for="select1">1</label>

                                    </th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <input type="checkbox" name="select" id="select2">
                                        <label for="select2">2</label>
                                    </th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr for="select3">
                                    <th scope="row">
                                        <input type="checkbox" name="select" id="select3">
                                        <label for="select3">3</label>
                                    </th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $(".datepicker").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
@endsection



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <input type="text" class="form-control mb-3" placeholder="word">
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="definition">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <img src="/images/x-lg.svg" alt="close icon">
                </button>
                <button type="button" class="btn btn-primary">
                    <img src="/images/save.svg" alt="save icon">
                </button>
            </div>
        </div>
    </div>
</div>


