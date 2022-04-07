@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{route('admin.calculator.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        <span class="form-button">
			<a href="{{ route('admin.calculator.index') }}" class="btn btn-secondary pull-right">Back</a>
			<button type="submit" class="btn btn-success pull-right create">Create</button>
		</span>
        @include('layouts.session')
      	<!-- Default box -->
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product</label>
                    <div class="col-sm-10">
                        <select name="product_id"  class="form-control" style="width: 100%;" id="product">
                            <option selected value="0">Select Product</option>
                            @foreach ($products as $item)
                            <option value="{{$item->id}}" {{(int)old('product_id') === $item->id ? 'selected' : '' }}>{{$item->title}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('product_id') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Select Package List</label>
                    <div class="col-sm-10">
                        <select name="package_id" class="form-control" style="width: 100%;" id="package" disabled>
                            <option selected value="0" disabled>Select Package</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('package_id') }}</span>
                    </div>
                </div>

      		</div>
      		<!-- /.card-body -->
      	</div>

        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Component</h3>
            </div>
            <div class="card-body" id="component-wrapper">
                @if (old('component'))
                    @foreach (old('component') as $keyComponent => $component)
                    <div class="card card-default border border-dark component">
                        <div class="card-header border-0 p-0 m-0">
                            <button type="button" class="delete-component btn btn-danger float-right" data-index="0">X</button>
                            <button type="button" class="move-component btn btn-info float-right mr-2" data-index="down"><i class="fa fa-arrow-down"></i></button>
                            <button type="button" class="move-component btn btn-info float-right mr-2" data-index="up"><i class="fa fa-arrow-up"></i></button>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Component</label>
                                <div class="col-sm-10">
                                    <select name="component[{{$keyComponent}}][calculator_component_id]"  class="form-control calculator_component_id" style="width: 100%;">
                                    <option selected value="0" value="0">Select Component</option>
                                        @foreach ($components as $item)
                                        <option value="{{$item->id}}" {{(isset($component['calculator_component_id']) ? (int)$component['calculator_component_id'] : 0) === $item->id ?'selected':''}}>{{$item->title}} {{$item->unit ? '('.$item->unit.')': ''}} {{$item->parentComponent ? '('.$item->parentComponent->title.')' : ''}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-10">
                                    <div class="card card-default">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Pay as You Use</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control pay-as-you-use" placeholder="0" value="{{ $component['price']['pay-as-you-use'] ?? 0}}" name="component[{{$keyComponent}}][price][pay-as-you-use]">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Monthly</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control monthly" placeholder="0" value="{{ $component['price']['monthly'] ?? 0}}" name="component[{{$keyComponent}}][price][monthly]">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">1-year</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control 1-year" placeholder="0" value="{{ $component['price']['1-year'] ?? 0}}" name="component[{{$keyComponent}}][price][1-year]">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">3-year</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control 3-year" placeholder="0" value="{{ $component['price']['3-year'] ?? 0}}" name="component[{{$keyComponent}}][price][3-year]">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">5-year</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control 5-year" placeholder="0" value="{{ $component['price']['5-year'] ?? 0}}" name="component[{{$keyComponent}}][price][5-year]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Rules</label>
                                <div class="col-sm-10">
                                    <div class="card card-default">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Min</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control rule_min_value" placeholder="0" value="{{ $component['rule_min_value'] }}" name="component[{{$keyComponent}}][rule_min_value]">
                                                    <span class="text-danger">{{ $errors->first('component.rule_min_value') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Max</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control rule_max_value" placeholder="0" value="{{ $component['rule_max_value']}}" name="component[{{$keyComponent}}][rule_max_value]">
                                                    <span class="text-danger">{{ $errors->first('component.rule_max_value') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Must be even</label>
                                                <div class="col-sm-10">
                                                    <select name="component[{{$keyComponent}}][rule_must_be_even]" class="form-control rule_must_be_even" style="width: 100%;">
                                                        <option selected value="0">Select Must be even</option>
                                                        <option value="1"{{(isset($component['rule_must_be_even']) ? (int)$component['rule_must_be_even'] : 0) === 1 ?'selected':''}}>True</option>
                                                        <option value="0"{{(isset($component['rule_must_be_even']) ? (int)$component['rule_must_be_even'] : 0) === 0 ?'selected':''}}>False</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Editable</label>
                                                <div class="col-sm-10">
                                                    <select name="component[{{$keyComponent}}][rule_editable]" class="form-control rule_editable" style="width: 100%;">
                                                        <option selected value="0">Select Editable</option>
                                                        <option value="1"{{(isset($component['rule_editable']) ? (int)$component['rule_editable'] : 0) === 1 ?'selected':''}}>True</option>
                                                        <option value="0"{{(isset($component['rule_editable']) ? (int)$component['rule_editable'] : 0) === 0 ?'selected':''}}>False</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Display Mode</label>
                                                <div class="col-sm-10">
                                                    <select name="component[{{$keyComponent}}][display_mode]" class="form-control display_mode" style="width: 100%;">
                                                        <option selected value="">Select Display mode</option>
                                                        <option value="50%"{{(isset($component['display_mode']) ? $component['display_mode'] : '') === '50%' ?'selected':''}}>50%</option>
                                                        <option value="100%"{{(isset($component['display_mode']) ? $component['display_mode'] : '') === '100%' ?'selected':''}}>100%</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Visible</label>
                                                <div class="col-sm-10">
                                                    <select name="component[{{$keyComponent}}][visible]" class="form-control rule_visible" style="width: 100%;">
                                                        <option selected value="0">Select Visible</option>
                                                        <option value="1"{{(isset($component['visible']) ? (int)$component['visible'] : 0) === 1 ?'selected':''}}>True</option>
                                                        <option value="0"{{(isset($component['visible']) ? (int)$component['visible'] : 0) === 0 ?'selected':''}}>False</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Other Rules</label>
                                <div class="col-sm-10">
                                    <div class="card card-default">
                                        <div class="card-body other-rules-wrapper" id="other-rules-wrapper-{{$keyComponent}}">
                                            @foreach ($component['other_rules'] as $keyRule => $other_rule)
                                                <div class="card card-default other-rules">
                                                    <div class="card-header border-0 p-0 m-0">
                                                        <button type="button" class="delete-other-rules btn btn-danger float-right" data-index="0">X</button>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 control-label">Component</label>
                                                            <div class="col-sm-10">
                                                                <select name="component[{{$keyComponent}}][other_rules][{{$keyRule}}][slug]"  class="form-control other_rules_slug" style="width: 100%;">
                                                                <option selected value="0">Select Component</option>
                                                                    @foreach ($components as $item)
                                                                    <option value="{{$item->slug}}" {{$other_rule['slug'] === $item->slug ? 'selected':''}}>{{$item->title}} {{$item->unit ? '('.$item->unit.')': ''}} {{$item->parentComponent ? '('.$item->parentComponent->title.')' : ''}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 control-label">Value</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control other_rules_value" placeholder="Value" name="component[{{$keyComponent}}][other_rules][{{$keyRule}}][value]" value="{{$other_rule['value']}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="card-footer with-border">
                                            <a href="javascript:void(0)" class="btn btn-info add_other_rules" style="float: right;" data-component_id="{{$keyComponent}}">Add Other Rules</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Pricing Impact Rules</label>
                                <div class="col-sm-10">
                                    <div class="card card-default">
                                        <div class="card-body pricing-impact-rules-wrapper" id="pricing-impact-rules-wrapper-{{$keyComponent}}">
                                            @foreach ($component['pricing_impact_rules'] as $keyPricingImpactRule => $pricing_impact_rule)
                                            <div class="card card-default pricing-impact-rules">
                                                <div class="card-header border-0 p-0 m-0">
                                                    <button type="button" class="delete-pricing-impact-rules btn btn-danger float-right" data-index="0">X</button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Component</label>
                                                        <div class="col-sm-10">
                                                            <select name="component[{{$keyComponent}}][pricing_impact_rules][{{$keyPricingImpactRule}}][slug]"  class="form-control pricing-impact-rules-slug" style="width: 100%;">
                                                            <option selected value="0">Select Component</option>
                                                                @foreach ($components as $item)
                                                                <option value="{{$item->slug}}" {{($pricing_impact_rule['slug']) === $item->slug ? 'selected' : ''}}>{{$item->title}} {{$item->unit ? '('.$item->unit.')': ''}} {{$item->parentComponent ? '('.$item->parentComponent->title.')' : ''}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Value</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control pricing-impact-rules-value" placeholder="Value" value="{{$pricing_impact_rule['value'] ?? null}}" name="component[{{$keyComponent}}][pricing_impact_rules][{{$keyPricingImpactRule}}][value]">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Action</label>
                                                        <div class="col-sm-10">
                                                            <div class="card card-default">
                                                                <div class="card-body pricing-impact-rules-action-wrapper" id="pricing-impact-rules-action-wrapper-{{$keyComponent}}-{{$keyPricingImpactRule}}">
                                                                @foreach ($pricing_impact_rule['action'] as $keyAction => $action)

                                                                    <div class="card card-default pricing-impact-rules-action">
                                                                        <div class="card-header border-0 p-0 m-0">
                                                                            <button type="button" class="delete-pricing-impact-rules-action btn btn-danger float-right" data-index="0">X</button>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <label for="inputEmail3" class="col-sm-2 control-label">Operation</label>
                                                                                <div class="col-sm-10">
                                                                                    <select name="component[{{$keyComponent}}][pricing_impact_rules][{{$keyPricingImpactRule}}][action][{{$keyAction}}][operation]"  class="form-control pricing-impact-rules-action-operation" style="width: 100%;">
                                                                                        <option value="null">Select Operator</option>
                                                                                        <option value="addition" {{$action['operation'] === 'addition' ? 'selected':'' }}>Addition</option>
                                                                                        <option value="subtraction" {{$action['operation'] === 'subtraction' ? 'selected':'' }}>Subtraction</option>
                                                                                        <option value="multiplication" {{$action['operation'] === 'multiplication' ? 'selected':'' }}>Multiplication</option>
                                                                                        <option value="division" {{$action['operation'] === 'division' ? 'selected':'' }}>Division</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="inputEmail3" class="col-sm-2 control-label">Value</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="number" class="form-control pricing-impact-rules-action-value" placeholder="Value" value="{{$action['operation_value']}}" name="component[{{$keyComponent}}][pricing_impact_rules][{{$keyPricingImpactRule}}][action][{{$keyAction}}][operation_value]">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                @endforeach
                                                                </div>
                                                                <div class="card-footer with-border">
                                                                    <a href="javascript:void(0)" class="btn btn-info add_pricing_impact_rules_action" style="float: right;" data-component_id="{{$keyComponent}}" data-pricing_impact_rule_id="{{$keyPricingImpactRule}}">Add Other Action</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="card-footer with-border">
                                            <a href="javascript:void(0)" class="btn btn-info add_pricing_impact_rules" style="float: right;" data-component_id="{{$keyComponent}}">Add Pricing Impact Rules</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- /.card-body -->

                    </div>
                    @endforeach
                @else
                    <div class="card card-default border border-dark component">
                        <div class="card-header border-0 p-0 m-0">
                            <button type="button" class="delete-component btn btn-danger float-right" data-index="0">X</button>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Component</label>
                                <div class="col-sm-10">
                                    <select name="component[0][calculator_component_id]" class="form-control calculator_component_id" style="width: 100%;">
                                    <option selected value="0">Select Component</option>
                                        @foreach ($components as $item)
                                        <option value="{{$item->id}}">{{$item->title}} {{$item->unit ? '('.$item->unit.')': ''}} {{$item->parentComponent ? '('.$item->parentComponent->title.')' : ''}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-10">
                                    <div class="card card-default">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Pay as You Use</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control pay-as-you-use" placeholder="0" value="0" name="component[0][price][pay-as-you-use]">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Monthly</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control monthly" placeholder="0" value="0" name="component[0][price][monthly]">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">1-year</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control 1-year" placeholder="0" value="0" name="component[0][price][1-year]">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">3-year</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control 3-year" placeholder="0" value="0" name="component[0][price][3-year]">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">5-year</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control 5-year" placeholder="0" value="0" name="component[0][price][5-year]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Rules</label>
                                <div class="col-sm-10">
                                    <div class="card card-default">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Min</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control rule_min_value" placeholder="0" name="component[0][rule_min_value]">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Max</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control rule_max_value" placeholder="0" name="component[0][rule_max_value]">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Must be even</label>
                                                <div class="col-sm-10">
                                                    <select name="component[0][rule_must_be_even]" class="form-control rule_must_be_even" style="width: 100%;">
                                                        <option selected value="0">Select Must be even</option>
                                                        <option value="1">True</option>
                                                        <option value="0">False</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Editable</label>
                                                <div class="col-sm-10">
                                                    <select name="component[0][rule_editable]" class="form-control rule_editable" style="width: 100%;">
                                                        <option selected value="0">Select Editable</option>
                                                        <option value="1">True</option>
                                                        <option value="0">False</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Display Mode</label>
                                                <div class="col-sm-10">
                                                    <select name="component[0][display_mode]" class="form-control display_mode" style="width: 100%;">
                                                        <option selected value="">Select Display mode</option>
                                                        <option value="50%">50%</option>
                                                        <option value="100%">100%</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Visible</label>
                                                <div class="col-sm-10">
                                                    <select name="component[0][visible]" class="form-control rule_visible" style="width: 100%;">
                                                        <option selected value="0">Select Visible</option>
                                                        <option value="1">True</option>
                                                        <option value="0">False</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Other Rules</label>
                                <div class="col-sm-10">
                                    <div class="card card-default">
                                        <div class="card-body other-rules-wrapper" id="other-rules-wrapper-0">
                                            <div class="card card-default other-rules">
                                                <div class="card-header border-0 p-0 m-0">
                                                    <button type="button" class="delete-other-rules btn btn-danger float-right" data-index="0">X</button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Component</label>
                                                        <div class="col-sm-10">
                                                            <select name="component[0][other_rules][0][slug]"  class="form-control other_rules_slug" style="width: 100%;">
                                                            <option selected value="0">Select Component</option>
                                                                @foreach ($components as $item)
                                                                <option value="{{$item->slug}}">{{$item->title}} {{$item->unit ? '('.$item->unit.')': ''}} {{$item->parentComponent ? '('.$item->parentComponent->title.')' : ''}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Value</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control other_rules_value" placeholder="Value" name="component[0][other_rules][0][value]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer with-border">
                                            <a href="javascript:void(0)" class="btn btn-info add_other_rules" style="float: right;" data-component_id="0">Add Other Rules</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Pricing Impact Rules</label>
                                <div class="col-sm-10">
                                    <div class="card card-default">
                                        <div class="card-body pricing-impact-rules-wrapper" id="pricing-impact-rules-wrapper-0">
                                            <div class="card card-default pricing-impact-rules">
                                                <div class="card-header border-0 p-0 m-0">
                                                    <button type="button" class="delete-pricing-impact-rules btn btn-danger float-right" data-index="0">X</button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Component</label>
                                                        <div class="col-sm-10">
                                                            <select name="component[0][pricing_impact_rules][0][slug]"  class="form-control pricing-impact-rules-slug" style="width: 100%;">
                                                            <option selected value="0">Select Component</option>
                                                                @foreach ($components as $item)
                                                                <option value="{{$item->slug}}">{{$item->title}} {{$item->unit ? '('.$item->unit.')': ''}} {{$item->parentComponent ? '('.$item->parentComponent->title.')' : ''}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Value</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control pricing-impact-rules-value" placeholder="Value" name="component[0][pricing_impact_rules][0][value]">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Action</label>
                                                        <div class="col-sm-10">
                                                            <div class="card card-default">
                                                                <div class="card-body pricing-impact-rules-action-wrapper" id="pricing-impact-rules-action-wrapper-0-0">
                                                                    <div class="card card-default pricing-impact-rules-action">
                                                                        <div class="card-header border-0 p-0 m-0">
                                                                            <button type="button" class="delete-pricing-impact-rules-action btn btn-danger float-right" data-index="0">X</button>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <label for="inputEmail3" class="col-sm-2 control-label">Operation</label>
                                                                                <div class="col-sm-10">
                                                                                    <select name="component[0][pricing_impact_rules][0][action][0][operation]"  class="form-control pricing-impact-rules-action-operation" style="width: 100%;">
                                                                                        <option selected value="null">Select Operator</option>
                                                                                        <option value="addition">Addition</option>
                                                                                        <option value="subtraction">Subtraction</option>
                                                                                        <option value="multiplication">Multiplication</option>
                                                                                        <option value="division">Division</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="inputEmail3" class="col-sm-2 control-label">Value</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="number" class="form-control pricing-impact-rules-action-value" placeholder="Value" name="component[0][pricing_impact_rules][0][action][0][operation_value]">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer with-border">
                                                                    <a href="javascript:void(0)" class="btn btn-info add_pricing_impact_rules_action" style="float: right;" data-component_id="0" data-pricing_impact_rule_id="0">Add Other Action</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer with-border">
                                            <a href="javascript:void(0)" class="btn btn-info add_pricing_impact_rules" style="float: right;" data-component_id="0">Add Pricing Impact Rules</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- /.card-body -->

                    </div>

                @endif
            </div>
            <div class="card-footer">
                <a href="javascript:void(0)" class="btn btn-info" id="add_component" style="float: right;">Add Component</a>
            </div>
                <!-- /.card-body -->

        </div>
      	<!-- /.box -->
	</form>
    <!-- /.card-body -->
<!-- /.box -->
@stop

@push('js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var component = {!! json_encode($components->toArray()) !!};
            var select_component = mappingSelect(component);
            var select_component_by_slug = mappingSelectBySlug(component);
            var product_id = {!! old('product_id',0) !!}
            var package_id = {!! old('package_id',0) !!}
            if (product_id && package_id) {
                ajaxPackage(product_id,package_id)
            }
            let components = $(".component").length;
            let other_rules = $(".other-rules").length;
            let pricing_impact_rules = $(".pricing-impact-rules").length;
            let pricing_impact_rules_action = $(".pricing-impact-rules-action").length;
            $("#add_component").click(function(){
                let html = '<div class="card card-default border border-dark component">'
                            +'<div class="card-header border-0 p-0 m-0">'
                            +'    <button type="button" class="delete-component btn btn-danger float-right" data-index="0">X</button>'
                            +'    <button type="button" class="move-component btn btn-info float-right mr-2" data-index="down"><i class="fa fa-arrow-down"></i></button>'
                            +'    <button type="button" class="move-component btn btn-info float-right mr-2" data-index="up"><i class="fa fa-arrow-up"></i></button>'
                            +'</div>'
                            +'<div class="card-body">'
                            +'    <div class="form-group row">'
                            +'        <label for="inputEmail3" class="col-sm-2 control-label">Component</label>'
                            +'        <div class="col-sm-10">'
                            +'            <select class="form-control calculator_component_id" style="width: 100%;" name="component['+components+'][calculator_component_id]">'
                            +'                <option selected value="0">Select Component</option>'
                            +                   select_component
                            +'            </select>'
                            +'        </div>'
                            +'    </div>'
                            +'    <div class="form-group row">'
                            +'      <label for="inputEmail3" class="col-sm-2 control-label">Price</label>'
                            +'      <div class="col-sm-10">'
                            +'          <div class="card card-default">'
                            +'              <div class="card-body">'
                            +'                  <div class="form-group row">'
                            +'                      <label for="inputEmail3" class="col-sm-2 control-label">Pay as You Use</label>'
                            +'                      <div class="col-sm-10">'
                            +'                          <input type="number" class="form-control pay-as-you-use" placeholder="0" value="0" name="component['+components+'][price][pay-as-you-use]">'
                            +'                      </div>'
                            +'                  </div>'
                            +'                  <div class="form-group row">'
                            +'                      <label for="inputEmail3" class="col-sm-2 control-label">Monthly</label>'
                            +'                      <div class="col-sm-10">'
                            +'                          <input type="number" class="form-control monthly" placeholder="0" value="0" name="component['+components+'][price][monthly]">'
                            +'                      </div>'
                            +'                  </div>'
                            +'                  <div class="form-group row">'
                            +'                      <label for="inputEmail3" class="col-sm-2 control-label">1-year</label>'
                            +'                      <div class="col-sm-10">'
                            +'                          <input type="number" class="form-control 1-year" placeholder="0" value="0" name="component['+components+'][price][1-year]">'
                            +'                      </div>'
                            +'                  </div>'
                            +'                  <div class="form-group row">'
                            +'                      <label for="inputEmail3" class="col-sm-2 control-label">3-year</label>'
                            +'                      <div class="col-sm-10">'
                            +'                          <input type="number" class="form-control 3-year" placeholder="0" value="0" name="component['+components+'][price][3-year]">'
                            +'                      </div>'
                            +'                  </div>'
                            +'                  <div class="form-group row">'
                            +'                      <label for="inputEmail3" class="col-sm-2 control-label">5-year</label>'
                            +'                      <div class="col-sm-10">'
                            +'                          <input type="number" class="form-control 5-year" placeholder="0" value="0" name="component['+components+'][price][5-year]">'
                            +'                      </div>'
                            +'                  </div>'
                            +'              </div>'
                            +'          </div>'
                            +'      </div>'
                            +'  </div>'
                            +'    <div class="form-group row">'
                            +'        <label for="inputEmail3" class="col-sm-2 control-label">Rules</label>'
                            +'        <div class="col-sm-10">'
                            +'            <div class="card card-default">'
                            +'                <div class="card-body">'
                            +'                    <div class="form-group row">'
                            +'                        <label for="inputEmail3" class="col-sm-2 control-label">Min</label>'
                            +'                        <div class="col-sm-10">'
                            +'                            <input type="number" class="form-control rule_min_value" placeholder="0" name="component['+components+'][rule_min_value]">'
                            +'                        </div>'
                            +'                    </div>'
                            +'                    <div class="form-group row">'
                            +'                        <label for="inputEmail3" class="col-sm-2 control-label">Max</label>'
                            +'                        <div class="col-sm-10">'
                            +'                            <input type="number" class="form-control rule_max_value" placeholder="0" name="component['+components+'][rule_max_value]">'
                            +'                        </div>'
                            +'                    </div>'
                            +'                    <div class="form-group row">'
                            +'                        <label for="inputEmail3" class="col-sm-2 control-label">Must be even</label>'
                            +'                        <div class="col-sm-10">'
                            +'                            <select name="component['+components+'][rule_must_be_even]" class="form-control rule_must_be_even" style="width: 100%;">'
                            +'                                <option selected value="0">Select Must be even</option>'
                            +'                                <option value="1">True</option>'
                            +'                                <option value="0">False</option>'
                            +'                            </select>'
                            +'                        </div>'
                            +'                    </div>'
                            +'                    <div class="form-group row">'
                            +'                        <label for="inputEmail3" class="col-sm-2 control-label">Editable</label>'
                            +'                        <div class="col-sm-10">'
                            +'                            <select name="component['+components+'][rule_editable]" class="form-control rule_editable" style="width: 100%;">'
                            +'                                <option selected value="0">Select Editable</option>'
                            +'                                <option value="1">True</option>'
                            +'                                <option value="0">False</option>'
                            +'                            </select>'
                            +'                        </div>'
                            +'                    </div>'
                            +'                    <div class="form-group row">'
                            +'                        <label for="inputEmail3" class="col-sm-2 control-label">Display Mode</label>'
                            +'                        <div class="col-sm-10">'
                            +'                            <select name="component['+components+'][display_mode]" class="form-control display_mode" style="width: 100%;">'
                            +'                                <option selected value="">Select Display mode</option>'
                            +'                                <option value="50%">50%</option>'
                            +'                                <option value="100%">100%</option>'
                            +'                            </select>'
                            +'                        </div>'
                            +'                    </div>'
                            +'                    <div class="form-group row">'
                            +'                        <label for="inputEmail3" class="col-sm-2 control-label">Visible</label>'
                            +'                        <div class="col-sm-10">'
                            +'                            <select name="component['+components+'][visible]" class="form-control rule_visible" style="width: 100%;">'
                            +'                                <option selected value="0">Select Visible</option>'
                            +'                                <option value="1">True</option>'
                            +'                                <option value="0">False</option>'
                            +'                            </select>'
                            +'                        </div>'
                            +'                    </div>'
                            +'                </div>'
                            +'            </div>'
                            +'        </div>'
                            +'    </div>'
                            +'<div class="form-group row">'
                            +'    <label for="inputEmail3" class="col-sm-2 control-label">Other Rules</label>'
                            +'    <div class="col-sm-10">'
                            +'    <div class="card card-default">'
                            +'            <div class="card-body other-rules-wrapper" id="other-rules-wrapper-'+components+'">'
                            +'                <div class="card card-default other-rules">'
                            +'                    <div class="card-header border-0 p-0 m-0">'
                            +'                        <button type="button" class="delete-other-rules btn btn-danger float-right" data-index="0">X</button>'
                            +'                    </div>'
                            +'                    <div class="card-body">'
                            +'                        <div class="form-group row">'
                            +'                            <label for="inputEmail3" class="col-sm-2 control-label">Component</label>'
                            +'                            <div class="col-sm-10">'
                            +'                                <select name="component['+components+'][other_rules][0][slug]"  class="form-control other_rules_slug" style="width: 100%;">'
                            +'                                <option selected value="0">Select Component</option>'
                            +                                   select_component_by_slug
                            +'                                </select>'
                            +'                            </div>'
                            +'                        </div>'
                            +'                        <div class="form-group row">'
                            +'                            <label for="inputEmail3" class="col-sm-2 control-label">Value</label>'
                            +'                            <div class="col-sm-10">'
                            +'                                <input type="text" class="form-control other_rules_value" placeholder="Value" name="component['+components+'][other_rules][0][value]">'
                            +'                            </div>'
                            +'                        </div>'
                            +'                    </div>'
                            +'                </div>'
                            +'            </div>'
                            +'            <div class="card-footer with-border">'
                            +'                <a href="javascript:void(0)" class="btn btn-info add_other_rules" style="float: right;" data-component_id="'+components+'">Add Other Rules</a>'
                            +'            </div>'
                            +'        </div>'
                            +'    </div>'
                            +'</div>'
                            +'<div class="form-group row">'
                            +'        <label for="inputEmail3" class="col-sm-2 control-label">Pricing Impact Rules</label>'
                            +'        <div class="col-sm-10">'
                            +'            <div class="card card-default">'
                            +'                <div class="card-body pricing-impact-rules-wrapper" id="pricing-impact-rules-wrapper-'+components+'">'
                            +'                      <div class="card card-default pricing-impact-rules">'
                            +'                          <div class="card-header border-0 p-0 m-0">'
                            +'                              <button type="button" class="delete-pricing-impact-rules btn btn-danger float-right" data-index="0">X</button>'
                            +'                          </div>'
                            +'                          <div class="card-body">'
                            +'                              <div class="form-group row">'
                            +'                                  <label for="inputEmail3" class="col-sm-2 control-label">Component</label>'
                            +'                                  <div class="col-sm-10">'
                            +'                                      <select name="component['+components+'][pricing_impact_rules][0][slug]"  class="form-control pricing-impact-rules-slug" style="width: 100%;">'
                            +'                                      <option selected value="0">Select Component</option>'
                            +                                           select_component_by_slug
                            +'                                      </select>'
                            +'                                  </div>'
                            +'                              </div>'
                            +'                              <div class="form-group row">'
                            +'                                  <label for="inputEmail3" class="col-sm-2 control-label">Value</label>'
                            +'                                  <div class="col-sm-10">'
                            +'                                      <input type="text" class="form-control pricing-impact-value" placeholder="Value" name="component['+components+'][pricing_impact_rules][0][value]">'
                            +'                                  </div>'
                            +'                              </div>'
                            +'                              <div class="form-group row">'
                            +'                                  <label for="inputEmail3" class="col-sm-2 control-label">Action</label>'
                            +'                                  <div class="col-sm-10">'
                            +'                                      <div class="card card-default">'
                            +'                                          <div class="card-body pricing-impact-rules-action-wrapper" id="pricing-impact-rules-action-wrapper-'+components+'-0">'
                            +'                                              <div class="card card-default pricing-impact-rules-action">'
                            +'                                                  <div class="card-header border-0 p-0 m-0">'
                            +'                                                      <button type="button" class="delete-pricing-impact-rules-action btn btn-danger float-right" data-index="0">X</button>'
                            +'                                                  </div>'
                            +'                                                  <div class="card-body">'
                            +'                                                      <div class="form-group row">'
                            +'                                                          <label for="inputEmail3" class="col-sm-2 control-label">Operation</label>'
                            +'                                                          <div class="col-sm-10">'
                            +'                                                              <select name="component['+components+'][pricing_impact_rules][0][action][0][operation]"  class="form-control pricing-impact-rules-action-operation" style="width: 100%;">'
                            +'                                                                  <option selected value="null">Select Operator</option>'
                            +'                                                                  <option value="addition">Addition</option>'
                            +'                                                                  <option value="subtraction">Subtraction</option>'
                            +'                                                                  <option value="multiplication">Multiplication</option>'
                            +'                                                                  <option value="division">Division</option>'
                            +'                                                              </select>'
                            +'                                                          </div>'
                            +'                                                      </div>'
                            +'                                                      <div class="form-group row">'
                            +'                                                          <label for="inputEmail3" class="col-sm-2 control-label">Value</label>'
                            +'                                                          <div class="col-sm-10">'
                            +'                                                              <input type="number" class="form-control pricing-impact-rules-action-value" placeholder="Value" name="component['+components+'][pricing_impact_rules][0][action][0][operation_value]">'
                            +'                                                          </div>'
                            +'                                                      </div>'
                            +'                                                  </div>'
                            +'                                              </div>'
                            +'                                          </div>'
                            +'                                          <div class="card-footer with-border">'
                            +'                                              <a href="javascript:void(0)" class="btn btn-info add_pricing_impact_rules_action" style="float: right;" data-component_id="'+components+'" data-pricing_impact_rule_id="0">Add Other Action</a>'
                            +'                                          </div>'
                            +'                                      </div>'
                            +'                                  </div>'
                            +'                              </div>'
                            +'                          </div>'
                            +'                      </div>'
                            +'                </div>'
                            +'                <div class="card-footer with-border">'
                            +'                    <a href="javascript:void(0)" class="btn btn-info add_pricing_impact_rules" style="float: right;" data-component_id="'+components+'">Add Pricing Impact Rules</a>'
                            +'                </div>'
                            +'            </div>'
                            +'        </div>'
                            +'    </div>'
                            +'</div>'
                            +'</div>';

				$("#component-wrapper").append(html);

				components++;
			});

			$(document).on("click", ".delete-component", function(){
				$(this).parent().parent().remove();
			});

            $('#product').change(function(){
                var product_id = $(this).val();
                ajaxPackage(product_id)
            });

            $(document).on("click", ".add_other_rules", function(){
                var component_id = $(this).data('component_id');
                let html = '<div class="card card-default other-rules">'
                        +'     <div class="card-header border-0 p-0 m-0">'
                        +'         <button type="button" class="delete-other-rules btn btn-danger float-right" data-index="0">X</button>'
                        +'     </div>'
                        +'     <div class="card-body">'
                        +'         <div class="form-group row">'
                        +'             <label for="inputEmail3" class="col-sm-2 control-label">Component</label>'
                        +'             <div class="col-sm-10">'
                        +'                 <select name="component['+component_id+'][other_rules]['+other_rules+'][slug]"  class="form-control other_rules_slug" style="width: 100%;">'
                        +'                 <option selected value="0">Select Component</option>'
                        +                    select_component_by_slug
                        +'                 </select>'
                        +'             </div>'
                        +'         </div>'
                        +'         <div class="form-group row">'
                        +'             <label for="inputEmail3" class="col-sm-2 control-label">Value</label>'
                        +'             <div class="col-sm-10">'
                        +'                 <input type="text" class="form-control other_rules_value" placeholder="Value" name="component['+component_id+'][other_rules]['+other_rules+'][value]">'
                        +'             </div>'
                        +'         </div>'
                        +'     </div>'
                        +' </div>';

                $(`#other-rules-wrapper-${component_id}`).append(html);
                other_rules++;
            });

			$(document).on("click", ".delete-other-rules", function(){
				$(this).parent().parent().remove();
			});

            $(document).on("click", ".add_pricing_impact_rules", function(){
                var component_id = $(this).data('component_id');

                let html = '<div class="card card-default pricing-impact-rules">'
                           +'     <div class="card-header border-0 p-0 m-0">'
                           +'         <button type="button" class="delete-pricing-impact-rules btn btn-danger float-right" data-index="0">X</button>'
                           +'     </div>'
                           +'     <div class="card-body">'
                           +'         <div class="form-group row">'
                           +'             <label for="inputEmail3" class="col-sm-2 control-label">Component</label>'
                           +'             <div class="col-sm-10">'
                           +'                 <select name="component['+component_id+'][pricing_impact_rules]['+pricing_impact_rules+'][slug]"  class="form-control pricing-impact-rules-slug" style="width: 100%;">'
                           +'                 <option selected value="0">Select Component</option>'
                           +                    select_component_by_slug
                           +'                 </select>'
                           +'             </div>'
                           +'         </div>'
                           +'         <div class="form-group row">'
                           +'             <label for="inputEmail3" class="col-sm-2 control-label">Value</label>'
                           +'             <div class="col-sm-10">'
                           +'                 <input type="text" class="form-control pricing-impact-rules-value" placeholder="Value" name="component['+component_id+'][pricing_impact_rules]['+pricing_impact_rules+'][value]">'
                           +'             </div>'
                           +'         </div>'
                           +'         <div class="form-group row">'
                           +'             <label for="inputEmail3" class="col-sm-2 control-label">Action</label>'
                           +'             <div class="col-sm-10">'
                           +'                 <div class="card card-default">'
                           +'                     <div class="card-body pricing-impact-rules-action-wrapper" id="pricing-impact-rules-action-wrapper-'+component_id+'-'+pricing_impact_rules+'">'
                           +'                         <div class="card card-default pricing-impact-rules-action">'
                           +'                             <div class="card-header border-0 p-0 m-0">'
                           +'                                 <button type="button" class="delete-pricing-impact-rules-action btn btn-danger float-right" data-index="0">X</button>'
                           +'                             </div>'
                           +'                             <div class="card-body">'
                           +'                                 <div class="form-group row">'
                           +'                                     <label for="inputEmail3" class="col-sm-2 control-label">Operation</label>'
                           +'                                     <div class="col-sm-10">'
                           +'                                         <select name="component['+component_id+'][pricing_impact_rules]['+pricing_impact_rules+'][action][0][operation]" class="form-control pricing-impact-rules-action-operation" style="width: 100%;">'
                           +'                                             <option selected value="null">Select Operator</option>'
                           +'                                             <option value="addition">Addition</option>'
                           +'                                             <option value="subtraction">Subtraction</option>'
                           +'                                             <option value="multiplication">Multiplication</option>'
                           +'                                             <option value="division">Division</option>'
                           +'                                         </select>'
                           +'                                     </div>'
                           +'                                 </div>'
                           +'                                 <div class="form-group row">'
                           +'                                     <label for="inputEmail3" class="col-sm-2 control-label">Value</label>'
                           +'                                     <div class="col-sm-10">'
                           +'                                         <input type="number" class="form-control pricing-impact-rules-action-value" placeholder="Value" name="component['+component_id+'][pricing_impact_rules]['+pricing_impact_rules+'][action][0][operation_value]">'
                           +'                                     </div>'
                           +'                                 </div>'
                           +'                             </div>'
                           +'                         </div>'
                           +'                     </div>'
                           +'                     <div class="card-footer with-border">'
                           +'                         <a href="javascript:void(0)" class="btn btn-info add_pricing_impact_rules_action" style="float: right;" data-component_id="'+component_id+'" data-pricing_impact_rule_id="'+pricing_impact_rules+'">Add Other Action</a>'
                           +'                     </div>'
                           +'                 </div>'
                           +'             </div>'
                           +'         </div>'
                           +'     </div>'
                           +' </div>';


                $(`#pricing-impact-rules-wrapper-${component_id}`).append(html);
                pricing_impact_rules++;
            });

			$(document).on("click", ".delete-pricing-impact-rules", function(){
				$(this).parent().parent().remove();
			});

            $(document).on("click", ".add_pricing_impact_rules_action", function(){
                var component_id = $(this).data('component_id');
                var pricing_impact_rule_id = $(this).data('pricing_impact_rule_id');

                let html = '<div class="card card-default pricing-impact-rules-action">'
                           +'     <div class="card-header border-0 p-0 m-0">'
                           +'         <button type="button" class="delete-pricing-impact-rules-action btn btn-danger float-right" data-index="0">X</button>'
                           +'     </div>'
                           +'     <div class="card-body">'
                           +'         <div class="form-group row">'
                           +'             <label for="inputEmail3" class="col-sm-2 control-label">Operation</label>'
                           +'             <div class="col-sm-10">'
                           +'                 <select name="component['+component_id+'][pricing_impact_rules]['+pricing_impact_rule_id+'][action]['+pricing_impact_rules_action+'][operation]" class="form-control pricing-impact-rules-action-operation" style="width: 100%;">'
                           +'                     <option selected value="null">Select Operator</option>'
                           +'                     <option value="addition">Addition</option>'
                           +'                     <option value="subtraction">Subtraction</option>'
                           +'                     <option value="multiplication">Multiplication</option>'
                           +'                     <option value="division">Division</option>'
                           +'                 </select>'
                           +'             </div>'
                           +'         </div>'
                           +'         <div class="form-group row">'
                           +'             <label for="inputEmail3" class="col-sm-2 control-label">Value</label>'
                           +'             <div class="col-sm-10">'
                           +'                 <input type="number" class="form-control pricing-impact-rules-action-value" placeholder="Value" name="component['+component_id+'][pricing_impact_rules]['+pricing_impact_rule_id+'][action]['+pricing_impact_rules_action+'][operation_value]">'
                           +'             </div>'
                           +'         </div>'
                           +'     </div>'
                           +' </div>';


                $(`#pricing-impact-rules-action-wrapper-${component_id}-${pricing_impact_rule_id}`).append(html);
                pricing_impact_rules_action++;
            });

            $(document).on("click", ".delete-pricing-impact-rules-action", function(){
				$(this).parent().parent().remove();
			});

            $(document).on("click", ".move-component", function(){
                var btn = $(this)
                var val = $(this).data('index');
                if (val == 'up')
                    moveUp(btn.parents('.component'));
                else
                    moveDown(btn.parents('.component'));
            });


        });
        function ajaxPackage(product_id,package_id = null){
            $.ajax({
            type: "GET",
            url : "{{ env('APP_URL') }}"+"/api/package-by-product/"+product_id,
            success : function (records) {
                var html = "<option selected value='0' disabled>Select Package</option>";
                records.data.forEach(element => {
                    if (element.id === package_id) {
                    html += `<option value="${element.id}" selected>${element.name}</option>`
                    } else {
                    html += `<option value="${element.id}">${element.name}</option>`
                    }
                });
                $("#package").html(html);
                $("#package").prop('disabled',false);
            }
            });
        }

        function mappingSelect(data){
            var select = null
            data.forEach(element => {
                select+=`<option value="${element.id}">${element.title} ${element.unit ? "("+element.unit+")" : '' } ${element.parent_component !== null ? '('+element.parent_component.title+')' : ''}</option>`;
            });
            return select
        }

        function mappingSelectBySlug(data){
            var select = null
            data.forEach(element => {
                select+=`<option value="${element.slug}">${element.title} ${element.unit ? "("+element.unit+")" : '' } ${element.parent_component !== null ? '('+element.parent_component.title+')' : ''}</option>`;
            });
            return select
        }

        function moveUp(item) {
            var prev = item.prev();
            if (prev.length == 0)
                return;

            prev.css('z-index', 999).css('position','relative').animate({ top: item.height() }, 250);
            item.css('z-index', 1000).css('position', 'relative').animate({ top: '-' + prev.height() }, 300, function () {
                prev.css('z-index', '').css('top', '').css('position', '');
                item.css('z-index', '').css('top', '').css('position', '');
                item.insertBefore(prev);
                sortComponent()
            });
        }

        function moveDown(item) {
            var next = item.next();
            if (next.length == 0)
                return;

            next.css('z-index', 999).css('position', 'relative').animate({ top: '-' + item.height() }, 250);
            item.css('z-index', 1000).css('position', 'relative').animate({ top: next.height() }, 300, function () {
                next.css('z-index', '').css('top', '').css('position', '');
                item.css('z-index', '').css('top', '').css('position', '');
                item.insertAfter(next);
                sortComponent()
            });
        }
        function sortComponent(){
            $('.component').each(function(index){
                $(this).find('.calculator_component_id').attr('name', 'component['+index+'][calculator_component_id]');
                $(this).find('.pay-as-you-use').attr('name', 'component['+index+'][price][pay-as-you-use]');
                $(this).find('.monthly').attr('name', 'component['+index+'][price][monthly]');
                $(this).find('.1-year').attr('name', 'component['+index+'][price][1-year]');
                $(this).find('.3-year').attr('name', 'component['+index+'][price][3-year]');
                $(this).find('.5-year').attr('name', 'component['+index+'][price][5-year]');
                $(this).find('.rule_min_value').attr('name', 'component['+index+'][rule_min_value]');
                $(this).find('.rule_max_value').attr('name', 'component['+index+'][rule_max_value]');
                $(this).find('.rule_must_be_even').attr('name', 'component['+index+'][rule_must_be_even]');
                $(this).find('.rule_editable').attr('name', 'component['+index+'][rule_editable]');
                $(this).find('.rule_visible').attr('name', 'component['+index+'][visible]');
                $(this).find('.display_mode').attr('name', 'component['+index+'][display_mode]');
                $(this).find('.other-rules-wrapper').attr('id','other-rules-wrapper-'+index);
                $(this).find('.add_other_rules').data('component_id',index);
                $(this).find('.pricing-impact-rules-wrapper').attr('id','pricing-impact-rules-wrapper-'+index);
                $(this).find('.add_pricing_impact_rules').data('component_id',index);
                $(this).find('.other-rules').each(function(indexOtherRules,valueOtherRules){
                    $(valueOtherRules).find('.other_rules_slug').attr('name','component['+index+'][other_rules]['+indexOtherRules+'][slug]');
                    $(valueOtherRules).find('.other_rules_value').attr('name','component['+index+'][other_rules]['+indexOtherRules+'][value]');
                });
                $(this).find('.pricing-impact-rules').each(function(indexPricingImpact,valuePricingImpact){
                    $(valuePricingImpact).find('.pricing-impact-rules-slug').attr('name','component['+index+'][pricing_impact_rules]['+indexPricingImpact+'][slug]');
                    $(valuePricingImpact).find('.pricing-impact-rules-value').attr('name','component['+index+'][pricing_impact_rules]['+indexPricingImpact+'][value]');
                    $(valuePricingImpact).find('.add_pricing_impact_rules_action').data('component_id',index);
                    $(valuePricingImpact).find('.add_pricing_impact_rules_action').data('pricing_impact_rule_id',indexPricingImpact);
                    $(valuePricingImpact).find('.pricing-impact-rules-action-wrapper').attr('id','pricing-impact-rules-action-wrapper-'+index+'-'+indexPricingImpact);
                    $(valuePricingImpact).find('.pricing-impact-rules-action').each(function(indexPricingAction,valuePricingAction){
                        $(valuePricingAction).find('.pricing-impact-rules-action-operation').attr('name','component['+index+'][pricing_impact_rules]['+indexPricingImpact+'][action]['+indexPricingAction+'][operation]');
                        $(valuePricingAction).find('.pricing-impact-rules-action-value').attr('name','component['+index+'][pricing_impact_rules]['+indexPricingImpact+'][action]['+indexPricingAction+'][operation_value]');

                    });
                });
            });
        }
    </script>
@endpush
