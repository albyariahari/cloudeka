<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;

// models
use App\Models\Calculator;

class CalculatorService
{
    public function create(Request $request)
    {
        DB::transaction(function () use ($request) {
            $input = $request->all();
            $calculator = Calculator::create($input);

            foreach ($input['component'] as $key => $value) {
                $other_rules = null;
                $pricing_impact_rules = null;
                $prices = null;
                if (isset($value['other_rules'])) {
                    foreach ($value['other_rules'] as $other_rule) {
                        $other_rules[] = $other_rule;
                    }
                }
                $index = 0;
                if (isset($value['pricing_impact_rules'])) {
                    foreach ($value['pricing_impact_rules'] as $pricing_impact_rule) {
                        $pricing_impact_rules[$index] = $pricing_impact_rule;
                        $actions = null;
                        if (isset($pricing_impact_rule['action'])) {
                            foreach ($pricing_impact_rule['action'] as $action) {
                                $actions[] = $action;
                            }
                        }
                        $pricing_impact_rules[$index]['action'] = $actions;
                        $index++;
                    }
                }
                foreach ($value['price'] as $keyPrice => $price) {
                    $prices[$keyPrice] = intval($price ?? 0);
                }
                $input['component'][$key]['price'] = json_encode($prices);
                $input['component'][$key]['other_rules'] = json_encode($other_rules);
                $input['component'][$key]['pricing_impact_rules'] = json_encode($pricing_impact_rules);
            }

            $calculator->CalculatorComponents()->attach($input['component']);

            return $calculator;
        });
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $input = $request->all();
            $calculator = Calculator::findOrFail($id);
            $calculator->update($input);

            foreach ($input['component'] as $key => $value) {
                $other_rules = null;
                $pricing_impact_rules = null;
                $prices = null;
                if (isset($value['other_rules'])) {
                    foreach ($value['other_rules'] as $other_rule) {
                        $other_rules[] = $other_rule;
                    }
                }
                $index = 0;
                if (isset($value['pricing_impact_rules'])) {
                    foreach ($value['pricing_impact_rules'] as $pricing_impact_rule) {
                        $pricing_impact_rules[$index] = $pricing_impact_rule;
                        $actions = null;
                        if (isset($pricing_impact_rule['action'])) {
                            foreach ($pricing_impact_rule['action'] as $action) {
                                $actions[] = $action;
                            }
                        }
                        $pricing_impact_rules[$index]['action'] = $actions;
                        $index++;
                    }
                }
                foreach ($value['price'] as $keyPrice => $price) {
                    $prices[$keyPrice] = intval($price ?? 0);
                }
                $input['component'][$key]['price'] = json_encode($prices);
                $input['component'][$key]['other_rules'] = json_encode($other_rules);
                $input['component'][$key]['pricing_impact_rules'] = json_encode($pricing_impact_rules);
            }

            $calculator->CalculatorComponents()->detach();
            $calculator->CalculatorComponents()->attach($input['component']);

            return $calculator;
        });
    }
}
