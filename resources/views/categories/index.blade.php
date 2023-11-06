@extends('layouts.index')
@section('js')
<script src="{{ URL::asset('public/dist/js/JS_Categories.js') }}"></script>
@endsection
@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-header-title">Quản trị danh mục</h1>
            </div>
        </div>
    </div>
    <div class="card">
        <!-- Table -->
        <div class="table-responsive datatable-custom">
            <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                <div class="dt-buttons"> <button class="dt-button buttons-copy buttons-html5 d-none" tabindex="0" aria-controls="datatable" type="button"><span>Copy</span></button> <button class="dt-button buttons-excel buttons-html5 d-none" tabindex="0" aria-controls="datatable" type="button"><span>Excel</span></button> <button class="dt-button buttons-csv buttons-html5 d-none" tabindex="0" aria-controls="datatable" type="button"><span>CSV</span></button> <button class="dt-button buttons-pdf buttons-html5 d-none" tabindex="0" aria-controls="datatable" type="button"><span>PDF</span></button> <button class="dt-button buttons-print d-none" tabindex="0" aria-controls="datatable" type="button"><span>Print</span></button> </div>
                <div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="datatable"></label></div>
                <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table dataTable no-footer" role="grid" aria-describedby="datatable_info">
                    <thead class="thead-light">
                        <tr role="row">
                            <th class="table-column-pe-0 sorting_disabled" rowspan="1" colspan="1" aria-label="
                  
                    
                    
                  
                " style="width: 25.675px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                                    <label class="form-check-label" for="datatableCheckAll"></label>
                                </div>
                            </th>
                            <th class="table-column-ps-0 sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Project: activate to sort column ascending" style="width: 324.675px;">Project</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Tasks" style="width: 58.312px;">Tasks</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Members" style="width: 87.975px;">Members</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 93.875px;">Status</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Completion: activate to sort column ascending" style="width: 126.95px;">Completion</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 36.0125px;"><i class="bi-paperclip"></i></th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 38.6625px;"><i class="bi-chat-left-dots"></i></th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Due date: activate to sort column ascending" style="width: 81.463px;">Due date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr role="row" class="odd">
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck1">
                                    <label class="form-check-label" for="usersDataCheck1"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="project.html">
                                    <img class="avatar" src="assets/svg/brands/guideline-icon.svg" alt="Image Description">
                                    <div class="ms-3">
                                        <span class="d-block h5 text-inherit mb-0">Cloud computing web service</span>
                                        <span class="d-block fs-6 text-body">Updated 2 minutes ago</span>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    120 <a class="badge bg-soft-dark text-dark ms-1" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="tasks completed today">+2</a>
                                </div>
                            </td>
                            <td>
                                <!-- Avatar Group -->
                                <div class="avatar-group avatar-group-xs avatar-circle">
                                    <a class="avatar" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Ella Lauda" data-bs-original-title="Ella Lauda">
                                        <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                                    </a>
                                    <a class="avatar" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="David Harrison" data-bs-original-title="David Harrison">
                                        <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                                    </a>
                                    <a class="avatar avatar-soft-dark" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Antony Taylor">
                                        <span class="avatar-initials">A</span>
                                    </a>
                                    <a class="avatar avatar-soft-info" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Sara Iwens">
                                        <span class="avatar-initials">S</span>
                                    </a>
                                    <a class="avatar" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Finch Hoot" data-bs-original-title="Finch Hoot">
                                        <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                                    </a>
                                </div>
                                <!-- End Avatar Group -->
                            </td>
                            <td>
                                <span class="legend-indicator"></span>In progress
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="fs-6 me-2">35%</span>
                                    <div class="progress table-progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a class="text-body" href="project-files.html">
                                    <i class="bi-paperclip"></i> 10
                                </a>
                            </td>
                            <td>
                                <a class="text-body" href="project-activity.html">
                                    <i class="bi-chat-left-dots"></i> 2
                                </a>
                            </td>
                            <td>05 May</td>
                        </tr>
                        <tr role="row" class="even">
                            <td class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck10">
                                    <label class="form-check-label" for="usersDataCheck10"></label>
                                </div>
                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="project.html">
                                    <div class="avatar avatar-soft-info avatar-circle">
                                        <span class="avatar-initials">G</span>
                                    </div>
                                    <div class="ms-3">
                                        <span class="d-block h5 text-inherit mb-0">Get a complete store audit</span>
                                        <span class="d-block fs-6 text-body">Updated 2 weeks ago</span>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    10 <a class="badge bg-soft-dark text-dark ms-1" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="task completed today">+1</a>
                                </div>
                            </td>
                            <td>
                                <!-- Avatar Group -->
                                <div class="avatar-group avatar-group-xs avatar-circle">
                                    <a class="avatar" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Finch Hoot" data-bs-original-title="Finch Hoot">
                                        <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                                    </a>
                                    <a class="avatar avatar-soft-dark" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Bob Bardly">
                                        <span class="avatar-initials">B</span>
                                    </a>
                                    <a class="avatar" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Clarice Boone" data-bs-original-title="Clarice Boone">
                                        <img class="avatar-img" src="assets/img/160x160/img7.jpg" alt="Image Description">
                                    </a>
                                    <a class="avatar avatar-soft-danger" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Adam Keep">
                                        <span class="avatar-initials">A</span>
                                    </a>
                                </div>
                                <!-- End Avatar Group -->
                            </td>
                            <td>
                                <span class="legend-indicator bg-primary"></span>In progress
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="fs-6 text-primary me-2">30%</span>
                                    <div class="progress table-progress">
                                        <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a class="text-body" href="project-files.html">
                                    <i class="bi-paperclip"></i> 3
                                </a>
                            </td>
                            <td>
                                <a class="text-body" href="project-activity.html">
                                    <i class="bi-chat-left-dots"></i> 15
                                </a>
                            </td>
                            <td>01 June</td>
                        </tr>
                    </tbody>
                </table>
                <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 15 of 24 entries</div>
            </div>
        </div>
        <!-- End Table -->

        <!-- Footer -->
        <div class="card-footer">
            <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                        <span class="me-2">Showing:</span>

                        <!-- Select -->
                        <div class="tom-select-custom">
                            <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto tomselected ts-hidden-accessible" autocomplete="off" data-hs-tom-select-options="{
                            &quot;searchInDropdown&quot;: false,
                            &quot;hideSearch&quot;: true
                          }" tabindex="-1">
                                <option value="10">10</option>

                                <option value="20">20</option>
                                <option value="15" selected="">15</option>
                            </select>
                            <div class="ts-wrapper js-select form-select form-select-borderless w-auto single plugin-change_listener plugin-hs_smart_position input-hidden full has-items">
                                <div class="ts-control">
                                    <div data-value="15" class="item" data-ts-item="">15</div>
                                </div>
                                <div class="tom-select-custom">
                                    <div class="ts-dropdown single plugin-change_listener plugin-hs_smart_position" style="display: none;">
                                        <div role="listbox" tabindex="-1" class="ts-dropdown-content" id="datatableEntries-ts-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Select -->

                        <span class="text-secondary me-2">of</span>

                        <!-- Pagination Quantity -->
                        <span id="datatableWithPaginationInfoTotalQty">24</span>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <div class="d-flex justify-content-center justify-content-sm-end">
                        <!-- Pagination -->
                        <nav id="datatablePagination" aria-label="Activity pagination">
                            <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                <ul id="datatable_pagination" class="pagination datatable-custom-pagination">
                                    <li class="paginate_item page-item disabled"><a class="paginate_button previous page-link" aria-controls="datatable" data-dt-idx="0" tabindex="0" id="datatable_previous"><span aria-hidden="true">Prev</span></a></li>
                                    <li class="paginate_item page-item active"><a class="paginate_button page-link" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li>
                                    <li class="paginate_item page-item"><a class="paginate_button page-link" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li>
                                    <li class="paginate_item page-item"><a class="paginate_button next page-link" aria-controls="datatable" data-dt-idx="3" tabindex="0" id="datatable_next"><span aria-hidden="true">Next</span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Footer -->
    </div>
</div>
<script>
    var baseUrl = "{{ url('') }}";
    var JS_Categories = new JS_Categories(baseUrl, 'admin', 'categories');
    jQuery(document).ready(function() {
        JS_Categories.loadIndex();
    });
</script>
@endsection