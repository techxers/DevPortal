/*=========================================================================================
    File Name: app-user.js
    Description: User page JS
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(document).ready(function () {

    var isRtl;
    if ($('html').attr('data-textdirection') == 'rtl') {
        isRtl = true;
    } else {
        isRtl = false;
    }

    //  Rendering badge in status column
    var customBadgeHTML = function (params) {

        if (params.value == "active")
            return "<div class='badge badge-pill badge-primary' >" + params.value + "</div>";

        else
            return "<div class='badge bad  badge-pill badge-danger' >" + params.value + "</div>";
        };

        //  Rendering bullet in verified column
        var customBulletHTML = function (params) {
            var color = "";
            if (params.value == true) {
                color = "success"
                return "<div class='bullet bullet-sm bullet-" + color + "' >" + "</div>"
            } else if (params.value == false) {
                color = "secondary";
                return "<div class='bullet bullet-sm bullet-" + color + "' >" + "</div>"
            }
        }

        // Renering Icons in Actions column
        var customIconsHTML = function (params) {
            var usersIcons = document.createElement("span");
            var editIconHTML = "<a href='editStaff?id=" + params.value + "'><i class='users-edit-icon feather icon-edit-1 mr-50'></i></a>"
            var deleteIconHTML = document.createElement('i');
            var attr = document.createAttribute("class")
            attr.value = "users-delete-icon feather icon-trash-2"
            deleteIconHTML.setAttributeNode(attr);
            // selected row delete functionality
            deleteIconHTML.addEventListener("click", function () {
                    deleteArr = [
                        params.data
                    ];

                    Swal.fire({
                        title: 'Remove user ' + deleteArr[0].name + '?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete!',
                        confirmButtonClass: 'btn btn-primary',
                        cancelButtonClass: 'btn btn-danger ml-1',
                        buttonsStyling: false,
                    }).then(function (result) {
                        if (result.value) {
                            $.get('staff/delete?id=' + deleteArr[0].id, function (data, status) {
                                    if (data === '1' && status === 'success') {
                                        Swal.fire({
                                            type: "success",
                                            title: 'Deleted!',
                                            text: deleteArr[0].name + ' has been deleted',
                                            confirmButtonClass: 'btn btn-success',
                                        });
                                        // var selectedData = gridOptions.api.getSelectedRows();
                                        gridOptions.api.updateRowData({
                                            remove: deleteArr
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "Error!",
                                            text: " Unknown error has occurred",
                                            type: "error",
                                            confirmButtonClass: 'btn btn-primary',
                                            buttonsStyling: false,
                                        });
                                    }
                                }
                            );

                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire({
                                title: 'Cancelled',
                                text: 'Staff deletion cancelled!',
                                type: 'error',
                                confirmButtonClass: 'btn btn-success',
                            })
                        }
                    });


                }
            );
            usersIcons.appendChild($.parseHTML(editIconHTML)[0]);
            usersIcons.appendChild(deleteIconHTML);
            return usersIcons
        }

//  Rendering avatar in username column
        var customAvatarHTML = function (params) {
            return "<span class='avatar'><img src='" + params.data.avatar + "' height='32' width='32'></span>" + params.value
        }

// ag-grid
        /*** COLUMN DEFINE ***/

        var columnDefs = [{
            headerName: 'ID',
            field: 'id',
            width: 125,
            filter: true,
        },
            {
                headerName: 'Name',
                field: 'name',
                filter: true,
                width: 200,
                cellRenderer: customAvatarHTML,
            },
            {
                headerName: 'Email',
                field: 'email',
                filter: true,
                width: 225,
            },

            {
                headerName: 'Role',
                field: 'role',
                filter: true,
                width: 150,
            },
            {
                headerName: 'Status',
                field: 'status',
                filter: true,
                width: 150,
                cellRenderer: customBadgeHTML,
                cellStyle: {
                    "text-align": "center"
                }
            },
            {
                headerName: 'Verified',
                field: 'is_verified',
                filter: true,
                width: 125,
                cellRenderer: customBulletHTML,
                cellStyle: {
                    "text-align": "center"
                }
            },
            {
                headerName: 'Actions',
                field: 'id',
                width: 150,
                cellRenderer: customIconsHTML,
            }
        ];

        /*** GRID OPTIONS ***/
        var gridOptions = {
            defaultColDef: {
                sortable: true
            },
            enableRtl: isRtl,
            columnDefs: columnDefs,
            rowSelection: "multiple",
            floatingFilter: true,
            filter: true,
            pagination: true,
            paginationPageSize: 20,
            pivotPanelShow: "always",
            colResizeDefault: "shift",
            animateRows: true,
            resizable: true
        };
        if (document.getElementById("myGrid")) {
            /*** DEFINED TABLE VARIABLE ***/
            var gridTable = document.getElementById("myGrid");

            /*** GET TABLE DATA FROM URL ***/
            agGrid
                .simpleHttpRequest({
                    url: ""+document.getElementById('urlFetchStaffs').href+""
                })
                .then(function (data) {
                    console.log(data);
                    gridOptions.api.setRowData(data);
                });

            /*** FILTER TABLE ***/
            function updateSearchQuery(val) {
                gridOptions.api.setQuickFilter(val);
            }

            $(".ag-grid-filter").on("keyup", function () {
                updateSearchQuery($(this).val());
            });

            /*** CHANGE DATA PER PAGE ***/
            function changePageSize(value) {
                gridOptions.api.paginationSetPageSize(Number(value));
            }

            $(".sort-dropdown .dropdown-item").on("click", function () {
                var $this = $(this);
                changePageSize($this.text());
                $(".filter-btn").text("1 - " + $this.text() + " of 50");
            });

            /*** EXPORT AS CSV BTN ***/
            $(".ag-grid-export-btn").on("click", function (params) {
                gridOptions.api.exportDataAsCsv();
            });

            //  filter data function
            var filterData = function agSetColumnFilter(column, val) {
                var filter = gridOptions.api.getFilterInstance(column)
                var modelObj = null
                if (val !== "all") {
                    modelObj = {
                        type: "equals",
                        filter: val
                    }
                }
                filter.setModel(modelObj)
                gridOptions.api.onFilterChanged()
            }
            //  filter inside role
            $("#users-list-role").on("change", function () {
                var usersListRole = $("#users-list-role").val();
                filterData("role", usersListRole)
            });
            //  filter inside verified
            $("#users-list-verified").on("change", function () {
                var usersListVerified = $("#users-list-verified").val();
                filterData("is_verified", usersListVerified)
            });
            //  filter inside status
            $("#users-list-status").on("change", function () {
                var usersListStatus = $("#users-list-status").val();
                filterData("status", usersListStatus)
            });
            //  filter inside department
            $("#users-list-department").on("change", function () {
                var usersListDepartment = $("#users-list-department").val();
                filterData("department", usersListDepartment)
            });
            // filter reset
            $(".users-data-filter").click(function () {
                $('#users-list-role').prop('selectedIndex', 0);
                $('#users-list-role').change();
                $('#users-list-status').prop('selectedIndex', 0);
                $('#users-list-status').change();
                $('#users-list-verified').prop('selectedIndex', 0);
                $('#users-list-verified').change();
                $('#users-list-department').prop('selectedIndex', 0);
                $('#users-list-department').change();
            });

            /*** INIT TABLE ***/
            new agGrid.Grid(gridTable, gridOptions);
        }
// users language select
        if ($("#users-language-select2").length > 0) {
            $("#users-language-select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });
        }
// users music select
        if ($("#users-music-select2").length > 0) {
            $("#users-music-select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });
        }
// users movies select
        if ($("#users-movies-select2").length > 0) {
            $("#users-movies-select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });
        }
// users birthdate date
        if ($(".birthdate-picker").length > 0) {
            $('.birthdate-picker').pickadate({
                format: 'mmmm, d, yyyy'
            });
        }
// Input, Select, Textarea validations except submit button validation initialization
        if ($(".users-edit").length > 0) {
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        }
    }
)
;
