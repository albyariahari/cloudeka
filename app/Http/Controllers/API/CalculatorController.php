<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

// Request
use Illuminate\Http\Request;
use App\Http\Requests\API\Calculator\SendEstimation as SendEstimationRequest;

// Model
use App\Models\Calculator;
use App\Models\Promotion;
use App\Models\PackageType;
use App\Models\PackageItem;

// Collection
use App\Http\Resources\CalculatorCollection;
use App\Http\Resources\CalculatorComponentResource;

// Mail
use App\Mail\SendEstimation as SendEstimationEmail;

class CalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $collection = [];

        $lang = $request->get('lang', 'en');

        $calculators = Calculator::get();
        $packageTypes = PackageType::get();

        foreach ($calculators as $calculator) {
            $collection[$calculator->Product->translate($lang)->slug]['product_name']  = $calculator->Product->translate($lang)->title;
            if ($calculator->Package) {
                $groupItems = [];
                $collection[$calculator->Product->translate($lang)->slug]['packages'] = [];
                foreach($packageTypes as $key => $item){
                    $packageItemsByType = PackageItem::where('package_type_id', $item->id)->where('package_id', $calculator->Package->id)->get();
                    
                    $groupItem = ['name' => $item->name, 'items' => []];
                    
                    $newItem = [];
                    foreach ($packageItemsByType as $keyPackageItem => $packageItem) {
                        $newItem['name'] = $packageItem->name;
                        $newItem['package_component'] = [];
                        foreach ($packageItem->CalculatorComponents as $calculatorComponent) {
                            $newItem['package_component'][] = [
                                'title' => $calculatorComponent->slug,
                                'unit' => $calculatorComponent->unit,
                                'value' => $calculatorComponent->pivot->value,
                            ];
                        }

                        array_push($collection[$calculator->Product->translate($lang)->slug]['packages'], $newItem);
                        array_push($groupItem['items'], $newItem);
                    }

                    if(count($groupItem['items']) > 0)
                        array_push($groupItems, $groupItem);
                }

                $collection[$calculator->Product->translate($lang)->slug]['packageGroup'] = $groupItems;
            }
            foreach ($calculator->CalculatorComponents as $keyComponent => $component) {
                $collection[$calculator->Product->translate($lang)->slug]['calculator_component'][$keyComponent] = [
                    "name" => $component->title,
                    "slug" => $component->slug,
                    "unit" => $component->unit,
                    "data_type" => $component->data_type,
                    "data_group" => $component->data_group,
                    "hint" => $component->hint,
                    "rule_min_value" => $component->pivot->rule_min_value,
                    "rule_max_value" => $component->pivot->rule_max_value,
                    "rule_must_be_even" => $component->pivot->rule_must_be_even,
                    "rule_editable" => $component->pivot->rule_editable,
                    "display_mode" => $component->pivot->display_mode,
                    "default_visible" => $component->pivot->visible,
                    "price" => json_decode($component->pivot->price),
                    "other_rules" => json_decode($component->pivot->other_rules),
                    "pricing_impact_rules" => json_decode($component->pivot->pricing_impact_rules),
                ];
                foreach ($component->subComponents as $subComponent) {
                    $collection[$calculator->Product->translate($lang)->slug]['calculator_component'][$keyComponent]['list_items'][] = [
                        "name" => $subComponent->title,
                        "slug" => $subComponent->slug,
                        "unit" => $subComponent->unit,
                        "data_type" => $subComponent->data_type,
                        "data_group" => $subComponent->data_group,
                        "hint" => $subComponent->hint,
                        "rule_min_value" => null,
                        "rule_max_value" => null,
                        "rule_must_be_even" => false,
                        "price" => $subComponent->price,
                    ];
                }
            }
        };

        return parent::response('success', 'Success', $collection);
    }

    public function sendEstimation(SendEstimationRequest $request)
    {
        $excludedSubtotal = ["editMode", "server-name", "cartIndex", "flavor", "commitment-type", "storage-type", "quantity", "server_name", "server_quantity"];
		$excludedComponent = ["editMode", "cartIndex", "flavor", "commitment-type",'server_name', 'quantityName'];

        $email = $request->input('email');
        $name = $request->input('name');
        $carts = $request->input('cart');

        $productInCart = array_column($carts['cart'], 'product_name');
        $promos = Promotion::where('start_date', '<=', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'))
                ->where('end_date', '>=', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'))
                ->with(['Product'])
                ->get();

        \Mail::to($email)
            ->cc(['labelideas.dev@gmail.com'])
            ->send(new SendEstimationEmail($name, $carts, $excludedComponent, $excludedSubtotal, $request, $promos, $productInCart));

        return parent::response('success', 'Success');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
