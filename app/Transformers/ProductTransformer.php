<?php

namespace App\Transformers;

use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'identifier' => (int) $product->id,
            'title' => (string) $product->name,
            'details' => (string) $product->descrtiption,
            'stock' => (int) $product->quantity,
            'situation' => (string) $product->status,
            'picture' => url("img/{$product->image}"),
            'seller' => (int)$product->seller_id,
            'creationDate' => (string) $product->created_at,
            'lastChange' => (string) $product->update_at,
            'deletedDate' => isset($product->deleted_at) ? (string) $product->deleted_at : null,

            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('products.show', $product->id),
                ],
                [
                    'rel' => 'products.buyers',
                    'href' => route('products.buyers.index', $product->id),
                ],
                [
                    'rel' => 'products.categories',
                    'href' => route('products.categories.index', $product->id),
                ],
                [
                    'rel' => 'products.transactions',
                    'href' => route('products.transactions.index', $product->id),
                ],
                [
                    'rel' => 'sellers',
                    'href' => route('sellers.show', $product->seller_id),
                ],
            ],
        ];
    }

    public static function originalAttribute($index)
    {
        return [
            'identifier' => 'id',
            'title' => 'name',
            'details' => 'descrtiption',
            'stock' => 'quantity',
            'situation' => 'status',
            'picture' => 'image',
            'seller' => 'seller_id',
            'creationDate' => 'created_at',
            'lastChange' => 'update_at',
            'deletedDate' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        return [
            'id'            => 'identifier' ,
            'name'          => 'title' ,
            'descrtiption'  => 'details' ,
            'quantity'      => 'stock' ,
            'status'        => 'situation' ,
            'image'         => 'picture' ,
            'seller_id'     => 'seller' ,
            'created_at'    => 'creationDate' ,
            'update_at'     => 'lastChange' ,
            'deleted_at'    => 'deletedDate' ,
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

}
