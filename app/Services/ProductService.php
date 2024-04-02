<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Whishlist;
use NumberFormatter;

final class ProductService
{
 public static function addProductToCart($productId, $quantity)
 {
  try {
   // if user is not logged in keep the product ids in session 
   $userId = auth()->id();
   if (!$userId) {
    $cartProducts = request()->session()->get('cartProducts') ?? [];
    request()->session()->put("cartProducts", [...$cartProducts, $productId]);
    return true;
   }
   // if user is logged update the wishlist product to add to cart or create new wishlist cart
   // check if user had some saved in session
   $cartProducts = request()->session()->get('cartProducts') ?? [];
   $sessionProductIds = [...$cartProducts, $productId];

   // If user is logged in, associate wishlist entries with the user ID
   foreach ($sessionProductIds as $productId) {
    Whishlist::updateOrCreate(
     [
      'user_id' => $userId,
      'product_id' => $productId,
     ],
     ['in_cart' => true, 'quantity' => $quantity]
    );
   }
   return true;


   // get all products that exists in wishlist

   // $existingList =  Whishlist::whereIn('product_id', $sessionProductIds)->where('user_id', $userId)->get();
   // foreach ($existingList as $whishList) {
   //  $whishList->update([
   //   'in_cart' => true,
   //   'quantity' => $quantity
   //  ]);
   // }
   // $existingIds = $existingList->pluck('product_id')->toArray();
   // $newProductIds = array_diff($sessionProductIds, $existingIds);

   // if (count($newProductIds)) {
   //  foreach ($newProductIds as $id) {
   //   Whishlist::create([
   //    "product_id" => $id,
   //    "user_id" => $userId,
   //    "quantity" => $quantity,
   //    "in_cart" => true
   //   ]);
   //  }
   // }
   // return true;

  } catch (\Throwable $th) {
   return false;
  }
 }

 public static function getCartProduct()
 {
  try {
   $userId = auth()->id();
   if (!$userId) {
    // get the product from the cart
    $cartProducts = request()->session()->get('cartProducts') ?? [];
    if (count($cartProducts)) {
     // return Whishlist::with('product')->where(['user_id' => $userId, 'in_cart' => true])
     //  ->whereIn('product_id', $cartProducts)
     //  ->pluck('product');
     return Product::whereIn('id', $cartProducts)->get();
    }
    return [];
   }
   return Whishlist::with('product')->where(['user_id' => $userId, 'in_cart' => true])->get();
  } catch (\Throwable $th) {
   throw $th;
   return [];
  }
 }

 public function formatPrice($price)
 {
  $fmt = new NumberFormatter('en_US', NumberFormatter::DECIMAL);
  return $fmt->format($price);
 }

 public static function removeProductFromCart($productId)
 {

  //if not logged in remove from session
  if ($userId = auth()->id()) {
   $cart = Whishlist::where(['user_id' => $userId, 'in_cart' => true, 'product_id' => $productId]);
   throw_if(!$cart, 'Product not found in cart');

   $cart->delete();
   return true;
  }
 }
}
