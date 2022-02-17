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
                                <button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="delete">
                                    <img src="/images/trash.svg" alt="trash icon" width="25" height="25">
                                </button>
                                <button id="massView" class="btn btn-secondary" data-toggle="tooltip" data-placement="top"
                                    title="view">
                                    <img src="/images/eye.svg" alt="trash icon" width="25" height="25">
                                </button>
                                <button id="addButton" onclick="addWord()" class="btn btn-secondary" data-toggle="tooltip"
                                    data-placement="top" title="add">
                                    <img src="/images/plus.svg" alt="trash icon" width="25" height="25">
                                </button>

                            </div>
                            <div class="col-6 d-flex">

                                <input type="text" onkeyup="searchWord(event)" name="searchWord" id="searchWord"
                                    class="form-control" placeholder="Search for words">
                                <button class="btn btn-secondary">
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
                                <button class="btn btn-secondary">
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
                                <button class="btn btn-secondary">
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
                                        <span>Word</span>
                                    </th>
                                    <th scope="col">Definition</th>
                                    <th scope="col">Learned</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="wordsTable">


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="skeleton">
        Loading...
    </div>
@endsection



<!-- Modal -->
<div class="modal fade" id="wordModal" tabindex="-2" aria-labelledby="wordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wordModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <input type="text" id="word" class="form-control modalForm mb-3" placeholder="word">
                    <span style="cursor: pointer" onclick="clearField('word')"><img src="/images/x-lg-white.svg"
                            alt="clear"></span>
                </div>
                <div class="input-group">
                    <input type="text" id="definition" class="form-control modalForm" placeholder="definition">
                    <span style="cursor: pointer" onclick="clearField('definition')"><img src="/images/x-lg-white.svg"
                            alt="clear"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="hideModal()">
                    <img src="/images/x-lg.svg" alt="close icon">
                </button>

                <button type="submit" id="saveData" class="btn btn-secondary" onclick="">
                    <img src="/images/save.svg" alt="save icon">
                </button>
            </div>
        </div>
    </div>
</div>


{{-- are you sure box --}}

<div class="modal fade" id="confirm" tabindex="-2" aria-labelledby="wordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Are you sure to delete this word?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="actionYes" onclick="">Delete</button>

                <button type="button" class="btn btn-secondary" id="actionNo" onclick="cancelAction()">Cancel</button>
            </div>
        </div>
    </div>
</div>
