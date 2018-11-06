$(document).ready(function () {
        
        oTable = $('#events_index').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            bRetrieve: true,
            "aaSorting": [[0,'desc']],
            sPaginationType: "full_numbers",
            ajax: window.base_url + '/admin/event/getData',
            sDom: "<'row'<'col-lg-6 custtom_filter'><'col-lg-3'l><'col-lg-3'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'rownum', name: 'id'},
                {data: 'title', name: 'title'},
                {
                  "data": "users.first_name", // can be null or undefined
                  "defaultContent": ""
                },
                //{data: 'users.first_name', name: 'users.first_name'},
                {data: 'status', name: 'status'},
                {data: 'id', name: 'id'},
            ],
            aoColumnDefs: [
                {
                    bSortable: false,
                    aTargets: [0]
                },
                {
                    bSortable: false,
                    aTargets: [5]
                }
            ],
            fnCreatedRow: function (nRow, aData, iDataIndex) {
                     
                $('td:eq(1)', nRow).css('text-align','center');
                $('td:eq(0)', nRow).html('<input type="checkbox" class="checkboxes data_remove" name="checkboxes[]" value="' + aData.id + '"/>');
                if(aData.status == '1'){
                    $('td:eq(4)', nRow).html("Active");
                }else if(aData.status == '2'){
                    $('td:eq(4)', nRow).html("Completed");
                }else if(aData.status == '3'){
                    $('td:eq(4)', nRow).html("Closed");
                }else if(aData.status == '4'){
                    $('td:eq(4)', nRow).html("Draft");
                }

                if(aData.users == null || aData.users.first_name=='undefined'){
                    $('td:eq(3)', nRow).html("-");
                }

                $('td:eq(5)', nRow).html(
                		'<a target="_blank" href="'+window.base_url+'/admin/event/experience/' + aData.id + '" class="btn btn-sm blue"><i class="fa fa-file-o"></i> Experience </a>'+
                        '<a href="'+window.base_url+'/admin/event/' + aData.id + '"><i class="fa fa-eye icon-muted fa-fw icon-space"></i></a>&nbsp &nbsp' +
                        '<a href="'+window.base_url+'/admin/event/' + aData.id + '/edit"><i class="fa icon-muted fa-pencil icon-space"></i></a>&nbsp &nbsp' +
                        '<a href="javascript:deleteEvent(' + aData.id + ');"><i class="fa icon-muted fa-times icon-space"></i></a>');
                $('td:eq(5)', nRow).css('text-align','center');
            },
            fnRowCallback: function (nRow, aData, iDisplayIndex) {
                $('td:eq(1)', nRow).html(iDisplayIndex + aData.rownum);
                nRow.setAttribute('id', "row_" + aData.id);
            }
        });
        $("div.custtom_filter").html('<div class="dataTables_length custom_filter_header"><select id="filter-user-sort" class="input-sm form-control input-s-sm inline v-middle custom-filter-select"><option value="">Select</option><option value="1">Delete Multiple</option></select><button onclick="bulk_actions()" id="bulk_act" class="btn btn-sm btn-default apply-btn">Apply</button></div>');
        
        $(".group-checkable").change(function () {
            $(".data_remove").prop('checked', $(this).prop("checked"));
        });
    });

    function deleteEvent(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            $.ajax({
                type: "GET",
                dataType:'json',
                url: '/admin/event/delete/' + id, //resource
                success: function (affectedRows) {
                    //console.log(affectedRows);return false;
                    if(affectedRows.status == '0'){ 
                        window.location = 'event'; 
                    }else if(affectedRows.status == '1'){
                        window.location = 'event';
                    } 
                }
            });
        }
    }

    function bulk_actions()          
    {
        var bulk_value = $('#filter-user-sort').val();
        
        if(bulk_value == 1)
        {
            var n = $( "input.data_remove:checked" ).length;
            if(n == 0)
            {
                alert('You did not check any record');
                return false;
            }
            var selected_row_array = [];
            $("input.data_remove:checked").each(function()
            {
                selected_row_array.push($(this).val());
            });
            var confirm_flag = confirm("Are you sure you want to delete selected record?");
            if(confirm_flag === true)
            {
                $.ajax({
                type: "GET",
                url: 'delete_multiple_Event/'+selected_row_array, 
                dataType: "html",
                success:function(result)
                    {       
                        if(result == 1)
                        {      
                            window.location = 'event';              
                        }
                    }
                });
            }
        }
        
    } 
