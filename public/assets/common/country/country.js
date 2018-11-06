 $(document).ready(function () {
 	
 		$("#country").validate({
	        ignore: [],
	        highlight: function (element) {
	            $(element).parent('div').addClass('has-error');
	        },
	        unhighlight: function (element) {
	            $(element).parent('div').removeClass('has-error');
	        },
	        errorElement: 'span',
	        errorClass: 'help-block help-block-error',
	        errorElement: 'div',
	        rules: {
	            name: {required: true}
	     },
	        messages: {
	            name: {required: "Please enter country name."}
	        },
	        errorPlacement: function (error, element) {         
	                error.insertAfter(element);           
	        },
	        success: function (element) {
	            $(element).parent('.form-group').removeClass('has-error');
	        },
    	});
 	
        oTable = $('#country_index').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            bRetrieve: true,
            sPaginationType: "full_numbers",
            "aaSorting": [[0, '']],
            ajax: window.base_url + '/admin/country/getData',
            sDom: "<'row'<'col-lg-6  custtom_filter'><'col-lg-3'l><'col-lg-3'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'rownum', name: 'rownum'},
                {data: 'name', name: 'name'},
                {data: 'status', name: 'status'},
                {data: 'id', name: 'id'}
            ],
            aoColumnDefs: [
                {
                    bSearchable: false,
                    bSortable: false,
                    aTargets: [0,3]
                },
            ],
            fnCreatedRow: function (nRow, aData, iDataIndex) {
                $('td:eq(4)', nRow).html(
                	
                        //'<a href="'+ window.base_url + '/admin/country/' + aData.id + '"><i class="fa fa-eye icon-muted fa-fw icon-space"></i></a>&nbsp &nbsp' +
                        '<a href="'+ window.base_url + '/admin/country/' + aData.id + '/edit"><i class="fa icon-muted fa-pencil icon-space"></i></a>&nbsp &nbsp' +
                        '<a href="javascript:deleteCountry(' + aData.id + ');"><i class="fa icon-muted fa-times icon-space"></i></a>');
            },
            fnRowCallback: function (nRow, aData, iDisplayIndex) {
                $('td:eq(0)', nRow).html('<input type="checkbox" class="checkboxes data_remove" name="checkboxes[]" value="' + aData.id + '"/>');
                $('td:eq(1)', nRow).css('text-align','center');
                $('td:eq(3)', nRow).css('text-align','center');
                $('td:eq(4)', nRow).css('text-align','center');
                //$('td:eq(0)', nRow).html(iDisplayIndex + 1);
                //nRow.setAttribute('id', "row_" + aData.id);
            }
        });
         $("div.custtom_filter").html('<div class="dataTables_length custom_filter_header"><select id="filter-user-sort" class="input-sm form-control input-s-sm inline v-middle custom-filter-select"><option value="">Select</option><option value="1">Delete Multiple</option></select><button onclick="bulk_actions()" id="bulk_act" class="btn btn-sm btn-default apply-btn">Apply</button></div>');
        
        $(".group-checkable").change(function () {
            $(".data_remove").prop('checked', $(this).prop("checked"));
        });
    });
	
	function deleteCountry(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            $.ajax({
                type: "GET",
                url: '/admin/country/delete/' + id, //resource
                success: function (affectedRows) {
                    //if something was deleted, we redirect the user to the users page, and automatically the user that he deleted will disappear
                    if (affectedRows > 0)
                    {
                        window.location = 'country';
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
                url: 'delete_multiple_Country/'+selected_row_array, 
                dataType: "html",
                success:function(result)
                    {       
                        if(result == 1)
                        {      
                            window.location = 'country';              
                        }
                    }
                });
            }
        }
        
    }  
   