<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeValue;
use App\Product;
use Illuminate\Http\Request;

class testcontroller extends Controller
{
    public function addProduct(Request $request)
    {
        $product = Product::create($request->all());

        $attributeValues =  explode(',', $request->attribute_values);

        foreach ($attributeValues as $attributeValue) {
            $attributeValue = AttributeValue::firstOrCreate([
                'name' => $attributeValue,
                'attribute_id ' => str_slug($tagName)
            ]);
            $tagIds[] = $tag->id;
        }

        $product->attributeValues()->sync($attributeValueIds);
    }

    public function addAttribute(Request $request)
    {
        return Attribute::create($request->all());
    }

    public function addAttributeValue(Request $request)
    {
        return AttributeValue::create($request->all());
    }

    public function getProduct($id)
    {
        $product = Product::findOrFail($id);

        $attributeValues = $product->attributeValues()->get();

        $attributes = $attributeValues->attribute->name;


        return response()->json([
            'product' => $product,
            'attributes', $attributes,
            'attribute_values'=> $attributeValues
        ]);
    }
}
