@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row"> 
                        <div class="col-md-6">
							<div class="btn-group">
                                <a href="{{url('/admin/state/create')}}" id="sample_editable_1_new" class="btn sbold green"> <i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                    </div>
                </div>
                @include('errors.common_errors')
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="state_index">
                    <thead>
                        <tr>
                            <th style="width: 10px;">
                                <input type="checkbox" class="group-checkable" data-set="#beta_cms_index .checkboxes" /> 
                            </th>
                            <th style="width: 5px;"> Sr. No. </th>
                            <th style="width: 200px;"> State Name </th>
                            <th style="width: 200px;"> Country Name </th>
                            <th style="text-align:center;width: 200px;"> Status </th>
                            <th style="text-align:center;width: 200px;"> Actions </th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

{{Html::script("/assets/common/state/state.js")}}

@endsection